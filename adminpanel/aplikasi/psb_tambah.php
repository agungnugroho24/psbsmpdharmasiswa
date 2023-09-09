<h3>Tambah Pendaftar</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontal"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php">Pengaturan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo"action=$database?pilih=psb&untukdi=tambah";?> name='tambahpendaftar' id='tambahpendaftar' >
			
	<td width="150px"><b>No. Pendaftaran</b></td><td>:</td><td><input type=text  name=no_test disabled /> <font color='red'> *) Di isi petugas</font></td></tr>
	<tr><td width="150px"><b>Nama Lengkap *</b></td><td>:</td><td><input type="text" class="sedang" name="nama"></td></tr>
	<tr><td><b>NISN</b></td><td>:</td><td><input type="text" class="pendek" name="nisn"><br></td></tr>
	<tr><td><b>Jenis Kelamin *</b></td><td>:</td><td>
	<input type="radio" name="jk" id="jk" value="L">Laki-laki&nbsp;
	<input type="radio" name="jk" id="jk" value="P">Perempuan
	</td></tr>
	<tr><td><b>Tempat, Tanggal Lahir *</b></td><td>:</td><td><input type="text" class="sedang" name="tempat_lahir">&nbsp;<input type="text" class="sedang" name="tanggal_lahir" id="tanggal"></td></tr>
	<tr><td><b>Agama</b></td><td>:</td><td><input type="text" class="sedang" name="agama"></td></tr>
	<tr><td><b>Anak ke</b></td><td>:</td><td><input type="text" class="sedang" name="anak_ke"></td></tr>
	<tr><td><b>Status dalam keluarga</b></td><td>:</td><td>		<input type="radio" name="sdk" id="jk" value="Anak kandung">Anak kandung&nbsp;
	<input type="radio" name="sdk" id="jk" value="Anak asuh">Anak Asuh&nbsp;
	<input type="radio" name="sdk" id="jk" value="Anak tiri">Anak tiri</td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamat"></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlp"></td></tr>

	<tr><td><h3><b>Data Asal Sekolah</b></h3></td></tr>
	<tr><td><b></b></td><td></tr>

	<tr><td><b>Tahun</b></td><td>:</td><td><input type="text" class="sedang" name="thn"></td></tr>
	<tr><td><b>Nomor ijazah</b></td><td>:</td><td><input type="text" class="sedang" name="noijazah"></td></tr>
	
	<tr><td><h3><b>SD / MI</b></h3></td></tr>
	<tr><td><b>Nama sekolah</b></td><td>:</td><td><input type="text" class="sedang" name="namasekolah"></td></tr>
	<tr><td><b> Alamat sekolah</b></td><td>:</td><td><input type="text" class="sedang" name="alamatsekolah"></td></tr>
	
	<tr><td><h3><b>Identitas orang tua</b></h3></td></tr>
	<tr><td><b></b></td><td></tr>
	<tr><td><b>Nama Ayah</b></td><td>:</td><td><input type="text" class="sedang" name="ayah"></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_ayah"></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_ayah"></td></tr>
	
	<tr><td><b>Nama Ibu</b></td><td>:</td><td><input type="text" class="sedang" name="ibu"></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_ibu"></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_ibu"></td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamatortu"></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlportu"></td></tr>
	
	<tr><td><b>Nama Wali Murid</b></td><td>:</td><td><input type="text" class="sedang" name="wali"></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_wali"></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_wali"></td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamatwali"></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlpwali"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahpendaftar");
			frmvalidator.addValidation("nama_pendaftar","req","Nama pendaftar harus diisi");
			frmvalidator.addValidation("nama_pendaftar","maxlen=30","Nama pendaftar maksimal 30 karakter");
			frmvalidator.addValidation("nama_pendaftar","minlen=3","Nama pendaftar minimal 3 karakter");
	  
			frmvalidator.addValidation("nem","req","NEM harus diisi");
			frmvalidator.addValidation("nem","maxlen=5","NEM maksimal 5 karakter");
			frmvalidator.addValidation("nem","minlen=2","NEM minimal 2 karakter");
			
			frmvalidator.addValidation("no_sttb","req","Nomor STTB harus diisi");
			frmvalidator.addValidation("no_sttb","minlen=4","Nomor STTB minimal 4 karakter");
			
			frmvalidator.addValidation("tanggal_sttb","req","Tanggal STTB harus diisi");
			frmvalidator.addValidation("bb","numeric","Berat badan ditulis dengan angka");
			frmvalidator.addValidation("tb","numeric","Tinggi badan ditulis dengan angka");
			
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("sekolah_asal","minlen=6","Sekolah asal minimal 6 karakter");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tempat_lahir","minlen=3","Tempat lahir minimal 3 karakter");
			
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->