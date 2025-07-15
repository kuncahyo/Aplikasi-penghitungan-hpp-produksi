<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$satuan = mysqli_real_escape_string($koneksi, $_REQUEST['satuan']);
$harga = mysqli_real_escape_string($koneksi, $_REQUEST['harga']);

    // Proses upload
$sql = "INSERT INTO custom_standar (nama_custom_standar, satuan_custom_standar, harga_custom_standar) value ('$nama','$satuan','$harga')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('custom.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>