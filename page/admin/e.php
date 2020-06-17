<?php
include("../../koneksi.php");
$a=$_POST['id_ketegori'];
$b=$_POST['kategori'];

 mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kategori SET   kategori='$b' WHERE id_ketegori='$a'");
 header("location:index.php?page=kategori");
?>