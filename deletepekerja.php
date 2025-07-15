<?php

include 'koneksi1.php';
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Proses upload
    $sql = "delete from biaya_tenaga_kerja_langsung_standar where id_btkl_standar = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('pekerja.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pekerja.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>