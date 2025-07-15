<?php
include('koneksi1.php');

$kode = $_GET['kode_pesan'];
$nama = $_GET['nama_pesan'];
$tgl_pesan = $_GET['tgl_pesan'];
$tgl_tempo = $_GET['tgl_tempo'];
$detail = $_GET['produk'];
$kontak = $_GET['kontak'];
$custom = $_GET['custom'];
$laba =$_GET['laba'];

$tanggaldb = date("Y-m-d",strtotime($tgl_pesan));
$tanggal_tempodb = date("Y-m-d",strtotime($tgl_tempo));


//query update
//$query = mysqli_query($koneksi,"INSERT INTO `pesanan` (`KODE_PESANAN`, `ID_PRODUK`, `ID_CUSTOM_STANDAR`, `NAMA_PELANGGAN`, `TANGGAL_PESANAN`, `JATUH_TEMPO_PESANAN`, `KONTAK`) VALUES ($kode,$detail,$custom,$nama,'$tgl_pesan','$tgl_tempo',$kontak)");
$query = mysqli_query($koneksi,"INSERT INTO `pesanan` (`KODE_PESANAN`,`KODE_RINCIAN_PRODUK`,`NAMA_PELANGGAN`,`TANGGAL_PESANAN`,`JATUH_TEMPO_PESANAN`,`KONTAK`,`LABA`) VALUES ('$kode','$detail','$nama','$tanggaldb','$tanggal_tempodb',$kontak,$laba)");
if ($query) {
 # credirect ke page index
 header("location:maintance-data-pesanan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>