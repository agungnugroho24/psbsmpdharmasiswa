<?php
include "../konfigurasi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");
					
					// mendapatkan nomor daftar
					date_default_timezone_set('Asia/Jakarta');
					$today = date("Ymd");
					$today = date("H:i:s");
					$id_daftar=date("Ymd").date("His");
					
session_start();
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
mysql_query("INSERT INTO sh_psb
				(id_daftar,tgl_skrg,jam_skrg, nama, nisn, jk, tempat_lahir, tanggal_lahir, agama, anak_ke, sdk, alamat, tlp, thn, noijazah, namasekolah, alamatsekolah, ayah, job_ayah, sekolah_ayah, ibu, job_ibu, sekolah_ibu, alamatortu, tlportu, wali, job_wali, sekolah_wali, alamatwali, tlpwali, upload, status_psb)
				VALUES
				(	
				    '$id_daftar',
					
					'$tgl_skrg',
					'$jam_skrg',				
				    '$_POST[nama]',
					'$_POST[nisn]',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[agama]',
					'$_POST[anak_ke]',
					'$_POST[sdk]',
					'$_POST[alamat]',
					'$_POST[tlp]',
					'$_POST[thn]',
					'$_POST[noijazah]',
					'$_POST[namasekolah]',
					'$_POST[alamatsekolah]',
					'$_POST[ayah]',
					'$_POST[job_ayah]',
					'$_POST[sekolah_ayah]',
					'$_POST[ibu]',
					'$_POST[job_ibu]',
					'$_POST[sekolah_ibu]',
					'$_POST[alamatortu]',
					'$_POST[tlportu]',
					'$_POST[wali]',
					'$_POST[job_wali]',
					'$_POST[sekolah_wali]',
					'$_POST[alamatwali]',
					'$_POST[tlpwali]',
					'$_POST[upload]',
					'0')") or die(mysql_error());
					
header ('location:../index.php?p=selesaipsb');
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=formpsb')</script>";
}
?>