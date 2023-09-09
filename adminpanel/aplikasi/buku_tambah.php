<h3>Tambah Buku Tamu</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulbox">Tambah Data Buku Tamu</div>

		
		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=bukutamu&untukdi=tambah'";?> name='tambahbuku' id='tambahbuku' >
			
			<tr><td class="isiankanan" width="175px">Nama Pengirim</td><td class="isian"><input type="text" name="nama_pengirim" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="sedang"></td></tr>
			<tr><td class="isiankanan" width="175px">Subjek</td><td class="isian"><input type="text" name="subjek" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Isi Pesan</td><td class="isian"><textarea name="isi_pesan" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Tanggal Kirim</td><td class="isian"><input type="text" id="tanggal" name="tanggal_kirim" class="pendek"></td></tr>

			<tr><td class="isiankanan" width="175px">Status Buku Tamu</td>
			<td class="isian">
					<input type="radio" name="status_buku" value="1" checked/>Terima&nbsp;
					<input type="radio" name="status_buku" value="0"/>Tolak
			</td></tr>
			
	
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahbuku");
			frmvalidator.addValidation("nama_pengirim","req","Nama pengirim harus diisi");
			frmvalidator.addValidation("nama_pengirim","maxlen=30","Nama pengirim maksimal 30 karakter");
			frmvalidator.addValidation("nama_pengirim","minlen=3","Nama pengirim minimal 3 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("email","req","Email pengirim harus diisi");
			
			frmvalidator.addValidation("isi_pesan","req","Isi pesan harus diisi");
			frmvalidator.addValidation("isi_pesan","maxlen=200","Isi pesan maksimal 200 karakter");
			frmvalidator.addValidation("isi_pesan","minlen=5","Isi pesan minimal 5 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->