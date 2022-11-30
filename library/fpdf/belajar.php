<?php
// memanggil library FPDF
require('fpdf.php');

 
// intance object dan memberikan pengaturan halaman PDF
//$pdf=new FPDF('L','mm','a4');
$pdf=new FPDF('L','mm',array(150,90));
$pdf->SetMargins(5,5);
$pdf->AddPage();
 
$pdf->SetFont('courier','B',15);
$pdf->Image("bg.png",0,0,150,90);
$pdf->Cell(0,15,' ',0,1);
$pdf->Cell(0,10,' ',0,1);
$pdf->Cell(0,7,'NAMA :',0,1);
$pdf->Cell(0,7,'NIK :',0,1);
$pdf->Cell(0,7,'TGL LAHIR :',0,1);



 
 

 
$pdf->Output();
 
?>