<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
$password = MD5($_POST[password]);
if ($pilih=='siswa' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_siswa
				(nama_siswa,nis, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, sekolah_asal, email, telepon, status_siswa, id_kelas, nama_ortu, pekerjaan_ortu)
				VALUES
				(	'$_POST[nama_siswa]',
					'$_POST[nis]',
					'$password',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_reg]',
					'$_POST[sekolah_asal]',
					'$_POST[email]',
					'$_POST[telepon]',
					'1',
					'$_POST[kelas]',
					'$_POST[nama_ortu]',
					'$_POST[pekerjaan_ortu]')");
					
	header('location:../../siswa.php');
}

elseif ($pilih=='siswa' AND $untukdi=='edit'){
	if (!empty($_POST[password])){
	mysql_query("UPDATE sh_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$_POST[nis]',
											password='$password',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											status_siswa='$_POST[status_siswa]',
											nama_ortu='$_POST[nama_ortu]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]'
											WHERE id_siswa ='$_POST[id]'");}
	else {
	mysql_query("UPDATE sh_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$_POST[nis]',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											nama_ortu='$_POST[nama_ortu]',
											status_siswa='$_POST[status_siswa]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]'
											WHERE id_siswa ='$_POST[id]'");
	}
	header('location:../../siswa.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='siswa' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_siswa WHERE id_siswa ='$_GET[id]'");					
	header('location:../../siswa.php');}

elseif ($pilih=='siswa' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_siswa WHERE id_siswa='$cek[$i]'");
	}
	header('location:../../siswa.php');
}


?>