<?php 
include 'koneksi1.php';
//copy actual
$sqlmax="SELECT MAX(id) as idm from pesanan;";
$querymax = mysqli_query($koneksi, $sqlmax);
WHILE($rowmax = mysqli_fetch_array($querymax)){
    $max= $rowmax['idm'];
}

$sqles ="select * from (SELECT hs.id_rincian,hs.kategori,'' AS satuan,
                                hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_bahan_baku_aktual p on p.id_pesanan = hs.id_pesanan
                                join pesanan ps on ps.id = hs.id_pesanan
                                where p.panjang_bb_aktual >=".$panjang." and p.lebar_bb_aktual >= ".$lebar." and tinggi_bb_aktual >=".$tinggi." ) hasil -- group by ps.id asc;";
$query = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
              WHILE($row = mysqli_fetch_array($query)){
                      $re_rincian = $row['id_rincian'];
                      $re_kategori = $row['kategori'];
                      $re_satuan = $row['satuan'];
                      $re_qty = $row['qty'];
                      $re_total = $row['total'];
                      $id_pesan= $max;
                      
                      $proses = mysqli_query($koneksi, "INSERT INTO hpp_standart (id_pesanan,id_rincian, kategori, satuan, qty,total) value ('$id_pesan','$re_rincian','$re_kategori','$re_satuan','$re_qty','$re_total')")or die(mysqli_error());
              if ($proses) {
                              print '
                              <script>
                                      window.location.href="?menu=coppy&result=reload";
                              </script>
                              ';
                      }else{
                      print '
                      <script>
                              window.location.href="?menu=coppy&result=reload_failed";
                      </script>
                      ';
                      }
                      
              }
?>