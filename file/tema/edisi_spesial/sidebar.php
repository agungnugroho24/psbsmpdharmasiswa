<div class="kotakSidebar" id="kecil">
	<div class="pengumuman"><!-- Awal menampilkan pengumuman paling baru-->
	<link rel="stylesheet" href="style1.css" type="text/css" />
<a href="#popup">
				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "<h4>$peng[judul_pengumuman]</h4><br>
				<p>$peng[isi_pengumuman]</p>
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				else {
				?>
				</a>

				<h4>PENGUMUMAN</h4>
				<p><b>Belum ada pengumuman</b></p>
				<?php } ?>
				</div>

			<div id="popup">
			<div class="window">
			<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php echo "$r[isi_pengaturan2]";?>
				<?php
				$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC");
				$cek_pengumuman=mysql_num_rows($pengumuman);
				
				if($cek_pengumuman > 0){
				$peng=mysql_fetch_array($pengumuman);
				echo "
				<p><b>Diterbitkan pada: $peng[tanggal_pengumuman]</b></p>
				<p><b>Oleh: $peng[nama_lengkap_users]</b></p>";
				}
				?>
				<a href="#" class="close-button" title="Close">X</a>
			</div>
		</div>
</div>

			<div id="kecil">
			<h3>Galeri Terbaru</h3>
       <?php
			$poto=mysql_query("SELECT * FROM sh_galeri ORDER BY id_galeri DESC LIMIT 4");
			$hitungfoto=mysql_num_rows($poto);
			
			if($hitungfoto > 0){
			while($ph=mysql_fetch_array($poto)){
			?>
			<p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php echo "$ph[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img src="images/foto/galeri/<?php echo "$ph[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar"/></a>
			</p>
			<?php }}
			else {?>
			<b>Foto belum ada</b>
			<?php } ?>
			</div>
			