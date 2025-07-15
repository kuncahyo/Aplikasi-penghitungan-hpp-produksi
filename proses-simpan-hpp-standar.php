

<?php
include('koneksi1.php');

$kode = $_GET['row-1-Nama'];
$nama = $_GET['row-1-Biaya'];
$tgl_pesan = $_GET['row-1-Jumlah'];


$kode2 = $_GET['row-2-Id'];
$nama2 = $_GET['row-2-Satuan'];
$tgl_pesan2 = $_GET['row-2-Biaya2'];


echo $kode;
echo '<br>'.$nama;
echo '<br>'.$tgl_pesan;
echo '<br>'.$kode2;
echo '<br>'.$nama2;
echo '<br>'.$tgl_pesan2;
?>