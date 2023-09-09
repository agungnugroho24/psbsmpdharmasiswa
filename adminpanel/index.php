<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	header('location:login.php');
	exit;
}
else{ ?>
<!--Memanggil awal halaman-->
<?php include "konten/awal.php"; ?>
<body>
<div id="wrapper"><!--Awal id wrapper-->
	<div id="atas"><!--Awal id atas-->
	
	<!--Memanggil bagian header-->
	<?php include "konten/header.php"; ?> 
	
	</div><!--Akhir id atas-->
	<div class="clear"></div>
	
	<div id="konten"><!--Awal id konten-->
		<div id="samping"><!--Awal id samping-->
		
			<!--Menu yang ditampilkan sesuai dengan halaman yang tampil pada browser (kelas aktif)-->
			<div class="menu"><div class="isimenuHome aktif"><a href="index.php">Beranda</a></div></div>
			<div class="menu"><div class="isimenuInformasi"><a href="informasi_sekolah.php">Informasi Sekolah</a></div></div>
			<div class="menu"><div class="isimenuGuru"><a href="guru_staff.php">Guru dan Staff</a></div></div>
			
			<div class="menu"><div class="isimenuPSB"><a href="psb_online.php">PSB Online</a></div></div>
			<div class="menu"><div class="isimenuAlbum"><a href="album_galeri.php">Album Galeri</a></div></div>
			<div class="menu"><div class="isimenuAdmin"><a href="admin.php">Menejemen Admin</a></div></div>
			<div class="menu"><div class="isimenuAdmin"><a href="pengumuman.php">Pengumuman</a></div></div>
		</div><!--Akhir id samping-->
	
		<div id="kanan"><!--Awal id kanan-->
			<h3>Dashboard</h3>
			
				<div class="kanankecil">
				<!--menampilkan informasi website-->
				<?php include "konten/informasi_website.php"; ?>
				</div>

	
				
			
		</div><!--Akhir id kanan-->
	
	</div><!--Akhir id konten-->
	<div class="clear"></div>
	
</div><!--Akhir id wrapper-->

	<div class="clear"></div>
	<!--Memanggil bagian footer-->
<?php include "konten/footer.php"; }?>
