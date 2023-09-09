<?php
include "../../../konfigurasi/koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
if ($pilih=='psb' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_psb
				(tgl_skrg, , jam_skrg, nama, nisn, jk, tempat_lahir, tanggal_lahir, agama, anak_ke, sdk, alamat, Tlp, thn, noijazah, namasekolah, alamatsekolah, ayah, job_ayah, sekolah_ayah, ibu, job_ibu, sekolah_ibu, alamatortu, tlportu, wali, job_wali, sekolah_wali, alamatwali, tlpwali, polling, status_psb)
				VALUES
				(	'$tgl_skrg',
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
					'$_POST[polling]',
					'0')");
					
	header('location:../../psb_online.php');
}

elseif ($pilih=='psb' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_psb SET 		nama='$_POST[nama]',
										jk='$_POST[jk]',
										nisn='$_POST[nisn]',
										namasekolah='$_POST[namasekolah]',
										noijazah='$_POST[noijazah]',
										tanggal_lahir='$_POST[tanggal_lahir]',
										tanggal_lahir='$_POST[tanggal_lahir]',
										agama='$_POST[agama]',
										alamat='$_POST[alamat]',
										tgl_skrg='$tgl_skrg',
										ayah='$_POST[ayah]',
										ibu='$_POST[ibu]',
										alamatortu='$_POST[alamatortu]',
										polling_psb='$_POST[polling]',
										Tlp='$_POST[Tlp]',
										WHERE id_daftar ='$_POST[id_daftar]'");
	header('location:../../psb_online.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data psb
elseif ($pilih=='psb' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php');}
	
elseif ($pilih=='psb' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php');}
	
elseif ($pilih=='psb' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php');}

elseif ($pilih=='psb' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_daftar='$cek[$i]'");
	}
	header('location:../../psb_online.php');
}

//Dibawah ini digunakan pada saat posisi tampil data psb laki laki
elseif ($pilih=='laki' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=L');}
	
elseif ($pilih=='laki' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=L');}
	
elseif ($pilih=='laki' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=L');}

elseif ($pilih=='laki' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_daftar='$cek[$i]'");
	}
	header('location:../../psb_online.php?pilih=jk&kode=L');
}

//Dibawah ini digunakan pada saat posisi tampil data psb perempuan
elseif ($pilih=='perempuan' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=P');}
	
elseif ($pilih=='perempuan' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=P');}
	
elseif ($pilih=='perempuan' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jk&kode=P');}

elseif ($pilih=='perempuan' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_daftar='$cek[$i]'");
	}
	header('location:../../psb_online.php?pilih=jk&kode=P');
}


//Dibawah ini digunakan pada saat posisi tampil data psb diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}
	
elseif ($pilih=='terima' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}
	
elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_daftar ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}

elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_daftar='$cek[$i]'");
	}
	header('location:../../psb_diterima.php');
}


?>