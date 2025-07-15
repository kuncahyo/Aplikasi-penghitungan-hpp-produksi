<?php

include 'koneksi1.php';

$nama = mysqli_real_escape_string($koneksi, $_REQUEST['nama']);
$panjang = mysqli_real_escape_string($koneksi, $_REQUEST['panjang']);
$lebar =  mysqli_real_escape_string($koneksi, $_REQUEST['lebar']);
$tinggi = mysqli_real_escape_string($koneksi, $_REQUEST['tinggi']);
$satuan = mysqli_real_escape_string($koneksi, $_REQUEST['satuan']);
$harga = str_replace(".","",mysqli_real_escape_string($koneksi, $_REQUEST['harga']));

    // Proses upload
$sql = "INSERT INTO biaya_bahan_baku_standar (nama_bb_standar, satuan_bb_standar, panjang_bb_standar, lebar_bb_standar, tinggi_bb_standar, harga_bb_standar) value ('$nama','$satuan','$panjang','$lebar','$tinggi','$harga')";

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
        echo "<script type='text/javascript'>location.replace('produk.php');</script>";
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>