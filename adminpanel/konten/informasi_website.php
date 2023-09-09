		<div class="judulbox">Informasi Website</div>
		<table class="isian" style="margin:10px; font-weight: bold;";>
		<?php
		
		
		
			//Menghitung jumlah data kategori di database//
			$kategori=mysql_query("SELECT * FROM sh_kategori");
			$jmlkategori=mysql_num_rows($kategori);
			
			
			
			//Menghitung jumlah data agenda di database//
			$agenda=mysql_query("SELECT * FROM sh_agenda");
			$jmlagenda=mysql_num_rows($agenda);
			
			
			
			
			
			//Menghitung jumlah data pendaftar PSB di database//
			$psb=mysql_query("SELECT * FROM sh_psb");
			$jmlpsb=mysql_num_rows($psb);
			
			//Menghitung jumlah data kelas di database//
			$kelas=mysql_query("SELECT * FROM sh_kelas");
			$jmlkelas=mysql_num_rows($kelas);
			
			
			
			//Menghitung jumlah data guru di database//
			$guru=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru'");
			$jmlguru=mysql_num_rows($guru);
			
			//Menghitung jumlah file foto di database//
			$foto=mysql_query("SELECT * FROM sh_galeri");
			$jmlfoto=mysql_num_rows($foto);
			
			//Menghitung jumlah data staff di database//
			$staff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='staff'");
			$jmlstaff=mysql_num_rows($staff);
			
			//Menghitung jumlah data administrator di database//
			$users=mysql_query("SELECT * FROM sh_users");
			$jmlusers=mysql_num_rows($users);
			
			
			  $ip      = $_SERVER['REMOTE_ADDR'];
              $tanggal = date("Ymd");
              $waktu   = time();
			
			//Menghitung jumlah pengunjung online di database//
			  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE tanggal='$tanggal' GROUP BY ip_addres"));
			
			//Menghitung jumlah total pengunjung di database//
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(mengunjungi) FROM sh_statistik"), 0);  
			
			//Menghitung jumlah pengunjung hari ini di database//
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM sh_statistik WHERE online > '$bataswaktu'"));
		?>
			
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlusers"; ?></td><td class="isian"><a href="admin.php">Administrator</a></td>
			</tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlfoto"; ?></td><td class="isian"><a href="galeri_foto.php" >Foto</a></td>
			</tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlpsb"; ?></td><td class="isian"><a href="psb_online.php" >Pendaftar</a></td></tr>
			
			<tr>
			</tr>
			
		
			
			
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlguru"; ?></td><td class="isian"><a href="guru_staff.php">Guru</a></td>
		</tr>
			
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmlstaff"; ?></td><td class="isian"><a href="staff.php">Staff</a></td>
			</tr>
		</table>