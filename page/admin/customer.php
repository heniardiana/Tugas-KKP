<?php
$q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM customer");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#cd3333;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
<b>DATA CUSTOMER</b>
</div>
<table class="table table-bordered">
		<th style=" background: #E6E6FA; "><center>Nama Customer</center></th>
 		<th style=" background: #E6E6FA; ""><center>Username</center></th>
 		<th style=" background: #E6E6FA; ""><center>Password</center></th>
 		<th style=" background: #E6E6FA; ""><center>Aksi</center></th>
	<?php while($c=mysqli_fetch_array($q)){?>
	<tr>
		<td><?php echo $c['nama']; ?></td>
 		<td><?php echo $c['username']; ?></td>
 		<td><?php echo $c['password']; ?></td>
		<td><a href="index.php?page=editkonsumen&id=<?php echo $c['id_pembeli']; ?>"><center><span class="glyphicon glyphicon-pencil"></span></a> || <a href="hapus_cus.php?id=<?php echo $c['id_pembeli']; ?> "><span class="glyphicon glyphicon-trash"></span></center></a></td>
	</tr>
	<?php } ?>
</table>
<a href="laporan_customer.php" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-print"></span> Print 
			</a>