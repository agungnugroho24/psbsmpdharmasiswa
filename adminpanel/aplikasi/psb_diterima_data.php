<?php
$database="aplikasi/database/psb.php";
switch($_GET['pilih']){
default: ?>
<h3>Pendaftar yang diterima</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontalaktif"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php">Pengaturan</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
			$pendaftar=mysql_query("SELECT * FROM sh_psb WHERE status_psb='1'");
			$jmlpendaftar=mysql_num_rows($pendaftar);
			
			$pendaftarlaki=mysql_query("SELECT * FROM sh_psb WHERE status_psb='1' AND jk='L'");
			$jmllaki=mysql_num_rows($pendaftarlaki);
			
			$pendaftarperempuan=mysql_query("SELECT * FROM sh_psb WHERE status_psb='1' AND jk='P'");
			$jmlperempuan=mysql_num_rows($pendaftarperempuan);
			?>
			<a href="psb_diterima.php">Jumlah data</a> (<?php echo "$jmlpendaftar";?>)&nbsp;&nbsp;|
			<a href="<?php echo"?pilih=jk&kode=L";?>">Laki-Laki</a> (<?php echo "$jmllaki";?>)&nbsp;&nbsp;|
			<a href="<?php echo"?pilih=jk&kode=P";?>">Perempuan</a> (<?php echo "$jmlperempuan";?>)
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		
		<?php echo "<form method='POST' action='$database?pilih=terima&untukdi=hapusbanyak'>";?>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
			<div class="cari">
				
			</div>
		</div>
		<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Id Daftar</th>
				<th class="tabel">NISN</th>
				<th class="tabel">Tgl daftar</th>
				<th class="tabel">Nama</th>
				<th class="tabel">Jenis kelamin</th>
				<th class="tabel">Sekolah asal</th>
				<th class="tabel" width="150px">Pilihan</th>
			</tr>
			<?php
			$no=1;
			$psb=mysql_query("SELECT * FROM sh_psb WHERE status_psb='1' ORDER BY id_daftar DESC");
			$cek_psb=mysql_num_rows($psb);
			
			if($cek_psb > 0){
			while($p=mysql_fetch_array($psb)){
			?>
			
			<tr class="tabel">
<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$p[id_daftar] id=id$no>"; ?></td>
				<td class="tabel"><?php echo "$p[id_daftar]";?></td>
				<td class="tabel"><a href="<?php echo "?pilih=edit&id=$p[id_daftar]";?>"><b><?php echo "$p[nisn]";?></b></a></td>
				<td class="tabel"><?php echo "$p[tgl_skrg]";?></td>
				<td class="tabel"><?php echo "$p[nama]";?></td>
				<td class="tabel"><?php echo "$p[jk]";?></td>
				<td class="tabel"><?php echo "$p[namasekolah]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo"$database?pilih=psb&untukdi=hapus&id=$p[id_daftar]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo"?pilih=edit&id=$p[id_daftar]";?>">edit</a></div>
					<?php if ($p[status_psb]==0){ ?>
					<div class="terbitdata"><a href="<?php echo"$database?pilih=psb&untukdi=terima&id=$p[id_daftar]";?>">terima</a></div>
					<?php }
					else { ?>
					<div class="bataldata"><a href="<?php echo"$database?pilih=psb&untukdi=tolak&id=$p[id_daftar]";?>">tolak</a></div>
					<?php } ?>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="9"><b>DATA PENDAFTAR YANG DITERIMA BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
			         
			
		
		</table>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<?php
			$jumlahtampil=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='3'");
			$jt=mysql_fetch_array($jumlahtampil);
		?>
			    <script type="text/javascript"><!--
        var pager = new Pager('results', <?php echo "$jt[isi_pengaturan]"; ?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>
		</form>
</div><!--Akhir class isi kanan-->
		<?php break;
		
		case "tambah":
			include "aplikasi/psb_tambah.php";
		break;
		
		case "edit":
			include "aplikasi/psb_edit.php";
		break;
		
		case "jenkel":
			include "aplikasi/psb_diterima_jenkel.php";
		break;
		
		case "pencarian":
			include "aplikasi/psb_diterima_pencarian.php";
		}
		?>
	