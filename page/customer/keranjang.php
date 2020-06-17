<?php
include"../../koneksi.php";
$bayar="0";
$id_pembeli = $_SESSION['id_pembeli'];
$qry = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_pembeli='$id_pembeli'");
@$aksi = $_GET['aksi'];
if($aksi=="hapus"){
	$id_keranjang = $_GET['id'];
	$query_qty = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_keranjang='$id_keranjang'");
	$data_qty = mysqli_fetch_array($query_qty);
	$qty = $data_qty['qty'];
	$id_produk = $data_qty['id_produk'];
	$query_produk = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk where id_produk='$id_produk'");
	$data_produk = mysqli_fetch_array($query_produk);
	$stok = $data_produk['stok'];
	$stok_ubah = $stok+$qty;
	mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE produk set stok='$stok_ubah' where id_produk='$id_produk'");
	mysqli_query($GLOBALS["___mysqli_ston"], "DELETE from keranjang where id_keranjang='$id_keranjang'");
	header("location:detail.php?page=keranjang");
}
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Rasa Produk</th><th>Harga</th><th>QTY</th><th>Total Harga</th><th>Aksi</th>
	<?php while($keranjang=mysqli_fetch_array($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk where id_produk='$keranjang[id_produk]'");
		$d = mysqli_fetch_array($q);
		$rasa = $d['rasa']; echo $rasa;
		$qbyar = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?></td>
		<td><?php echo 'Rp. '.rupiah($keranjang['harga']) ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo 'Rp. '.rupiah($keranjang['total_harga'])?></td>
		<td><a href="keranjang.php?aksi=hapus&id=<?php echo $keranjang['id_keranjang']; ?>"><center><span class="glyphicon glyphicon-remove"></span></a>
		</tr>
<?php } ?>
<tr>
<input type="hidden" id='bujank' value="<?php echo $bayar ?>">
<?php $diskon="" ?>
<?php $diskon=(($bayar*15)/100); ?>
	<td colspan="3"><b>Total Harga (Belum termasuk ongkir)</b></td>
	<td>
	<?php echo 'Rp. '.rupiah($bayar).' - Rp. '.rupiah($diskon).' = '?>
	<?php echo 'Rp. '.rupiah($bayar-$diskon);  ?><h5>(Diskon 15%)</h5></td>
	<script>
        var totalBelanja = document.getElementById("bujank").value;
        if(totalBelanja > 0){
            document.write('<td><center><a href="detail.php?aksi=checkout" class="btn btn-info">checkout</a></center></td>');
        }
		else {
        document.write('Silahkan Pilih Produk Terlebih Dahulu...')};
</script>
</tr>
</table>
</div>
