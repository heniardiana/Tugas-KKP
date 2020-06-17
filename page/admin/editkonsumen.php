<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../koneksi.php";
$e=$_GET['id'];
$edit=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM customer WHERE id_pembeli='$e'");
$produk = mysqli_fetch_array($edit);
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Produk
</div>
<form action="e_konsumen.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_pembeli" class="form-control" value =" <?php  echo $produk['id_pembeli'];?>">
 		<br>
 		<b>Nama Konsumen :</b> <input type="text" name="nama" class="form-control" value ="<?php  echo $produk['nama'];?>" ><br>
 		<b>Username :</b><input type="text" name="username" class="form-control" value ="<?php  echo $produk['username'];?>"><br>
 		<b>Password : </b><input type="text" name="password" class="form-control" value ="<?php  echo $produk['password'];?>"><br>
 		<td><input type="submit" class="btn btn-success" value="simpan">
</form>
