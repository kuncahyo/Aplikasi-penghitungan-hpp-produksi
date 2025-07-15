<?php

include 'koneksi1.php';

if (isset($_POST['update_standar'])) {
$nama = $_POST['nama'];
$pesan= $_POST['pesan'];
$rincian =  $_POST['rincian'];
$kategori =  $_POST['kategori'];
$qty =  $_POST['qty'];
$qtyawal=$_POST['qtyawal'];

//echo $kategori.'pertama'.$nama.'dua'.$pesan.'tiga'.$qty.'empat'.$rincian.'lima';

echo $kategori.'kategori<br>'.$nama.'nama<br>'.$pesan.'pesan<br>'.$qty.'qty<br>'.$rincian.'rincian'.$qtyawal.'qtyawal';

$sqlca = 'SELECT * FROM `hpp_standart` WHERE id_pesanan='.$pesan.' and id_rincian='.$rincian.' and kategori='.$kategori.' and qty='.$qtyawal.';';
                          $queryca = mysqli_query($koneksi, $sqlca);
                             while ($rowca = mysqli_fetch_array($queryca))
                                {
                                 $id_hpp=$rowca['id'];
                                 echo $id_hpp.'hpp <br>';
                                }
$sqlak = 'SELECT * FROM `hpp_actual` WHERE id_pesanan='.$pesan.' and id_rincian='.$rincian.' and kategori='.$kategori.' and qty='.$qtyawal.';';
                          $queryak = mysqli_query($koneksi, $sqlak);
                             while ($rowak = mysqli_fetch_array($queryak))
                                {
                                 $id_hppak=$rowak['id'];
                                 echo $id_hppak.'hpp aktual <br>';
                                }
    if ($kategori==1){
        $sqlbb = 'SELECT * FROM biaya_bahan_baku_standar WHERE id_bb_standar='.$nama.';';
                    $querybb = mysqli_query($koneksi, $sqlbb);
                             while ($rowbb = mysqli_fetch_array($querybb))
                                {
                                 $harga=$rowbb['harga_bb_standar'];
//                                 echo 'harga'.$harga;
                                 $total= $harga*$qty;
//                                 echo 'toal semua ='.$total;
                                }
    }elseif ($kategori==2) {
        $sqlbb = 'SELECT * FROM biaya_tenaga_kerja_langsung_standar WHERE id_btkl_standar='.$nama.';';
                    $querybb = mysqli_query($koneksi, $sqlbb);
                             while ($rowbb = mysqli_fetch_array($querybb))
                                {
                                 $harga=$rowbb['upah_btkl_standar'];
                                 echo 'harga'.$harga;
                                 if($rowbb['satuan_btkl_standar']=='kemampuan'){
                                    $total= $harga/$qty;
                                }else{
                                       $total= $harga*$qty;
                                }
                                 echo 'toal semua ='.$total;
                                }
    }elseif ($kategori==3) {
        $sqlbb = 'SELECT * FROM bop_tetap_standar WHERE id_tetap_standar='.$nama.';';
                    $querybb = mysqli_query($koneksi, $sqlbb);
                             while ($rowbb = mysqli_fetch_array($querybb))
                                {
                                 $harga=$rowbb['harga_tetap_standar'];
//                                 echo 'harga'.$harga;
                                 $total= $harga*$qty;
//                                 echo 'toal semua ='.$total;
                                }
    }elseif ($kategori==4) {
        $sqlbb = 'SELECT * FROM bop_variabel_standar WHERE id_variabel_standar='.$nama.';';
                    $querybb = mysqli_query($koneksi, $sqlbb);
                             while ($rowbb = mysqli_fetch_array($querybb))
                                {
                                 $harga=$rowbb['harga_variabel_standar'];
//                                 echo 'harga'.$harga;
                                if($row['satuan_variabel_standar']=='kemampuan'){
                                    $total= $harga/$qty;
                                }elseif($row['satuan_variabel_standar']=='hari'){
                                    $total= $harga/$qty;
                                }else{
                                   $total= $harga*$qty;
                                }
//          echo 'toal semua ='.$total;
                                }
        
    }elseif ($kategori==5) {
                    $sqlbb = 'SELECT * FROM custom_standar WHERE id_custom_standar ='.$nama.';';
                    $querybb = mysqli_query($koneksi, $sqlbb);
                             while ($rowbb = mysqli_fetch_array($querybb))
                                {
                                 $harga=$rowbb['harga_custom_standar'];
//                                 echo 'harga'.$harga;
                                 $total= $harga*$qty;
//                                 echo 'toal semua ='.$total;
                                }
    }
$sqlupdate = 'UPDATE hpp_standart SET id_rincian='.$nama.',harga='.$harga.',qty='.$qty.',total='.$total.' WHERE id='.$id_hpp.';';
  if(mysqli_query($koneksi, $sqlupdate)){
      $sqlupdateak = 'UPDATE hpp_actual SET id_rincian='.$nama.',harga='.$harga.',qty='.$qty.',total='.$total.' WHERE id='.$id_hppak.';';
  if(mysqli_query($koneksi, $sqlupdateak)){
    echo "<script type='text/javascript'>location.replace('hppawal.php');</script>";
  }
        
  } else{
     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('produk.php');</script>";
    //echo("Error description: " . $conn->error);
    // echo $sql;
  }
}
//$total = mysqli_real_escape_string($koneksi, $_REQUEST['qty']*$row['harga_bb_standar']);