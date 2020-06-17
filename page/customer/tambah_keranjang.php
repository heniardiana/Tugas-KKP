<?php
include"../../koneksi.php";
session_start();
$id_pembeli = $_SESSION['id_pembeli'];
$q_aman = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from chekout where id_pembeli='$id_pembeli'");
$aman = mysqli_num_rows($q_aman);
if($aman==0)

{
$id_produk = $_POST['id_produk'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$harga_new = str_replace(".", "", $harga);
$total_hargax = rupiah($qty*$harga_new);
$total_harga = str_replace(".", "", $total_hargax);
$qryproduk = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_produk='$id_produk'");
$q_stok = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk where id_produk='$id_produk'");
$d_stok = mysqli_fetch_array($q_stok);
$stok = $d_stok['stok'];
$siso_stok = $stok-$qty;
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE produk set stok='$siso_stok' where id_produk='$id_produk'");
$data = mysqli_fetch_array($qryproduk);
$idpro = $data['id_produk'];
if($id_produk==$idpro)
{
	$q_qty = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_produk='$id_produk'");
	$data_qty = mysqli_fetch_array($q_qty);
	$qty1 = $data_qty['qty'];
	$qty2 = $qty1 + $qty;
	$tot = $harga_new * $qty2;
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE keranjang set id_pembeli='$id_pembeli',id_produk='$id_produk',qty='$qty2',harga='$harga_new',total_harga='$tot' where id_produk='$id_produk'");
header("location:detail.php?page=keranjang");
}

else{
mysqli_query($GLOBALS["___mysqli_ston"], "INSERT into keranjang set id_pembeli='$id_pembeli',id_produk='$id_produk',qty='$qty',harga='$harga_new',total_harga='$total_harga'");
header("location:detail.php?page=keranjang");
}
}
else if($aman>=1)
{
	header("location:index.php?pesan=blok");
}
?>
<?php
		 function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,",", ".");
		return $hasil_rupiah;}
		?>