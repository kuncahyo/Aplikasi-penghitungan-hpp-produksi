<?php

include 'koneksi1.php';

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Proses upload
    $sql = "delete from bop_tetap_standar  where id_tetap_standar = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('jasa.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('jasa.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>