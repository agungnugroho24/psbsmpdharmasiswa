<?php

// nama file

$namaFile = "laporan-psb-antara-$_POST[awal]-sampai-$_POST[akhir].xls";

// Function penanda awal file (Begin Of File) Excel

function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

// Function penanda akhir file (End Of File) Excel

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

// Function untuk menulis data (angka) ke cell excel

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

// Function untuk menulis data (text) ke cell excel

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

// header file excel

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,
        pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

// header untuk nama file
header("Content-Disposition: attachment;
        filename=".$namaFile."");

header("Content-Transfer-Encoding: binary ");

xlsBOF();
xlsWriteLabel(0,0,"NO");  
xlsWriteLabel(0,1,"ID DAFTAR");               
xlsWriteLabel(0,2,"TANGGAL DAFTAR");               
xlsWriteLabel(0,3,"WAKTU DAFTAR");              
xlsWriteLabel(0,4,"NAMA");
xlsWriteLabel(0,5,"NISN");
xlsWriteLabel(0,6,"JENIS KELAMIN");  
xlsWriteLabel(0,7,"TEMPAT LAHIR");
xlsWriteLabel(0,8,"TANGGAL LAHIR");
xlsWriteLabel(0,9,"AGAMA"); 
xlsWriteLabel(0,10,"ANAK KE");
xlsWriteLabel(0,11,"STATUS DALAM KELUARGA"); 
xlsWriteLabel(0,12,"ALAMAT"); 
xlsWriteLabel(0,13,"TELEPON"); 
xlsWriteLabel(0,14,"TAHUN LULUS SD/MI"); 
xlsWriteLabel(0,15,"NOMOR IJAZAH SD/MI"); 
xlsWriteLabel(0,16,"ASAL SEKOLAH"); 
xlsWriteLabel(0,17,"ALAMAT SEKOLAH"); 
xlsWriteLabel(0,18,"NAMA AYAH"); 
xlsWriteLabel(0,19,"PEKERJAAN AYAH"); 
xlsWriteLabel(0,20,"SEKOLAH AYAH"); 
xlsWriteLabel(0,21,"NAMA IBU"); 
xlsWriteLabel(0,22,"PEKERJAAN IBU");
xlsWriteLabel(0,23,"SEKOLAH IBU");
xlsWriteLabel(0,24,"ALAMAT ORANG TUA");
xlsWriteLabel(0,25,"TELEPON ORANG TUA");
xlsWriteLabel(0,26,"NAMA WALI");
xlsWriteLabel(0,27,"PEKERJAAN WALI");
xlsWriteLabel(0,28,"SEKOLAH WALI");
xlsWriteLabel(0,29,"ALAMAT WALI");
xlsWriteLabel(0,30,"TELEPON WALI");
xlsWriteLabel(0,31,"Upload");
xlsWriteLabel(0,32,"STATUS PSB");


include "../../konfigurasi/koneksi.php";


$query = "SELECT * FROM sh_psb WHERE tgl_skrg BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ORDER BY No DESC";
$hasil = mysql_query($query);

$noBarisCell = 1;

$noData = 1;

while ($data = mysql_fetch_array($hasil))
{
   xlsWriteNumber($noBarisCell,0,$data['No']);
   xlsWriteNumber($noBarisCell,1,$data['id_daftar']);
   xlsWriteLabel($noBarisCell,2,$data['tgl_skrg']);
   xlsWriteLabel($noBarisCell,3,$data['jam_skrg']);
   xlsWriteLabel($noBarisCell,4,$data['nama']);
   xlsWriteNumber($noBarisCell,5,$data['nisn']);
   xlsWriteLabel($noBarisCell,6,$data['jk']);
   xlsWriteLabel($noBarisCell,7,$data['tempat_lahir']);
   xlsWriteLabel($noBarisCell,8,$data['tanggal_lahir']);
   xlsWriteLabel($noBarisCell,9,$data['agama']);
   xlsWriteLabel($noBarisCell,10,$data['anak_ke']);
   xlsWriteNumber($noBarisCell,11,$data['sdk']);
   xlsWriteNumber($noBarisCell,12,$data['alamat']);
   xlsWriteLabel($noBarisCell,13,$data['Tlp']);
   xlsWriteNumber($noBarisCell,14,$data['thn']);
   xlsWriteLabel($noBarisCell,15,$data['noijazah']);
   xlsWriteLabel($noBarisCell,16,$data['namasekolah']);
   xlsWriteLabel($noBarisCell,17,$data['alamatsekolah']);
   xlsWriteLabel($noBarisCell,18,$data['ayah']);
   xlsWriteLabel($noBarisCell,19,$data['job_ayah']);
   xlsWriteLabel($noBarisCell,20,$data['sekolah_ayah']);
   xlsWriteLabel($noBarisCell,21,$data['ibu']);
   xlsWriteLabel($noBarisCell,22,$data['job_ibu']);
   xlsWriteLabel($noBarisCell,23,$data['sekolah_ibu']);
   xlsWriteLabel($noBarisCell,24,$data['alamatortu']);
   xlsWriteLabel($noBarisCell,25,$data['tlportu']);
   xlsWriteLabel($noBarisCell,26,$data['wali']);
   xlsWriteLabel($noBarisCell,27,$data['job_wali']);
   xlsWriteLabel($noBarisCell,28,$data['sekolah_wali']);
   xlsWriteLabel($noBarisCell,29,$data['alamatwali']);
   xlsWriteLabel($noBarisCell,30,$data['tlpwali']);
   xlsWriteLabel($noBarisCell,31,$data['Upload']);
   xlsWriteLabel($noBarisCell,32,$data['status_psb']);

   $noBarisCell++;
   $noData++;
}

// memanggil function penanda akhir file excel
xlsEOF();
exit();

?>
