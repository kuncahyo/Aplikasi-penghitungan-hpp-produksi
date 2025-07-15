<?php

include 'koneksi1.php';

$id_pesanan = mysqli_real_escape_string($koneksi, $_REQUEST['id_pesanan']);
$laba = mysqli_real_escape_string($koneksi, $_REQUEST['laba']);

    // Proses upload
$sql = "update pesanan set laba = '$laba' where id = '$id_pesanan'";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('hppawal.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('hppawal.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>