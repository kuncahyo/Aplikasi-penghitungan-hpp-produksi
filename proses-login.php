<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi1.php';
 
// menangkap data yang dikirim dari form
$username =mysqli_real_escape_string($koneksi,$_POST['username']);
$pass =mysqli_real_escape_string($koneksi, md5($_POST['password']));
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$pass'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
echo "select * from user where username='$username' and password='$pass'";
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from user where username='$username' and password='$pass'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$_SESSION['nama'] = $sesi['username'];
	$_SESSION['type'] = $sesi['type'];
	header("location:dashboard.php");
}else{
	echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba login,cek username atau password anda.');location.replace('index.php');</script>";
    
}
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>