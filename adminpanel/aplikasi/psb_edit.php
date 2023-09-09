<h3>Edit Pendaftar</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontal"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php">Pengaturan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo"action=$database?pilih=psb&untukdi=edit";?> name='editpendaftar' id='editpendaftar' >
		<?php
		$edit=mysql_query("SELECT * FROM sh_psb WHERE id_daftar='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_daftar]'>";
		?>
			
			<tr><td class="isiankanan" width="175px">NISN</td><td class="isian"><input type="text" name="nisn" class="maksimal" value="<?php echo "$r[nisn]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama" class="pendek" style="width:10%" value="<?php echo "$r[nama]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Tempat lahir</td><td class="isian"><input type="text" name="tempat_lahir" class="pendek" value="<?php echo "$r[tempat_lahir]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Tanggal lahir</td><td class="isian"><input type="text" id="tanggal1" name="tanggalr_lahi" class="pendek" value="<?php echo "$r[tanggal_lahir]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Asal sekolah</td><td class="isian"><input type="text" name="namasekolah" class="pendek" value="<?php echo "$r[namasekolah]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<?php if($r[jk]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
					<?php }
					else { ?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
					<?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Agama</td><td class="isian"><input type="text" name="agama" class="pendek" value="<?php echo "$r[agama]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Anak ke</td><td class="isian"><input type="text" name="anak_ke" class="pendek" style="width:10%" value="<?php echo "$r[anak_ke]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Status dalam keluarga</td><td class="isian"><input type="text" name="sdk" class="pendek" style="width:10%" value="<?php echo "$r[sdk]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat Pendaftar</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php echo "$r[alamat]";?></textarea></td></tr>
	
			<tr><td class="isiankanan" width="175px">No. Ijazah</td><td class="isian"><input type="text" name="noijazah" class="pendek" value="<?php echo "$r[noijazah]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="Tlp" class="pendek" value="<?php echo "$r[Tlp]";?>"></td></tr>
	
			<tr><td class="isiankanan" width="175px">Nama ayah</td><td class="isian"><input type="text" name="ayah" class="maksimal" value="<?php echo "$r[ayah]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Nama ibu</td><td class="isian"><input type="text" name="ibu" class="maksimal" value="<?php echo "$r[ibu]";?>"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>

		
		</table>
</div><!--Akhir class isi kanan-->