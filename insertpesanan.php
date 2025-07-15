<?php

include 'koneksi1.php';

if (isset($_POST['tambahpesan'])) {
$nama = $_POST['nama'];
$panjang= $_POST['panjang'];
$lebar =  $_POST['lebar'];
$tinggi =  $_POST['tinggi'];
$pelanggan =  $_POST['pelanggan'];
$id_kategori_produk =  $_POST['id_produk'];
$tgl_pesanan =  $_POST['tgl_pesanan'];
$tgl_jatuhtempo =  $_POST['tgl_jatuhtempo'];
    
//echo $panjang.'<br>';
//echo $lebar.'<br>';
//echo $tinggi.'<br>';
//echo $nama.'<br>';
//echo $tgl_jatuhtempo.'<br>';
//echo $tgl_pesanan.'<br>';
//$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
//$panjang=mysqli_real_escape_string($koneksi, $_REQUEST['panjang']);
//$lebar = mysqli_real_escape_string($koneksi, $_REQUEST['lebar']);
//$tinggi = mysqli_real_escape_string($koneksi, $_REQUEST['tinggi']);
//$pelanggan = mysqli_real_escape_string($koneksi, $_REQUEST['pelanggan']);
//$id_kategori_produk = mysqli_real_escape_string($koneksi, $_REQUEST['id_produk']);
//$tgl_pesanan = mysqli_real_escape_string($koneksi, $_REQUEST['tgl_pesanan']);
//$tgl_jatuhtempo = mysqli_real_escape_string($koneksi, $_REQUEST['tgl_jatuhtempo']);
$sqlmax="SELECT MAX(id) as idm from pesanan;";
$querymax = mysqli_query($koneksi, $sqlmax);
WHILE($rowmax = mysqli_fetch_array($querymax)){
    $max= $rowmax['idm']+1;
}
//echo $max.'<br>';
    // Proses upload
$sql = "insert into pesanan (id,nama,id_kategoriproduk,id_pelanggan,panjang,lebar,tinggi,tgl_pesanan,tgl_jatuhtempo) value ('$max','$nama','$id_kategori_produk','$pelanggan','$panjang','$lebar','$tinggi','$tgl_pesanan','$tgl_jatuhtempo')";
// echo $sql;

$sqles ='SELECT hs.id_pesanan,hs.id_rincian,hs.kategori,hs.harga, hs.qty,hs.total
FROM hpp_actual hs join biaya_bahan_baku_aktual p on p.id_pesanan = hs.id_pesanan
join (SELECT * FROM pesanan WHERE id_kategoriproduk='.$id_kategori_produk.' limit 1) ps on ps.id = hs.id_pesanan
where p.panjang_bb_aktual >= '.$panjang.'
and p.lebar_bb_aktual >= '.$lebar.'
and tinggi_bb_aktual >='.$tinggi.' ORDER BY ABS(ps.panjang-'.$panjang.') , ABS(ps.lebar-'.$lebar.') , ABS(ps.tinggi-'.$tinggi.')';


$query = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
              WHILE($row = mysqli_fetch_array($query)){
                      $re_rincian = $row['id_rincian'];
                      $re_kategori = $row['kategori'];
                      $re_satuan = $row['satuan'];
                      $re_qty = $row['qty'];
                      $re_harga = $row['harga'];
                      $re_total = $row['total'];
                      $id_pesan= $max;
                      
                      $proses = mysqli_query($koneksi, 'INSERT INTO hpp_standart (id_pesanan,id_rincian, kategori, harga, qty,total) value ('.$id_pesan.','.$re_rincian.','.$re_kategori.','.$re_harga.','.$re_qty.','.$re_total.')')or die(mysqli_error());
                      $proses2 = mysqli_query($koneksi, 'INSERT INTO hpp_actual (id_pesanan,id_rincian, kategori, harga, qty,total) value ('.$id_pesan.','.$re_rincian.','.$re_kategori.','.$re_harga.','.$re_qty.','.$re_total.')')or die(mysqli_error());
//              if ($proses) {
//                              print '
//                              <script>
//                                      window.location.href="?menu=coppy&result=reload";
//                              </script>
//                              ';
//                      }else{
//                      print '
//                      <script>
//                              window.location.href="?menu=coppy&result=reload_failed";
//                      </script>
//                      ';
//                      }
                      
              }
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('pesanan.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pesanan.php');</script>";
     echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }
}



?>