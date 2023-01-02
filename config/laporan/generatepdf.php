<?php
require_once('../config.php');
require_once('../../library/fpdf/cellfit.php');
$no = 0;
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$query = mysqli_query($con, "SELECT nama, jenis_kelamin, gol_darah, no_telp, date(created_at) as tgl_regis FROM pasiens WHERE DATE(created_at) BETWEEN '$dari' AND '$sampai' ORDER BY DATE(created_at) DESC");
$queryKop = mysqli_query($con, "SELECT * FROM kop_surat INNER JOIN provinsi ON kop_surat.id_provinsi = provinsi.id_provinsi INNER JOIN kabupaten ON kop_surat.id_kabupaten = kabupaten.id_kabupaten");
$d_kop = mysqli_fetch_assoc($queryKop);

$img = base_url('public/assets/images/logo/rumahsakit.png');
$pdf = new FPDF_Cellfit('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->Image($img, 12, 9, 27, 27);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(35, 10, ' ', 0, 0);
$pdf->CellFitScale(120, 10, 'Rumah Sakit ' . $d_kop['nama_instansi'], 0, 1, "C");
$pdf->SetFont('Arial', '', 10);
$pdf->Multicell(0, 5, $d_kop['alamat'], 0, "C");
$pdf->Multicell(0, 5, 'Kabupaten ' . $d_kop['nama_kabupaten'] . ', Provinsi ' . $d_kop['nama_provinsi'], 0, "C");
$pdf->Multicell(0, 5, 'Email: ' . $d_kop['email'] . ', Telp: ' . $d_kop['no_telp'] . '', 0, "C");
$pdf->Cell(0, 5, '', 'B', 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, "Laporan Data Pasien Pertanggal: $dari - $sampai", 0, 0, 'L');
$pdf->Ln(7);
$pdf->Cell(8, 6, 'No.', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tanggal Register', 1, 0, 'C');
$pdf->Cell(81, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(26, 6, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(20, 6, 'Gol. Darah', 1, 0, 'C');
$pdf->Cell(26, 6, 'No Telepon', 1, 0, 'C');
if ($query->num_rows > 0) {
    while ($data = mysqli_fetch_assoc($query)) {
        $no++;
        $pdf->Ln(6);
        $pdf->Cell(8, 6, $no, 1, 0, 'C');
        $pdf->Cell(30, 6, $data['tgl_regis'], 1, 0, 'L');
        $pdf->CellFitScale(81, 6, $data['nama'], 1, 0);
        $pdf->Cell(26, 6, $data['jenis_kelamin'], 1, 0, 'L');
        $pdf->Cell(20, 6, $data['gol_darah'], 1, 0, 'L');
        $pdf->Cell(26, 6, $data['no_telp'], 1, 0, 'L');
    }
} else {
    $pdf->Ln(6);
    $pdf->Cell(0, 6, 'Data Tidak Tersedia', 1, 0, 'C');
}
$pdf->Output('I', "Laporan Data Pasien $dari - $sampai.pdf");
