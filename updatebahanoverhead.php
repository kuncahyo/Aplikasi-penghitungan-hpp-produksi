<?php

include 'koneksi1.php';

$id = mysqli_real_escape_string($koneksi, $_REQUEST['id']);
$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$satuan = mysqli_real_escape_string($koneksi, $_REQUEST['satuan']);
$harga = mysqli_real_escape_string($koneksi, $_REQUEST['harga']);

    // Proses upload
$sql = "update bop_variabel_standar set nama_variabel_standar = '$nama', satuan_variabel_standar = '$satuan', harga_variabel_standar = '$harga' where id_variabel_standar = $id";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('bahanoverhead.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('bahanoverhead.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>