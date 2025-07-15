<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$satuan = mysqli_real_escape_string($koneksi, $_REQUEST['satuan']);
$harga = str_replace(".","",mysqli_real_escape_string($koneksi, $_REQUEST['harga']));

    // Proses upload
$sql = "INSERT INTO bop_variabel_standar (nama_variabel_standar, satuan_variabel_standar, harga_variabel_standar) value ('$nama','$satuan','$harga')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('bahanoverhead.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('bahanoverhead.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>