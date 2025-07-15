<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);

    // Proses upload
$sql = "INSERT INTO produk (nama_produk) value ('$nama')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('kategoriproduk.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>