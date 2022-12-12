<?php

// memanggil library php qrcode
require_once "../../library/phpqrcode/qrlib.php";
$date = date("d-m-Y", strtotime($tanggal_lahir));
// nama folder tempat penyimpanan file qrcode
$penyimpanan = "../../library/phpqrcode/temp/";

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
$pdf->Image("../../library/fpdf/bg2.png", 0, 0, 150, 90);  #import background rs bapakmu, (angka ke 1,2 = koordinat) (angka ke3,4 = ukuran)
$pdf->Image("../../library/phpqrcode/temp/$kartu_rs.png", 120, 60, 30, 30); #import barcodenya            -------------------; ; --------------------------
$pdf->Cell(0, 15, ' ', 0, 1);
$pdf->Cell(0, 10, ' ', 0, 1);
$pdf->Cell(38, 7, 'NAMA      : ', 0, 0);
$pdf->CellFitScale(0, 7, $nama, 0, 1);
$pdf->Cell(0, 7, 'NIK       : ' . $nik, 0, 1);
$pdf->Cell(0, 7, 'TGL LAHIR : ' . $date, 0, 1);

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
