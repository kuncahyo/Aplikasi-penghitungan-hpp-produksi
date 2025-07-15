<?php

include 'koneksi1.php';
$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$username = mysqli_real_escape_string($koneksi, $_REQUEST['username']);
$password = mysqli_real_escape_string($koneksi, md5($_REQUEST['[password]']));
$type = mysqli_real_escape_string($koneksi, $_REQUEST['type']);

    // Proses upload
    $sql = "update user set username = '$username', password = '$password', type = '$type' where id = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('user.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pelanggan.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>