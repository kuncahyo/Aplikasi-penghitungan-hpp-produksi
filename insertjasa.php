<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$harga = str_replace(".","",mysqli_real_escape_string($koneksi, $_REQUEST['harga']));

    // Proses upload
$sql = "INSERT INTO bop_tetap_standar (nama_tetap_standar,harga_tetap_standar) value ('$nama','$harga')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('jasa.php');</script>";
  } else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('jasa.php');</script>";
    // echo("Error description: " . $koneksi->error);
    //  echo $sql;
  }


?>