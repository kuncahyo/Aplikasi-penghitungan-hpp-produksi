<?php

include 'koneksi1.php';

$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$panjang = mysqli_real_escape_string($koneksi, $_REQUEST['panjang']);
$lebar = mysqli_real_escape_string($koneksi, $_REQUEST['lebar']);
$tinggi = mysqli_real_escape_string($koneksi, $_REQUEST['tinggi']);
$satuan = mysqli_real_escape_string($koneksi, $_REQUEST['satuan']);
$harga = mysqli_real_escape_string($koneksi, $_REQUEST['harga']);

    // Proses upload
$sql = "update biaya_bahan_baku_standar set nama_bb_standar = '$nama', satuan_bb_standar = '$satuan', panjang_bb_standar= '$panjang', lebar_bb_standar= '$lebar', tinggi_bb_standar= '$tinggi', harga_bb_standar = '$harga' where id_bb_standar  = $id";


//  echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('produk.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>