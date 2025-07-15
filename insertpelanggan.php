<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_REQUEST['alamat']);
$phone = mysqli_real_escape_string($koneksi, $_REQUEST['phone']);
$email = mysqli_real_escape_string($koneksi, $_REQUEST['email']);

    // Proses upload
$sql = "INSERT INTO pelanggan (nama_pelanggan,alamat_pelanggan,phone_pelanggan,email_pelanggan) value ('$nama','$alamat','$phone','$email')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('pelanggan.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pelanggan.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>