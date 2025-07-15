<?php

include 'koneksi1.php';

$id_kategori = $_GET['id_kategori'];
    // Proses upload

if($id_kategori == 1){
	$sql = 'select *,"P" as status from biaya_bahan_baku_standar';
       $query = mysqli_query($koneksi, $sql); 
 	while ($row = mysqli_fetch_array($query))
    {
     echo '<option value="'.$row['id_bb_standar'].'" > '.$row['nama_bb_standar']."-".$row['satuan_bb_standar'].'</option>';
    }
}else if($id_kategori == 2){
	$sql = 'select *,"PE" as status from biaya_tenaga_kerja_langsung_standar';
               $query = mysqli_query($koneksi, $sql); 
 	while ($row = mysqli_fetch_array($query))
        {
         echo '<option value="'.$row['id_btkl_standar'].'" > '.$row['nama_btkl_standar']."-".$row['satuan_btkl_standar'].'</option>';
        }
}else if($id_kategori == 3){
	$sql = 'select id_tetap_standar,nama_tetap_standar,"",harga_tetap_standar,"J" as status from bop_tetap_standar';
        $query = mysqli_query($koneksi, $sql); 
 	while ($row = mysqli_fetch_array($query))
        {
         echo '<option value="'.$row['id_tetap_standar'].'" > '.$row['nama_tetap_standar']."-".$row['satuan_tetap_standar'].'</option>';
        }
}else if($id_kategori == 4){
	$sql = 'select *,"O" as status from bop_variabel_standar';
                $query = mysqli_query($koneksi, $sql); 
 	while ($row = mysqli_fetch_array($query))
        {
         echo '<option value="'.$row['id_variabel_standar'].'" > '.$row['nama_variabel_standar']."-".$row['satuan_variabel_standar'].'</option>';
        }
}else if($id_kategori == 5){
	$sql = 'select *,"C" as status from custom_standar';
                        $query = mysqli_query($koneksi, $sql); 
 	while ($row = mysqli_fetch_array($query))
        {
         echo '<option value="'.$row['id_custom_standar'].'" > '.$row['nama_custom_standar']."-".$row['satuan_custom_standar'].'</option>';
        }
}
?>