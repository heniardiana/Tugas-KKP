<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Pembelian Selesai</b>
</div>
<?php
$id_pembeli = $_SESSION['id_pembeli'];
$query_checkout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from  chekout where id_pembeli='$id_pembeli'");
$data_chekout = mysqli_fetch_array($query_checkout);
?>
<h3><b>Data Penerima :</b></h3>
<table>
	<tr>
		<td><b>Nama</b></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td><b>Alamat</b></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>
	<tr>
		<td><b>Nomor Telepon&nbsp;</b></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
</table>
<h3><b>Data Order</b></h3>
<?php
$qry = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_pembeli='$id_pembeli'");
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Rasa Produk</th><th>harga</th><th>qty</th><th>total harga</th>
	<?php while($keranjang=mysqli_fetch_array($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk where id_produk='$keranjang[id_produk]'");
		$d = mysqli_fetch_array($q);
		$rasa = $d['rasa']; echo $rasa;
		$qbyar = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?>
			
		</td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><?php echo $keranjang['qty']?></td>
		<td><?php echo $keranjang['total_harga']?></td>
		</tr>
<?php } ?>
<tr>
	<td colspan="3">Total harga keseluruhan</td><td>Rp.<?php echo rupiah($bayar);  $harga_new = str_replace(".", "", $bayar);?>,00</td>
</tr>
<tr>
	<td colspan="3">Ongkos Kirim (Paten)</td><td>Rp.20,000,00</td>
</tr>
<tr>	
	<td colspan="3">Total Harga</td><td>Rp.<?php $t_bayar=$bayar+20000; echo number_format($t_bayar); ?>,00</td>
</tr>
<tr>
	<td colspan="3">Diskon (15%)</td><td>Rp.<?php echo rupiah($diskon=(($bayar*15)/100)); ?>,00</td>
</tr>
<tr>	
	<td colspan="3">Total Bayar</td><td>Rp.<?php $t_bayar=$bayar+20000-$diskon; echo number_format($t_bayar); ?>,00</td>
</tr>
</table>
<p>Selanjutnya anda harus megirimkan uang yang tertera pada total bayar ke <b>No Rek 332678654390</b> atas nama <b>Heni Ardiana</b>. Setelah melakukan pembayaran anda bisa mengonfirmasi melalui <b>No.Tlp. 0815 1398 1313</b>. <a href="index.php" class="btn btn-danger"> Selesai</a> </p>
</div>
<?php
		 function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,",", ".");
		return $hasil_rupiah;}
?>