<?php
include"../../koneksi.php";
$id = $_GET['id'];
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE chekout set status_terima='sudah diterima' where id_pembeli='$id'");
header("location:index.php?pesan=suwon");
?>