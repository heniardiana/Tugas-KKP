<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'Letter');
//$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
$pdf->Image('bopang2.png',45,1,-1000);
$pdf->Image('bopang2.png',205,1,-1000);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(260,7,'KERIPIK BOPANG MILENIAL',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(260,7,'LAPORAN DAFTAR KONSUMEN KERIPIK BOPANG MILENIAL',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetMargins(15,2);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0);
$pdf->Cell(70,6,'NAMA KONSUMEN',1,0);
$pdf->Cell(35,6,'USERNAME',1,0);
$pdf->Cell(35,6,'PASSWORD',1,0);
$pdf->Cell(56,6,'ALAMAT',1,0);
$pdf->Cell(32,6,'No. Telp',1,1);
 
$pdf->SetFont('Arial','',12);
 
include '../../koneksi.php';
$lol = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from customer INNER JOIN chekout on customer.id_pembeli=chekout.id_pembeli");
while ($row = mysqli_fetch_array($lol)){
    $pdf->Cell(20,6,$row['id_pembeli'],1,0);
    $pdf->Cell(70,6,$row['nama'],1,0);
    $pdf->Cell(35,6,$row['username'],1,0);
    $pdf->Cell(35,6,$row['password'],1,0);
    $pdf->Cell(56,6,$row['alamat'],1,0);
    $pdf->Cell(32,6,$row['nomor_tlp'],1,1); 
}
$pdf->Cell(10,30,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(400, 50,'Jakarta, '.hari_ini().' '.tgl_indo(date('Y-m-d')), 0,1,'C');
$pdf->Cell(400, 0, "Staff Pemasaran", 0,1,'C');
$pdf->Cell(400, 10, "Niko Prayoga	 Wiratama", 0,1,'C');
$pdf->Output();
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