<?php

include 'koneksi1.php';

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Proses upload
$sql = "delete from biaya_bahan_baku_standar where id_bb_standar  = $id";


//  echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('produk.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>