<?php

include 'koneksi1.php';
$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_REQUEST['alamat']);
$phone = mysqli_real_escape_string($koneksi, $_REQUEST['phone']);
$email = mysqli_real_escape_string($koneksi, $_REQUEST['email']);

    // Proses upload
    $sql = "update pelanggan set nama_pelanggan = '$nama', alamat_pelanggan = '$alamat', phone_pelanggan = '$phone', email_pelanggan = '$email' where id_pelanggan = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('pelanggan.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pelanggan.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>