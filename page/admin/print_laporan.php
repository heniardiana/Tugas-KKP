<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'Letter');
//$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('bopang2.png',43,1,-1000);
$pdf->Image('bopang2.png',205,1,-1000);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(260,7,'KERIPIK BOPANG MILENIAL',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(260,7,'LAPORAN TRANSAKSI PEMBELIAN KERIPIK BOPANG MILENIAL',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetMargins(10,2);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(70,6,'NAMA KONSUMEN',1,0);
$pdf->Cell(25,6,'KATEGORI',1,0);
$pdf->Cell(25,6,'RASA',1,0);
$pdf->Cell(35,6,'TOTAL BELI',1,0);
$pdf->Cell(52,6,'TANGGAL PEMBELIAN',1,0);
$pdf->Cell(33,6,'TOTAL BAYAR',1,1);
 
$pdf->SetFont('Arial','',12);
 
include '../../koneksi.php';
$lol = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM chekout JOIN keranjang ON chekout.id_pembeli=keranjang.id_pembeli INNER JOIN produk ON keranjang.id_produk=produk.id_produk JOIN kategori ON produk.id_ketegori=kategori.id_ketegori");
while ($row = mysqli_fetch_array($lol)){
    $pdf->Cell(20,6,$row['id_keranjang'],1,0);
    $pdf->Cell(70,6,$row['nama'],1,0);
    $pdf->Cell(25,6,$row['kategori'],1,0);
    $pdf->Cell(25,6,$row['rasa'],1,0);
    $pdf->Cell(35,6,$row['qty'],1,0); 
	$pdf->Cell(52,6,$row['tanggal'],1,0); 
    $pdf->Cell(33,6,'Rp. '.rupiah($row['total_harga']).',-',1,1,'R');
}
$lol2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(total_harga) as bujank FROM chekout INNER JOIN keranjang ON chekout.id_pembeli=keranjang.id_pembeli");
while ($row2 = mysqli_fetch_array($lol2)){
$pdf->Cell(260,6,'Rp. '.rupiah($row2['bujank']).',-',0,0,'R');
}
$pdf->Cell(10,30,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(400, 50,'Jakarta, '.hari_ini().' '.tgl_indo(date('Y-m-d')), 0,1,'C');
$pdf->Cell(400, 0, "Staff Pemasaran", 0,1,'C');
$pdf->Cell(400, 10, "Niko Prayoga	 Wiratama", 0,1,'C');
$pdf->Output();
?>
<?php
		 function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,",", ".");
		return $hasil_rupiah;}
?>
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function hari_ini(){
$hari = date("D");
switch($hari) {
	case 'Sun':
		$hari_ini = "Minggu";
	break;
	case 'Mon':
		$hari_ini = "Senin";
	break;
	case 'Tue':
		$hari_ini = "Selasa";
	break;
	case 'Wed':
		$hari_ini = "Rabu";
	break;
	case 'Thu':
		$hari_ini = "Kamis";
	break;
	case 'Fri':
		$hari_ini = "Jum'at";
	break;
	case 'Sat':
		$hari_ini = "Sabtu";
	break;
	default:
		$hari_ini = "Tidak Di ketahui";
	break;
}
 return $hari_ini;
}

?>