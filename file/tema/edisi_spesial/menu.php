<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">Profil</a>
				<ul>
				<?php $profil=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='0' AND status_terbit='1' ORDER BY id_info ASC");
						while($p=mysql_fetch_array($profil)) {?>
					<li><a href="<?php echo "?p=info&id=$p[id_info]"?>"><?php echo "$p[nama_info]";?></a></li>
					<?php }?>
				</ul>
			</li>
			<?php
			$menuutama=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu='1' AND status_terbit='1'");
			$hitung=mysql_num_rows($menuutama);
			if ($hitung != 0){
			while($m=mysql_fetch_array($menuutama)){
			?>
			<li><a href="<?php echo "?p=info&id=$m[id_info]"?>"><?php echo "$m[nama_info]";?></a></li>
			<?php }} ?>
			</li>
			<li><a href="">Warga Sekolah</a>
				<ul>
					<li><a href="?p=guru">Data Guru</a></li>
					<li><a href="?p=staff">Data Staff</a></li>
				</ul>
			</li>
			<li><a href="?p=galeri">Galeri</a></li>
			<li><a href="">Pendaftaran</a>
				<ul>
					<li><a href="?p=formpsb">Form pendaftaran</a></li>
					<li><a href="?p=psb">Data pendaftar</a></li>
				</ul>
			</li>
			<li><a href="adminpanel/index.php">Admin</a></li>
			</ul>