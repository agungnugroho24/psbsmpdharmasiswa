<h3>Tambah Pengumuman</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database?pilih=pengumuman&untukdi=edit' name='pengumuman_edit' id='pengumuman_edit'>";
		$edit=mysql_query("SELECT * FROM sh_pengumuman WHERE id_pengumuman='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_pengumuman]'>";
		?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_pengumuman" value="<?php echo "$r[judul_pengumuman]";?>" ></td></tr>
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_pengumuman"><?php echo "$r[isi_pengumuman]";?></textarea></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pengumuman_edit");
				frmvalidator.addValidation("judul_pengumuman","req","Judul Pengumuman harus diisi");
				frmvalidator.addValidation("judul_pengumuman","maxlen=30","Maksimal karakter untuk Judul Pengumuman adalah 30");
				frmvalidator.addValidation("judul_pengumuman","minlen=3","Minimal karakter untuk Judul Pengumuman adalah 3");
				
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->