<?php

include 'koneksi1.php';

$kategori = mysqli_real_escape_string($koneksi, $_REQUEST['kategori']);
$id_pesanan = mysqli_real_escape_string($koneksi, $_REQUEST['id_pesanan']);
$id_pro = mysqli_real_escape_string($koneksi, $_REQUEST['id_pro']);
$items = mysqli_real_escape_string($koneksi, $_REQUEST['items']);
$qty = mysqli_real_escape_string($koneksi, $_REQUEST['qty']);


if($kategori == 1){
	$sql = 'select *,"P" as status from biaya_bahan_baku_standar where id_bb_standar = '.$items;
	$query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query))
        {
                $harga=$row['harga_bb_standar'];
        	$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['harga_bb_standar']);
         $hargaStandart = mysqli_real_escape_string($koneksi,$row['harga_bb_standar']);
        }
}else if($kategori == 2){
	$sql = 'select *,"PE" as status from biaya_tenaga_kerja_langsung_standar where id_btkl_standar = '.$items;
	$query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query))
        {
         $harga=$row['upah_btkl_standar'];
         if($row['satuan_btkl_standar']=='kemampuan'){
             $total = mysqli_real_escape_string($koneksi, $row['upah_btkl_standar']/$_REQUEST['qty']);
         }else{
        	$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['upah_btkl_standar']);
         }
           $hargaStandart = mysqli_real_escape_string($koneksi,$row['upah_btkl_standar']);
        }
}else if($kategori == 3){
	$sql = 'select id_tetap_standar,nama_tetap_standar,satuan_tetap_standar,harga_tetap_standar,"J" as status from bop_tetap_standar where id_tetap_standar  = '.$items;
        $query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query))
        {
         $harga=$row['harga_tetap_standar'];
        	$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['harga_tetap_standar']);
           $hargaStandart = mysqli_real_escape_string($koneksi,$row['harga_tetap_standar']);
        }
}else if($kategori == 4){
	$sql = 'select *,"O" as status from bop_variabel_standar where id_variabel_standar  = '.$items;
	$query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query))
        {
         $harga=$row['harga_variabel_standar'];
         if($row['satuan_variabel_standar']=='kemampuan'){
             $total = mysqli_real_escape_string($koneksi, $row['harga_variabel_standar']/$_REQUEST['qty']);
         }elseif($row['satuan_variabel_standar']=='hari'){
             $total = mysqli_real_escape_string($koneksi, $row['harga_variabel_standar']/$_REQUEST['qty']);
         }else{
        	$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['harga_variabel_standar']);
         }
           $hargaStandart = mysqli_real_escape_string($koneksi,$row['harga_variabel_standar']);
        }
}else if($kategori == 5){
	$sql = 'select *,"C" as status from custom_standar where id_custom_standar  = '.$items;
	$query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query))
        {
         $harga=$row['harga_custom_standar'];
        	$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['harga_custom_standar']);
           $hargaStandart = mysqli_real_escape_string($koneksi,$row['harga_custom_standar']);
        }
}
//  echo $sql;
$sql = 'INSERT INTO hpp_standart (id_pesanan,id_rincian, kategori, harga, qty,total) value ('.$id_pesanan.','.$items.','.$kategori.','.$harga.','.$qty.','.$total.');';

// echo $sql;
  if(mysqli_query($koneksi, $sql)){
            $sql = "INSERT INTO hpp_actual (id_pesanan,id_rincian, kategori,harga, qty,total) value ('$id_pesanan','$items','$kategori','$hargaStandart','$qty','$total')";

        // echo $sql;
          if(mysqli_query($koneksi, $sql)){
              echo "<script type='text/javascript'>location.replace('hpp_standart.php?id=".$id_pesanan."&id_pro=".$id_pro."');</script>";
          } else{
             echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('hpp_standart.php?id=".$id_pesanan."');</script>";
            //echo("Error description: " . $conn->error);
            // echo $sql;
          }
        
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('hpp_standart.php?id=".$id_pesanan."');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }


?>