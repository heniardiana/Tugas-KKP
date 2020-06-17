<?php
include('../../koneksi.php');
$cus=$_GET['id'];
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM customer WHERE id_pembeli='$cus'");
header("location:index.php?page=customer");
?>