<?php

require('../plugins/fpdf17/fpdf.php');
require('../inc/config.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}
function LoadDataFromSQL($sql)
{
	$hasil=mysql_query($sql) or die(mysql_error());

	$data = array();
	while($rows=mysql_fetch_array($hasil)){
		$data[] = $rows;

}
	return $data;
}


// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,165,74);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array( 7, 55, 25, 30, 30, 30, 30, 30, 30);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;

	foreach($data as $row)
	{
	
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
		$this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
		$this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
		$this->Cell($w[7],6,$row[7],'LR',0,'L',$fill);
		$this->Cell($w[8],6,$row[8],'LR',0,'L',$fill);
		$this->Ln();
		$fill = !$fill;
	
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('No', 'Id daftar', 'Tgl daftar', 'NISN', 'Nama', 'Jenis kelamin', 'Tempat lahir', 'Tanggal lahir', 'Asal sekolah');
// Data loading

$query="select No, id_daftar, tgl_skrg, nisn, nama, jk, tempat_lahir, tanggal_lahir, namasekolah from sh_psb";
 
$data = $pdf->LoadDataFromSQL($query);
$pdf->SetFont('Arial','',11);
$pdf->AddPage();

$pdf->FancyTable($header,$data);
$pdf->Output();
?>
