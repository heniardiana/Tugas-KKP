<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<?php
$qry_kategori = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kategori");

	?>
	<div style="margin-top:50px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
Tambah Produk
</div>
<form method="post" class="form-group" action="tambah_produk.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($kategori=mysqli_fetch_array($qry_kategori)){
	?>
			<option><?php echo $kategori['kategori']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="rasa" placeholder="Rasa Produk" class="form-control" ><br>
	<input type="text" name="tgl_produksi" placeholder="Tanggal Produksi" class="form-control datepicker" required><br>
	<input type="text" name="tgl_kadaluarsa" placeholder="Tanggal Kadaluarsa" class="form-control datepicker" required><br>
	<input type="file" name="gambar" placeholder="Gambar Produk" class="form-control" required><br>
	<div class="input-group">
	<span class="input-group-addon">Rp.</span><input type="text" name="harga" onkeyup="convertToRupiah(this);" placeholder="Harga Produk" class="form-control" required><br>
	</div><br/>
	<input type="text" name="stok" placeholder="Stok Produk" class="form-control" required><br>
	<input type="submit" name="simpan" value="simpan" class="btn btn-success"><br>
	</form>
	<!-- Include file jquery.min.js -->    
	<script src="../../js/jquery.min.js"></script>   
	<!-- Include file boootstrap.min.js -->    
	<script src="../../js/bootstrap.min.js"></script>    
	<!-- Include library Bootstrap Datepicker -->    
	<script src="../../css/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> 
	<!-- Include file custom.js -->    
	<script src="../../js/custom.js"></script>
	<script src="../../js/rupiah.js"></script>
	<script>    
	$(document).ready(function(){        
		setDatePicker()        
		setDateRangePicker(".startdate", ".enddate")        
		setMonthPicker()        
		setYearPicker()        
		setYearRangePicker(".startyear", ".endyear")    
		})    
		</script>