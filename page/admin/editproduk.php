<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<?php
include"../../koneksi.php";
$e=$_GET['id'];
$edit=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM produk WHERE id_produk='$e'");
$produk = mysqli_fetch_array($edit);
?>
<?php
		 function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,",", ".");
		return $hasil_rupiah;}
		?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Produk
</div>
<form action="e_produk.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_produk" class="form-control" value ="<?php echo $produk['id_produk'];?>">
 		<b>Kategori Produk :</b><select name="kategori" class="form-control">
 			<?php
 			$d = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kategori");
 			while($data = mysqli_fetch_array($d)){ ?>;
 			<option> <?php echo $data['kategori']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Rasa Produk :</b> <input type="text" name="rasa" class="form-control" value ="<?php echo $produk['rasa'];?>" required><br>
 		<b>Tanggal Produksi :</b><input type="text" name="tgl_produksi" class="form-control datepicker" value ="<?php echo $produk['tgl_produksi'];?>" required><br>
 		<b>Tanggal Kadaluarsa : </b><input type="text" name="tgl_kadaluarsa" class="form-control datepicker" value ="<?php echo $produk['tgl_kadaluarsa'];?>" required><br>
		 <b>Gambar Produk : </b><input type="file" name="gambar" class="form-control" value ="<?php echo $produk['gambar'];?>" required><br>
		 <b>Harga Produk : </b>
		 <div class="input-group"><span class="input-group-addon">Rp.</span>
		 <input type="text" name="harga" class="form-control" onkeyup="convertToRupiah(this);" value ="<?php echo rupiah($produk['harga']);?>" required><br>
		 
		</div><br/>
		 <b>Stok Produk : </b><input type="text" name="stok" class="form-control" value ="<?php echo $produk['stok'];?>" required><br>
 		<td><input type="submit" class="btn btn-success" value="simpan">
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
		
