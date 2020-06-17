<?php
include('../../koneksi.php');
$bk=$_GET['id'];
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM produk WHERE id_produk='$bk'");
header("location:index.php?page=produk");
 ?>