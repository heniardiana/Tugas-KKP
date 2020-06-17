<?php
include"koneksi.php";
$kat = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kategori");
while($data_kat = mysqli_fetch_array($kat)){
?>
<li><a href="index.php?id=<?php echo $data_kat['id_ketegori'] ?>"><?php echo $data_kat['kategori']; ?></a></li>
<?php } ?>