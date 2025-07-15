<?php

include 'koneksi1.php';
$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$type = mysqli_real_escape_string($koneksi, $_REQUEST['type']);
$upah = mysqli_real_escape_string($koneksi, $_REQUEST['upah']);

    // Proses upload
    $sql = "update biaya_tenaga_kerja_langsung_standar set nama_btkl_standar = '$nama', type_btkl_standar = '$type', upah_btkl_standar = '$upah' where id_btkl_standar = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('pekerja.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pekerja.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>