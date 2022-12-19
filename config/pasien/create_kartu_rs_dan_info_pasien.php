<?php

// memanggil library php qrcode
require_once "../../library/phpqrcode/qrlib.php";
$date = date("d-m-Y", strtotime($tanggal_lahir));
// nama folder tempat penyimpanan file qrcode
$penyimpanan = "../../library/phpqrcode/temp/";
$img = base_url('public/assets/images/logo/logo1.png');
$queryKop = mysqli_query($con, "SELECT * FROM kop_surat INNER JOIN provinsi ON kop_surat.id_provinsi = provinsi.id_provinsi INNER JOIN kabupaten ON kop_surat.id_kabupaten = kabupaten.id_kabupaten");
$d_kop = mysqli_fetch_assoc($queryKop);

// membuat folder dengan nama "temp"
if (!file_exists($penyimpanan))
    mkdir($penyimpanan);

//-------------------------------------CREATE QR KARTU RS-------------------------------------------------------------

// isi qrcode yang ingin dibuat. akan muncul saat di scan, disini isinya link kartu rs
$isi = base_url('files/') . $kartu_rs . '.pdf';

// perintah untuk membuat qrcode dan menyimpannya dalam folder temp
QRcode::png($isi, $penyimpanan . "$kartu_rs.png");

//----------------------------------CREATE QR KARTU INFORMASI PASIEN---------------------------------------------------

// isi qrcode yang ingin dibuat. akan muncul saat di scan, disini isinya link kartu informasi pasien
$isi = base_url('files/') . $info_pasien . '.pdf';

// perintah untuk membuat qrcode dan menyimpannya dalam folder temp
QRcode::png($isi, $penyimpanan . "$info_pasien.png");

//---------------------------------------------------------------------------------------------------------------------


// memanggil library FPDF
require_once "../../library/fpdf/cellfit.php";


//----------------------------------CREATE PDF KARTU RS----------------------------------------------------------------


// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF_Cellfit('L', 'mm', array(150, 90)); #ukuran kertas lanscape, 150x90mm
$pdf->SetMargins(5, 5); #margin atas, samping
$pdf->AddPage();

$pdf->SetFont('courier', 'B', 15); #font dan ukuran
$pdf->Image("../../library/fpdf/bg_6.png", 0, 0, 150, 90);  #import background rs bapakmu, (angka ke 1,2 = koordinat) (angka ke3,4 = ukuran)
$pdf->Image($img, 10, 0, 30, 30);
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(255, 255, 255);
$pdf->Multicell(0, 8, $d_kop['nama_instansi'], 0, "C");
$pdf->SetFont('Arial', '', 6);
$pdf->Multicell(0, 4, $d_kop['alamat'], 0, "C");
$pdf->Multicell(0, 4, 'Kabupaten ' . $d_kop['nama_kabupaten'] . ', Provinsi ' . $d_kop['nama_provinsi'], 0, "C");
$pdf->Multicell(0, 4, 'Email: ' . $d_kop['email'] . ', Telp: ' . $d_kop['no_telp'] . '', 0, "C");
$pdf->Image("../../library/phpqrcode/temp/$kartu_rs.png", 120, 40, 30, 30); #import barcodenya            -------------------; ; --------------------------
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(15);
$pdf->Multicell(0, 4, 'KARTU PASIEN', 0, "L");
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(35, 7, 'NIK', 0, 0);
$pdf->Cell(3, 7, ':', 0, 0);
$pdf->Cell(0, 7, $nik, 0, 0);
$pdf->Ln(5);
$pdf->Cell(35, 7, 'Nama', 0, 0);
$pdf->Cell(3, 7, ':', 0, 0);
$pdf->Cell(0, 7, $nama, 0, 0);
$pdf->Ln(5);
$pdf->Cell(35, 7, 'Alamat', 0, 0);
$pdf->Cell(3, 7, ':', 0, 0);
$pdf->Cell(0, 7, $alamat, 0, 0);
$pdf->Ln(5);
$pdf->Cell(35, 7, 'Tanggal Lahir', 0, 0);
$pdf->Cell(3, 7, ':', 0, 0);
$pdf->Cell(0, 7, $date, 0, 0);

# cetak pdf
$filename = "../../files/$kartu_rs.pdf";
$pdf->Output($filename, 'F');


//-----------------------------------------------------------------------------------------------------------------------


//----------------------------------CREATE PDF KARTU INFORMASI PASIEN----------------------------------------------------


// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF_Cellfit('P', 'mm', 'a4'); #ukuran kertas portrait, a4
$pdf->SetMargins(5, 5); #margin atas, samping
$pdf->AddPage();

$pdf->SetFont('arial', 'B', 11); #font dan ukuran
$pdf->Image("../../library/fpdf/bg3.png", 0, 0, 210, 297);         #import background rs bapakmu, (angka ke 1,2 = koordinat) (angka ke3,4 = ukuran)
$pdf->Image("../../library/phpqrcode/temp/$info_pasien.png", 170, 19, 33, 33); #import barcodenya  -------------------; ; --------------------------
$pdf->Cell(0, 15, ' ', 0, 1);
$pdf->Cell(0, 20, ' ', 0, 1);
$pdf->Cell(0, 30, ' ', 0, 1);
$pdf->Cell(20, 7, 'NIK', 0, 0);
$pdf->CellFitScale(110, 7, ' : ' . $nik, 0, 0);
$pdf->Cell(26, 7, 'Tempat Lahir', 0, 0);
$pdf->CellFitScale(42, 7, ' : ' . $tempat_lahir, 0, 1);
$pdf->Cell(20, 7, 'Nama', 0, 0);
$pdf->CellFitScale(110, 7, ' : ' . $nama, 0, 0);
$pdf->Cell(26, 7, 'Jenis Kelamin', 0, 0);
$pdf->CellFitScale(42, 7, ' : ' . $jenis_kelamin, 0, 1);
$pdf->Cell(20, 7, 'Tgl. Lahir', 0, 0);
$pdf->CellFitScale(110, 7, ' : ' . $date, 0, 0);
$pdf->Cell(26, 7, 'Gol. Darah', 0, 0);
$pdf->CellFitScale(42, 7, ' : ' . $gol_darah, 0, 1);
$pdf->Cell(20, 7, 'Alamat', 0, 0);
$pdf->Cell(3.5, 7, ' :', 0, 0);
$pdf->MultiCell(110, 7, $alamat, 0, 0);


# cetak pdf
$filename = "../../files/$info_pasien.pdf";
$pdf->Output($filename, 'F');

//-----------------------------------------------------------------------------------------------------------------------
