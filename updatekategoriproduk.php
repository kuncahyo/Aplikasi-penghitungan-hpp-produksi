<?php

include 'koneksi1.php';
$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);

    // Proses upload
    $sql = "update produk set nama_produk = '$nama' where id_produk = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('kategoriproduk.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>