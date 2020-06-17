<?php
include"koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$ceklogin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where username='$username' && password='$password'");
$ceklogin_cus = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from customer where username='$username' && password='$password'");
$datacus = mysqli_fetch_array($ceklogin_cus);
$data = mysqli_fetch_array($ceklogin);
$cekuser = $data['username'];
$cekuser_cus = $datacus['username'];
$nama_cus = $datacus['nama'];
$nama = $data['nama'];
$id = $datacus['id_pembeli'];
if($cekuser==$username)
{
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $nama;
	header("location:page/admin");
}
else if ($cekuser_cus==$username) 
{
    session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $nama_cus;
	$_SESSION['id_pembeli'] = $id;
	header("location:page/customer");	
}
else
{
	echo "Anda gagal melakukan login!!!";
	header("location:login.php?pesan=gagal");
}
?>