<h3>Tambah Kelas</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontalaktif"><a href="kelas.php">Kelas</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo"action='$database?pilih=kelas&untukdi=tambah'";?> name='tambahkelas' id='tambahkelas' >
			
			<tr><td class="isiankanan" width="175px">Nama Kelas</td><td class="isian"><input type="text" name="nama_kelas" class="maksimal"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahkelas");
			frmvalidator.addValidation("nama_kelas","req","Nama kelas harus diisi");
			frmvalidator.addValidation("nama_kelas","maxlen=15","Nama kelas maksimal 15 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->