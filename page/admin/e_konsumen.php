<?php
include"../../koneksi.php";
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id= $_POST['id_pembeli'];

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE customer set nama='$nama',username='$username',password='$password' where id_pembeli='$id'");
	header("location:index.php?page=customer");	
?>