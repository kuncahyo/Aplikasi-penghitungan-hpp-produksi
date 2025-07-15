<?php

include 'koneksi1.php';

$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$harga = mysqli_real_escape_string($koneksi, $_REQUEST['harga']);

    // Proses upload
    $sql = "update bop_tetap_standar set nama_tetap_standar = '$nama', harga_tetap_standar = '$harga' where id_tetap_standar = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('jasa.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('jasa.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>