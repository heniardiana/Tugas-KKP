<?php
include('../../koneksi.php');
$bk=$_GET['id'];
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM kategori WHERE id_ketegori='$bk'");
header("location:index.php?page=kategori");
 ?>