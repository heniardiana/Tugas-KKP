<?php
include"koneksi.php";
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$qrycus = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from customer where username='$username' && password='$password'");
$datacus = mysqli_fetch_array($qrycus);
$usercus = $datacus['username'];
$passcus = $datacus['password'];
if($usercus==$username && $passcus==$password)
{
	header("location:daftar.php?pesan=sama");
}
else{
	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT into customer set nama='$nama', username='$username', password='$password'");
header("location:login.php?pesan=berhasil");
}
?>