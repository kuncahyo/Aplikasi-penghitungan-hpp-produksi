<?php

include 'koneksi1.php';

$id_hpp = mysqli_real_escape_string($koneksi, $_REQUEST['id_hpp']);
$qty = mysqli_real_escape_string($koneksi, $_REQUEST['qty']);
$harga = mysqli_real_escape_string($koneksi, $_REQUEST['harga']);
$total = mysqli_real_escape_string($koneksi,($_REQUEST['harga']*$_REQUEST['qty']));
    // Proses upload
$sql = "update hpp_actual set total = '$total',harga = '$harga', qty = '$qty' where id = '$id_hpp'";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
     
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('hppactual.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }
   if (isset($_POST['simpanact'])) {
              #################################
    $id_p = $_POST['id_p'];
    echo $id_p;
              $sql ='select * from ( SELECT hs.id,p.nama_bb_standar,p.panjang_bb_standar,p.lebar_bb_standar,p.tinggi_bb_standar,p.satuan_bb_standar,p.harga_bb_standar,"Bahan Baku" as kategori,
          hs.qty,hs.total FROM hpp_actual hs 
          join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
          join pesanan ps on ps.id = hs.id_pesanan
          where hs.kategori = 1 and ps.id = '.$id_p.' ) hasil -- group by kategori asc';
              $query = mysqli_query($koneksi, $sql);
              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
              WHILE($row = mysqli_fetch_array($query)){
                      $re_nama = $row['nama_bb_standar'];
                      $re_satuan = $row['satuan_bb_standar'];
                      $re_panjang = $row['panjang_bb_standar'];
                      $re_lebar = $row['lebar_bb_standar'];
                      $re_tinggi = $row['tinggi_bb_standar'];
                      $re_harga = $row['harga_bb_standar'];
                      $id_p= $id_p;
                      
                      $proses = mysqli_query($koneksi, "INSERT INTO biaya_bahan_baku_aktual (nama_bb_aktual, panjang_bb_aktual, lebar_bb_aktual, tinggi_bb_aktual, satuan_bb_aktual, harga_bb_aktual, id_pesanan) VALUES ('$re_nama', '$re_panjang', '$re_lebar', '$re_tinggi', '$re_satuan', '$re_harga', '$id_p')")or die(mysqli_error());
              }
               $sql2 ='select * from ( 
                                SELECT hs.id,p.nama_btkl_standar,p.type_btkl_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 2 and ps.id ='.$id_p.') hasil -- group by kategori asc';
               $hapus = mysqli_query($koneksi, "delete from biaya_tenaga_kerja_langsung_aktual where id_pesanan=".$id_p."");
              $query2 = mysqli_query($koneksi, $sql2);
              WHILE($row2 = mysqli_fetch_array($query2)){
                      $re_nama = $row2['nama_btkl_standar'];
                      $re_satuan = $row2['type_btkl_standar'];
                      $re_harga = $row2['harga'];
                      $id_p= $id_p;
                      
                      $proses = mysqli_query($koneksi, "INSERT INTO biaya_tenaga_kerja_langsung_aktual (nama_btkl_aktual, type_btkl_aktual, upah_btkl_aktual, id_pesanan) VALUES ('$re_nama', '$re_satuan', '$re_harga', '$id_p')")or die(mysqli_error());
                    
              }
              
//              3
              $sql3 = 'select * from (
                                SELECT hs.id,p.nama_tetap_standar,p.satuan_tetap_standar,hs.harga,"Overhead Tetap" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 3 and ps.id =  '.$id_p.' ) hasil -- group by kategori asc';
               $query3 = mysqli_query($koneksi, $sql3);
               $hapus = mysqli_query($koneksi, "delete from bop_tetap_aktual where id_pesanan=".$id_p."");
              WHILE($row3 = mysqli_fetch_array($query3)){
                      $re_nama = $row3['nama_tetap_standar'];
                      $re_satuan = $row3['satuan_tetap_standar'];
                      $re_harga = $row3['harga'];
                      $id_p= $id_p;
                      
                      $proses = mysqli_query($koneksi, "INSERT INTO bop_tetap_aktual (nama_tetap_aktual, satuan_tetap_aktual, harga_tetap_aktual, id_pesanan) VALUES ('$re_nama', '$re_satuan', '$re_harga', '$id_p')")or die(mysqli_error());
                      
              }
//              4
              $sql4 = 'select * from ( 
                                SELECT hs.id,p.nama_variabel_standar,p.satuan_variabel_standar,p.jumlah_satuan_variabel_standar,hs.harga,"Biaya Overhead Variable" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 4 and ps.id = '.$id_p.' ) hasil -- group by kategori asc;';
               $query4 = mysqli_query($koneksi, $sql4);
               $hapus = mysqli_query($koneksi, "delete from bop_variabel_aktual where id_pesanan=".$id_p."");
              WHILE($row4 = mysqli_fetch_array($query4)){
                      $re_nama = $row4['nama_variabel_standar'];
                      $re_satuan = $row4['satuan_variabel_standar'];
                      $re_jumlah_satuan = $row4['jumlah_satuan_variabel_standar'];
                      $re_harga = $row4['harga'];
                      $id_p= $id_p;
                      
                      $proses = mysqli_query($koneksi, "INSERT INTO bop_variabel_aktual (nama_variabel_aktual, satuan_variabel_aktual, jumlah_satuan_variabel_aktual, 	harga_variabel_aktual, id_pesanan) VALUES ('$re_nama', '$re_satuan', '$re_jumlah_satuan', '$re_harga', '$id_p')")or die(mysqli_error());
              }
                      echo "<script type='text/javascript'>location.replace('hpp_actual.php?id=$id_p');</script>";
      }


?>