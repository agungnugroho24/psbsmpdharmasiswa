<?php
// show all errors and warning
  ini_set('display_errors', 0);
  error_reporting(E_ALL);

switch($_GET['p']){
default:
?>		
		<?php
		$cek_slidehome=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND status_headline='1'");
		$hasil_slide=mysql_num_rows($cek_slidehome);
		
		if($hasil_slide > 0){
		?>
		<div id="headlineFrame">
			<div id="slides">

	<!-- End HEAD section -->

	<!-- Start BODY section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/1.jpg" alt="Baksos" title="Pemanasan olahraga" id="wows1_0"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="data1/images/1.jpg" title="Pemanasan olahraga"><img src="data1/tooltips/1.jpg" alt="Baksos"/>1</a>
<a href="data1/images/2.jpg" title="Ekskul klub komputer">2</a>
<a href="data1/images/2.jpg" title="Ekskul Marching Band">3</a>
<a href="data1/images/3.jpg" title="Kewirausahaan">4</a>
<a href="data1/images/4.jpg" title="Kosidah SMP">5</a>
</div></div>
<span class="wsl"><a href="#">Slideshow HTML</a> </span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End BODY section -->
	
				<div class="slides_container">
					

					
					
				</div>
			</div>
		</div>
		<?php } ?>
	
		<div id="konten">
			<div id="lebar">
			<?php
			$sambutan=mysql_query("SELECT * FROM sh_info_sekolah WHERE id_info='1'");
			$sm=mysql_fetch_array($sambutan);
			?>
			<h4><?php echo "$sm[nama_info]";?></h4><br>
			<p><?php echo "$sm[isi_info]";?></p>
			</div>
			
			
			    
		

			

			
		<div class="clear"></div>
		</div>
<?php break;?>		

<!--Menampilkan informasi sekolah, yaitu profil sekolah-->
<?php case "info":
$info=mysql_query("SELECT * FROM sh_info_sekolah WHERE id_info='$_GET[id]'");
$r=mysql_fetch_array($info);?>
<div id="konten">
<div id="lebar">
<h3><?php echo "$r[nama_info]";?></h3>
<p><?php echo "$r[isi_info]";?></p>
</div>
</div>
<?php break;?>


<!--Menampilkan berita secara keseluruhan-->
<?php case "berita":?>

<div id="konten">
<div id="lebar">
<h3>Berita</h3><br>

<?php	$batas= 5;
		$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_berita WHERE status_terbit='1'");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' ORDER BY id_berita DESC LIMIT $posisi, $batas");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=berita&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=berita&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { ?>
<b>Data berita belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan hasil pencarian berita-->
<?php case "pencarian":
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>
<div id="konten">
<div id="lebar">
<h3>Hasil Pencarian dengan kata kunci <a href="">"<?php echo "$cari"?>"</a></h3><br><br>
<?php
$pencarian =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND judul_berita LIKE '%$cari%' ORDER BY id_berita DESC");
$hitung=mysql_num_rows($pencarian);

if ($hitung > 0){
while ($r=mysql_fetch_array($pencarian)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "<p>Berita tidak ditemukan</p>";
}?>
</div>
</div>
<?php break ?>


<!--Menampilkan berita berdasarkan kategori-->
<?php case "katberita":?>

<div id="konten">
<div id="lebar">
<?php
$nama_kategori=mysql_query("SELECT * FROM sh_kategori WHERE id_kategori='$_GET[id]'");
$nk=mysql_fetch_array($nama_kategori);
$jml_berita_kat=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND id_kategori='$_GET[id]'");
$hitung_berita_kat=mysql_num_rows($jml_berita_kat);
?>
<h3>Ada <?php echo $hitung_berita_kat?> berita dalam kategori <u><?php echo $nk[nama_kategori]?></u></h3><br>

<?php
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND sh_berita.id_kategori='$_GET[id]' ORDER BY id_berita DESC");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data berita dalam kategori <?php echo $nk[nama_kategori]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php case "userberita":?>

<div id="konten">
<div id="lebar">
<?php
$nama_user=mysql_query("SELECT * FROM sh_users WHERE s_username='$_GET[user]'");
$nu=mysql_fetch_array($nama_user);
$hitung_user_berita=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND s_username='$_GET[user]'");
$jml_berita_user=mysql_num_rows($hitung_user_berita);
?>
<h3>Ada <?php echo $jml_berita_user?> berita yang ditulis oleh <u><?php echo $nu[nama_lengkap_users]?></u></h3><br>

<?php
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND sh_berita.s_username='$_GET[user]' ORDER BY id_berita DESC");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data berita yang ditulis oleh <?php echo $nu[nama_lengkap_users]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan berita berdasarkan penulis-->
<?php case "tglberita":?>

<div id="konten">
<div id="lebar">
<?php
$hitung_tgl_berita=mysql_query("SELECT * FROM sh_berita WHERE status_terbit='1' AND tanggal_posting='$_GET[tgl]'");
$jml_berita_tgl=mysql_num_rows($hitung_tgl_berita);
$tgl=mysql_fetch_array($hitung_tgl_berita);
?>
<h3>Ada <?php echo $jml_berita_tgl?> berita yang ditulis pada <u><?php echo $tgl[tanggal_posting]?></u></h3><br>

<?php
$berita =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND sh_berita.tanggal_posting='$_GET[tgl]' ORDER BY id_berita DESC");
$cek_berita=mysql_num_rows($berita);

if($cek_berita > 0){
while ($r=mysql_fetch_array($berita)){
$hitung_komen=mysql_query("SELECT * FROM sh_komentar WHERE id_berita='$r[id_berita]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[id_berita]'>$r[judul_berita]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r[isi_berita]); 
						$isi = substr($isi_berita,0,450);
if ($r[gambar_kecil] != 'no_image.jpg'){
echo "<p><img src='images/$r[gambar_kecil]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detberita&id=$r[id_berita]'>Baca selengkapnya...</a></p><br>";
}}	
}
else { ?>
<b>Data berita yang ditulis oleh <?php echo $nu[nama_lengkap_users]?> belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan detail berita-->
<?php case "detberita": ?>
<?php
$pencarian =mysql_query("SELECT * FROM sh_berita, sh_kategori, sh_users WHERE sh_berita.id_kategori=sh_kategori.id_kategori AND sh_berita.s_username=sh_users.s_username AND status_terbit='1' AND id_berita='$_GET[id]' ORDER BY id_berita DESC");
$r=mysql_fetch_array($pencarian);
?>
<div id="konten">
<div id="lebar">
<h3><?php echo "$r[judul_berita]";?></h3>
<?php echo "
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tanggal_posting]'>$r[tanggal_posting]</a>, oleh : <a href='?p=userberita&user=$r[s_username]'>$r[nama_lengkap_users]</a>, Kategori: <a href='?p=katberita&id=$r[id_kategori]'>$r[nama_kategori]</a></small><br>
<p>$r[isi_berita]</p><br>";?>

<h3>Berita Lainnya</h3>
<ul style ="list-style: none; padding-left: 20px;">
<?php
$beritaterkait=mysql_query("SELECT * FROM sh_berita WHERE id_berita!='$r[id_berita]' AND status_terbit='1' ORDER BY RAND() LIMIT 5");
while($bt=mysql_fetch_array($beritaterkait)){
?>
	<li style="padding: 5px 0 5px 0;"><a href="<?php echo "?p=detberita&id=$bt[id_berita]";?>"><?php echo "$bt[judul_berita]";?></a></li>
<?php } ?>
</ul><br><br>
<?php
if ($r[status_komentar] == 1){
?>
<h3>Tinggalkan Komentar</h3>
<br>
<form method="POST" action="kontenweb/insert_komentar.php" id="formkomentar" name="formkomentar">
<?php echo "<input type='hidden' name='id' value='$r[id_berita]'>";?>
<table>
	<tr><td width="75px"><b>Nama *</b></td><td><input type="text" name="nama" class="sedang"></td></tr>
	<tr><td><b>Email *</b></td><td><input type="text" name="email" class="sedang">&nbsp;<small><i>Tidak akan diterbitkan</i></small></td></tr>
	<tr><td><b>Komentar *</b></td><td>
	<textarea name="komentar" style="width: 200px; height: 75px;"></textarea>
	</td></tr>
	<tr><td></td><td><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>
</table>
</form>
<?php include "form_komentar.php";?>

<?php
$hitung_komentar_ini=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]'");
$jml_komentar_ini=mysql_num_rows($hitung_komentar_ini); ?>
<br>
<h3>Ada <?php echo $jml_komentar_ini?> komentar untuk berita ini</h3>
<ul style="list-style: none; padding-left: 5px;">
	<?php $komentar=mysql_query("SELECT * FROM sh_komentar WHERE status_terima='1' AND id_berita='$r[id_berita]' ORDER BY id_komentar DESC");
			while($k=mysql_fetch_array($komentar)){ ?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php echo "<a href=''>$k[nama_komentar]</a>";?></b><br><small><?php echo "$k[tanggal_komentar]";?></small></p>
	<p><?php echo "$k[isi_komentar]"?></p>
	<?php } ?>
	</li>
		
</ul>
<?php } ?>
</div>
</div>
<?php break ?>


<!--Menampilkan pengumuman-->
<?php case "pengumuman": ?>
<div id="konten">
<div id="lebar">
<h3>Pengumuman <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3><br>
<?php
	$batas= 10;
	$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_pengumuman");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC LIMIT $posisi, $batas");
$cek_pengumuman=mysql_num_rows($pengumuman);

if($cek_pengumuman > 0){
while($r=mysql_fetch_array($pengumuman)){
?>
<table style="margin: 20px 0 10px 0; border-bottom: 1px solid #dcdcdc">
	<tr><th colspan="3"><a href=""><?php echo "$r[judul_pengumuman]";?></a></th></tr>
	<tr><td width="120px"><b>Tanggal Posting</b></td><td width="3px">:</td><td><?php echo "$r[tanggal_pengumuman]";?></td></tr>
	<tr><td width="120px"><b>Diterbitkan oleh</b></td><td>:</td width="3px"><td><?php echo "$r[nama_lengkap_users]";?></td></tr>
	<tr><td colspan="3"><?php echo "$r[isi_pengumuman]";?></td></tr>
</table>
<?php } 
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=pengumuman&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=pengumuman&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
		}
		else {?>
		<b>Data Pengumuman Belum Tersedia</b>
		<?php } ?>
</div>
</div>
<?php break;?>


<!--Menampilkan data guru-->
<?php case "guru": ?>
<div id="konten">
<div id="lebar">
<h3>Data Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="?p=gurujk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=gurupencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol"  style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">JK</th><th class="garis">Mengajar</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND posisi='guru' ORDER BY nama_gurustaff ASC");
$hitungguru=mysql_num_rows($gurustaff);

if($hitungguru > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailguru&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_mapel]";?></td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data guru belum ada</b></td></tr>
<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>
<?php break; ?>


<!--Menampilkan data guru jenis kelamin-->
<?php case "gurujk": ?>
<div id="konten">
<div id="lebar">
<h3>Data Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="?p=gurujk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=gurupencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">JK</th><th class="garis">Mengajar</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND jenkel='$_POST[jk]'  AND posisi='guru' ORDER BY nama_gurustaff ASC");
$cek_guru=mysql_num_rows($gurustaff);

if($cek_guru > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailguru&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_mapel]";?></td>
</tr>
<?php $no++; } }
else {
?>
<tr class="garis"><td colspan="4"><b>Data guru dengan jenis kelamin
<?php
if($_POST[jk]=='L'){ echo "Laki-laki"; }
else { echo "Perempuan"; }
?>
 belum ada</b></td></tr>
<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>
<?php break; ?>


<!--Menampilkan data guru pencarian-->
<?php case "gurupencarian":
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>

<div id="konten">
<div id="lebar">
<h3>Hasil Pencarian Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a> dengan kata kunci <a href="">"<?php echo "$cari";?>"</a></h3>

<form method="POST" action="?p=gurujk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=gurupencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">JK</th><th class="garis">Mengajar</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND posisi='guru' AND nama_gurustaff LIKE '%$cari%' ORDER BY nama_gurustaff ASC");
$hitung=mysql_num_rows($gurustaff);

if ($hitung > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailguru&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_mapel]";?></td>
</tr>
<?php $no++; } }
else {
echo "<tr class='garis'><td colspan='4'>Data tidak ditemukan</td></tr>";
}
?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>
<?php break; ?>

<!--Menampilkan detail guru-->
<?php case "detailguru": ?>

<div id="konten">
<div id="lebar">
<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan] > 0){
$detailguru=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND nip='$_GET[nip]'");
$r=mysql_fetch_array($detailguru);
?>
<h3>Detail Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<table style="margin-top: 20px">
<tr><td rowspan="7" width="160px"><?php echo "<img src='images/foto/guru/$r[foto]' width='150px' style='padding: 5px; border: 1px solid #dcdcdc; background: #fff;'>";?></td></tr>
<tr><td width="130px">Nama Guru</td><td>:</td><td><b><?php echo $r[nama_gurustaff]?></b></td></tr>
<tr><td>Jenis Kelamin</td><td>:</td><td><b><?php echo $r[jenkel]?></b></td></tr>
<tr><td>Mengajar</td><td>:</td><td><b><?php echo $r[nama_mapel]?></b></td></tr>
<tr><td>Pendidikan Terakhir</td><td>:</td><td><b><?php echo $r[pendidikan_terakhir]?></b></td></tr>
<tr><td>Tahun Masuk</td><td>:</td><td><b><?php echo $r[tahun_masuk]?></b></td></tr>
<tr><td>Alamat</td><td>:</td><td><b><?php echo $r[alamat]?></b></td></tr>
<tr><td colspan="4"><input type="button" class="tombol" value="Kembali" onclick="self.history.back()"></td></tr>
</table>
<?php } ?>
</div>
</div>

<?php break; ?>

<!--Menampilkan data staff-->
<?php case "staff": ?>
<div id="konten">
<div id="lebar">
<h3>Data Staff <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="?p=staffjk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=staffpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff</th><th class="garis">JK</th><th class="garis">Jabatan</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_jabatan WHERE sh_guru_staff.id_jabatan=sh_jabatan.id_jabatan  AND posisi='staff' ORDER BY nama_gurustaff ASC");
$hitungstaff=mysql_num_rows($gurustaff);

if($hitungstaff > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailstaff&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_jabatan]";?></td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data staff belum ada</b></td></tr>
<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>

<?php break; ?>


<!--Menampilkan data staff jenis kelamin-->
<?php case "staffjk": ?>

<div id="konten">
<div id="lebar">
<h3>Data Staff <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="?p=staffjk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=staffpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff</th><th class="garis">JK</th><th class="garis">Jabatan</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_jabatan WHERE sh_guru_staff.id_jabatan=sh_jabatan.id_jabatan  AND posisi='staff' AND jenkel='$_POST[jk]' ORDER BY nama_gurustaff ASC");
$cek_staff=mysql_num_rows($gurustaff);

if($cek_staff > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailstaff&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_jabatan]";?></td>
</tr>
<?php $no++; } }
else {
?>
<tr class="garis"><td colspan="4"><b>Data staff dengan jenis kelamin
<?php
if($_POST[jk]=='L'){ echo "Laki-laki"; }
else { echo "Perempuan"; }
?>
 belum ada</b></td></tr>
<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>
<?php break; ?>


<!--Menampilkan data staff pencarian-->
<?php case "staffpencarian":
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>
<div id="konten">
<div id="lebar">
<h3>Hasil Pencarian Staff <a href=""><?php echo "$ns[isi_pengaturan]";?></a> dengan kata kunci <a href="">"<?php echo "$cari";?>"</a></h3>

<form method="POST" action="?p=staffjk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=staffpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="garis" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff</th><th class="garis">JK</th><th class="garis">Jabatan</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_jabatan WHERE sh_guru_staff.id_jabatan=sh_jabatan.id_jabatan  AND posisi='staff' AND nama_gurustaff LIKE '%$cari%' ORDER BY nama_gurustaff ASC");
$hitung=mysql_num_rows($gurustaff);

if ($hitung > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailstaff&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php echo "$r[jenkel]";?></td>
	<td class="garis"><?php echo "$r[nama_jabatan]";?></td>
</tr>
<?php $no++; }}
else {
echo "<tr class='garis'><td colspan='4'>Data tidak ditemukan</td></tr>";
}
 ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div>
</div>
<?php break; ?>


<!--Menampilkan detail staff-->
<?php case "detailstaff": ?>

<div id="konten">
<div id="lebar">
<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan] > 0){
$detailstaff=mysql_query("SELECT * FROM sh_guru_staff, sh_jabatan WHERE sh_guru_staff.id_jabatan=sh_jabatan.id_jabatan AND nip='$_GET[nip]'");
$r=mysql_fetch_array($detailstaff);
?>
<h3>Detail Staff <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<table style="margin-top: 20px">
<tr><td rowspan="7" width="160px"><?php echo "<img src='images/foto/guru/$r[foto]' width='150px' style='padding: 5px; border: 1px solid #dcdcdc; background: #fff;'>";?></td></tr>
<tr><td width="130px">Nama Staff</td><td>:</td><td><b><?php echo $r[nama_gurustaff]?></b></td></tr>
<tr><td>Jenis Kelamin</td><td>:</td><td><b><?php echo $r[jenkel]?></b></td></tr>
<tr><td>Jabatan</td><td>:</td><td><b><?php echo $r[nama_jabatan]?></b></td></tr>
<tr><td>Pendidikan Terakhir</td><td>:</td><td><b><?php echo $r[pendidikan_terakhir]?></b></td></tr>
<tr><td>Tahun Masuk</td><td>:</td><td><b><?php echo $r[tahun_masuk]?></b></td></tr>
<tr><td>Alamat</td><td>:</td><td><b><?php echo $r[alamat]?></b></td></tr>
<tr><td colspan="4"><input type="button" class="tombol" value="Kembali" onclick="self.history.back()"></td></tr>
</table>
<?php } ?>
</div>
</div>

<?php break; ?>


<!--Menampilkan form buku tamu-->
<?php case "bukutamu": ?>
<div id="konten">
<div id="lebar">
<h3>Buku Tamu</h3>
<p style="margin-top: 20px">
Silahkan mengisi buku tamu pada form dibawah ini untuk memberikan kritik maupun saran kepada kamu. Setiap buku tamu yang masuk, kami akan sangat menghargainya.
</p>
<form method="POST" action="kontenweb/insert_bukutamu.php" name="formbuku" id="formbuku">
<table style="margin-top: 20px">
	<tr><td><b>Nama *</b><td>:</td><td><input type="text" class="sedang" name="nama">&nbsp;<small><i>Harus diisi</i></small></td></tr>
	<tr><td><b>Email *</b><td>:</td><td><input type="text" class="sedang" name="email">&nbsp;<small><i>Harus diisi (Tidak akan diterbitkan)</i></small></td></tr>
	<tr><td><b>Subjek *</b><td>:</td><td><input type="text" class="panjang" name="subjek"></td></tr>
	<tr><td><b>Pesan *</b><td>:</td><td><textarea name="pesan" style="height: 150px"></textarea></td></tr>
	<tr><td>&nbsp;</td><td></td><td>
	<img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" />
	</td></tr>
	<tr><td>&nbsp;</td><td></td><td><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td>&nbsp;</td><td></td><td><input type="submit" class="tombol" value="Kirim">&nbsp;<input type="reset" class="tombol" value="Reset"></td></tr>

</table>
</form>
<?php include "form_bukutamu.php";?>

<?php
$tampilpesan=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='16'");
$tp=mysql_fetch_array($tampilpesan);
if ($tp[isi_pengaturan]== 1){
?>

<ul style="list-style: none; padding-left: 5px;">
	<?php $bukutamu=mysql_query("SELECT * FROM sh_buku_tamu WHERE status='1' ORDER BY id_bukutamu DESC");
			while($b=mysql_fetch_array($bukutamu)){ ?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php echo "<a href=''>$b[nama_bukutamu]</a>";?></b><br><small><?php echo "$b[tanggal_kirim]";?></small></p>
	<p><?php echo "$b[isi_pesan]"?></p>
	<?php } ?>
	</li>
		
</ul>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan halaman PSB-->
<?php case "psb": ?>
<div id="konten">
<div id="lebar">
<h3>Pendaftaran Siswa Baru Online <a href=""><?php echo "$ns[isi_pengaturan2]";?></a></h3>

<br>
<p>Sekilas Informasi PSB Online 
<table style="width: 35%">
<?php
$pendaftar=mysql_query("SELECT * FROM sh_psb");
$totalpendaftar=mysql_num_rows($pendaftar);

$laki=mysql_query("SELECT * FROM sh_psb WHERE jk='L'");
$pendaftarlaki=mysql_num_rows($laki);

$perempuan=mysql_query("SELECT * FROM sh_psb WHERE jk='P'");
$pendaftarperempuan=mysql_num_rows($perempuan);

$nem=mysql_query("SELECT * FROM sh_psb ORDER BY nem DESC");
$nemtertinggi=mysql_fetch_array($nem);
?>
	<tr><td><b>Total Pendaftar</b></td><td><b><a href=""><?php echo "$totalpendaftar"?></a></b></td></tr>
	<tr><td><b>Pendaftar Laki-laki</b></td><td><b><a href=""><?php echo "$pendaftarlaki"?></a></b></td></tr>
	<tr><td><b>Pendaftar Perempuan</b></td><td><b><a href=""><?php echo "$pendaftarperempuan"?></a></b></td></tr>
</table>

<br>

<h3>Data Pendaftar <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<form method="POST" action="?p=datapsbpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-top: 20px" value="Cari">
</form>
<table class="garis" id="results">
	<tr>
		<th class="garis" width="35px">No</th>
		<th class="garis">Id daftar</th>
		<th class="garis">Tgl Daftar</th>
		<th class="garis">Nama</th>
		<th class="garis">Nisn</th>
		<th class="garis">Jenis Kelamin</th>
		<th class="garis">Status</th>
	</tr>
	<?php
	$no=1;
	$psb=mysql_query("SELECT * FROM sh_psb ORDER BY status_psb DESC");
	$hitungpsb=mysql_num_rows($psb);
	
	if ($hitungpsb > 0){
	while($r=mysql_fetch_array($psb)){
	?>
	<tr class="garis"><td class="garis"><?php echo "$no";?></td>
		<td class="garis"><?php echo "<b>$r[id_daftar]</b>";?></td>
		<td class="garis"><?php echo "$r[tgl_skrg]";?></td>
		<td class="garis"><?php echo "$r[nama]";?></td>
		<td class="garis"><?php echo "$r[nisn]";?></td>
		<td class="garis"><?php echo "$r[jk]";?></td>
		<td class="garis"><?php
		if ($r[status_psb]== 1){
		echo "<center><img src='kontenweb/terima.png'></center>";}
		else {
		echo "<center><img src='kontenweb/tolak.png'></center>";
		}?></td>
	</tr>
	<?php $no++; }}
	else {?>
	<tr class="garis"><td class="garis" colspan="5"><b>Data Pendaftar Belum Ada</b></td></tr>
	<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 50); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<table style="margin-top: 20px; width: auto;">
<tr><td><img src="kontenweb/terima.png"></td><td>:</td><td>Diterima</td></tr>
<tr><td><img src="kontenweb/tolak.png"></td><td>:</td><td>Lengkapi prosedur persyaratan</td></tr>
<tr><td colspan="3"><b>* Untuk mengetahui hasil moderasi, silahkan menunggu maksimal 1 x 24 jam kerja</b></td></tr>
</table>
</div>
</div>
<?php break; ?>


<!--Menampilkan form psb-->
<?php case "formpsb": ?>
<div id="konten">
<div id="lebar">
<h3>Pendaftaran Siswa Baru Online <a href=""><?php echo "$ns[isi_pengaturan2]";?></a></h3>
<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php echo "$r[isi_pengaturan2]";?>
<?php
if ($r[nama_pengaturan]==1){
?>
<h3>Form Pendaftaran Siswa Baru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<form method ="POST" action="kontenweb/insert_psb.php" name="formpsb" id="formpsb">
<table style="margin-top: 20px">
	<h3 align='left'>Identitas Calon siswa</h3>
    	<?php
	$sql=mysql_query("SELECT * FROM siswa");
	$r=mysql_fetch_array($sql);
	?>
	<td width="150px"><b>No. Pendaftaran</b></td><td>:</td><td><input type=text  name=no_test disabled /> <font color='red'> *) Di isi petugas</font></td></tr>
	<tr><td width="150px"><b>Nama Lengkap *</b></td><td>:</td><td><input type="text" class="sedang" name="nama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>NISN</b></td><td>:</td><td><input type="text" class="pendek" name="nisn" onKeyPress="return goodchars(event,'0123456789',this)" required><br></td></tr>
	<tr><td><b>Jenis Kelamin *</b></td><td>:</td><td>
	<input type="radio" name="jk" id="jk" value="L">Laki-laki&nbsp;
	<input type="radio" name="jk" id="jk" value="P">Perempuan
	</td></tr>
	<tr><td><b>Tempat, Tanggal Lahir *</b></td><td>:</td><td><input type="text" class="sedang" name="tempat_lahir" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)">&nbsp;<input type="text" class="sedang" name="tanggal_lahir" id="tanggal" required></td></tr>
	<tr><td><b>Agama</b></td><td>:</td><td><input type="text" class="sedang" name="agama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Anak ke</b></td><td>:</td><td><input type="text" class="sedang" name="anak_ke"></td></tr>
	<tr><td><b>Status dalam keluarga</b></td><td>:</td><td><input type="radio" name="sdk" id="jk" value="Anak kandung" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)">Anak kandung&nbsp;
	<input type="radio" name="sdk" id="jk" value="Anak asuh">Anak Asuh&nbsp;
	<input type="radio" name="sdk" id="jk" value="Anak tiri">Anak tiri</td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamat" required></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlp" pattern="[0-9]{12,12}" autocomplete="off"  maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required></td></tr>

	<tr><td><h3><b>Data Asal Sekolah</b></h3></td></tr>
	<tr><td><b></b></td><td></tr>

	<tr><td><b>Tahun</b></td><td>:</td><td><input type="text" class="sedang" name="thn" onKeyPress="return goodchars(event,'0123456789',this)" required></td></tr>
	<tr><td><b>Nomor ijazah</b></td><td>:</td><td><input type="text" class="sedang" name="noijazah" onKeyPress="return goodchars(event,'0123456789',this)"required></td></tr>
	
	<tr><td><h3><b>SD / MI</b></h3></td></tr>
	<tr><td><b>Nama sekolah</b></td><td>:</td><td><input type="text" class="sedang" name="namasekolah"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b> Alamat sekolah</b></td><td>:</td><td><input type="text" class="sedang" name="alamatsekolah" required></td></tr>
	
	<tr><td><h3><b>Identitas orang tua</b></h3></td></tr>
	<tr><td><b></b></td><td></tr>
	<tr><td><b>Nama Ayah</b></td><td>:</td><td><input type="text" class="sedang" name="ayah" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_ayah"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_ayah"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	
	<tr><td><b>Nama Ibu</b></td><td>:</td><td><input type="text" class="sedang" name="ibu" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_ibu"onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" required></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_ibu" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamatortu" required></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlp" pattern="[0-9]{12,12}"  autocomplete="off"  maxlength="12"  onKeyPress="return goodchars(event,'0123456789',this)"></td></tr>
	
	<tr><td><b>Nama Wali Murid</b></td><td>:</td><td><input type="text" class="sedang" name="wali" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Pekerjaan</b></td><td>:</td><td><input type="text" class="sedang" name="job_wali" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Pendidikan</b></td><td>:</td><td><input type="text" class="sedang" name="sekolah_wali" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></td></tr>
	<tr><td><b>Alamat Lengkap </b></td><td>:</td><td><textarea style="height: 125px" name="alamatwali"></textarea></td></tr>
	<tr><td><b>Tlp</b></td><td>:</td><td><input type="text" class="pendek" name="tlp" pattern="[0-9]{12,12}"  autocomplete="off"  maxlength="12"  onKeyPress="return goodchars(event,'0123456789',this)" required></td></tr>
	<tr><td><b>Upload pas foto</b></td><td>:</td><td><input type="file" class="sedang" name="upload"></td></tr>
	<tr><td colspan="3"><br><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" /></td></tr>
	<tr><td colspan="3"><input type="text" name="kode" class="pendek">&nbsp;<small><i>Masukkan kode diatas</i></td></tr>
	<tr><td colspan="3"><br>
	<input type="submit" class="tombol" value="Daftar">
	<input type="reset" class="tombol" value="Reset">
	
	</td></tr>
</table>
</form>
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
      $(document).ready(function(){
        $("#tanggal1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
<?php include "form.php";?>
<?php } ?>
</div>
</div>
<?php break; ?>


<!--Menampilkan halaman selesai PSB-->
<?php case "selesaipsb": ?>
<div id="konten">
<div id="lebar">
<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r[nama_pengaturan] > 0){
?>
<h3>Terimakasih telah mendaftar di <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<?php echo "$r[isi_pengaturan2]";
echo "Klik <a href='?p=psb'><strong>disini</strong></a> untuk melihat data pendaftar atau klik <a href='print-form.php' target='blank'><strong>cetak</strong></a> untuk mencetak detail pembayaran";
}?>
</div>
</div>
<?php break; ?>

<!--Menampilkan data pendaftar-->
<?php case "datapsb": ?>
<div id="konten">
<div id="lebar">
<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r[nama_pengaturan]==1){
?>
<h3>Data Pendaftar <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<form method="POST" action="?p=datapsbpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-top: 20px" value="Cari">
</form>
<table class="garis" id="results">
	<tr>
		<th class="garis" width="35px">No</th>
		<th class="garis">Id daftar</th>
		<th class="garis">Tgl Daftar</th>
		<th class="garis">Nama</th>
		<th class="garis">Nisn</th>
		<th class="garis">Jenis Kelamin</th>
		<th class="garis">Status</th>
	</tr>
	<?php
	$no=1;
	$psb=mysql_query("SELECT * FROM sh_psb ORDER BY status_psb DESC");
	$hitungpsb=mysql_num_rows($psb);
	
	if ($hitungpsb > 0){
	while($r=mysql_fetch_array($psb)){
	?>
	<tr class="garis"><td class="garis"><?php echo "$no";?></td>
		<td class="garis"><?php echo "<b>$r[id_daftar]</b>";?></td>
		<td class="garis"><?php echo "$r[tgl_skrg]";?></td>
		<td class="garis"><?php echo "$r[nama]";?></td>
		<td class="garis"><?php echo "$r[nisn]";?></td>
		<td class="garis"><?php echo "$r[jk]";?></td>
		<td class="garis"><?php
		if ($r[status_psb]== 1){
		echo "<center><img src='kontenweb/terima.png'></center>";}
		else {
		echo "<center><img src='kontenweb/tolak.png'></center>";
		}?></td>
	</tr>
	<?php $no++; }}
	else {?>
	<tr class="garis"><td class="garis" colspan="5"><b>Data Pendaftar Belum Ada</b></td></tr>
	<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 50); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<table style="margin-top: 20px; width: auto;">
<tr><td><img src="kontenweb/terima.png"></td><td>:</td><td>Diterima</td></tr>
<tr><td><img src="kontenweb/tolak.png"></td><td>:</td><td>Belum melengkapi pendaftaran</td></tr>
<tr><td colspan="3"><b>* Untuk mengetahui hasil moderasi, silahkan menunggu maksimal 1 x 24 jam kerja</b></td></tr>
</table>
<?php } ?>
</div>
</div>
<?php break; ?>

<!--Menampilkan data pendaftar pencarian-->
<?php case "datapsbpencarian": ?>
<div id="konten">
<div id="lebar">
<?php
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
if ($r[nama_pengaturan]==1){
?>
<h3>Hasil Pencarian Pendaftar <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>

<form method="POST" action="?p=datapsbpencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-top: 20px" value="Cari">
</form>
<table class="garis" id="results">
	<tr>
		<th class="garis" width="35px">No</th>
		<th class="garis">Id daftar</th>
		<th class="garis">Tgl skrg</th>
		<th class="garis">Nama</th>
		<th class="garis">Nisn</th>
		<th class="garis">Jenis Kelamin</th>
		<th class="garis">Status</th>
	</tr>
	<?php
	$no=1;
	$psb=mysql_query("SELECT * FROM sh_psb WHERE nama LIKE '%$cari%' ORDER BY status_psb DESC");
	$hitungpsb=mysql_num_rows($psb);
	
	if ($hitungpsb > 0){
	while($r=mysql_fetch_array($psb)){
	?>
	<tr class="garis"><td class="garis"><?php echo "$no";?></td>
		<td class="garis"><?php echo "<b>$r[id_daftar]</b>";?></td>
		<td class="garis"><?php echo "$r[tgl_skrg]";?></td>
		<td class="garis"><?php echo "$r[nama]";?></td>
		<td class="garis"><?php echo "$r[nisn]";?></td>
		<td class="garis"><?php echo "$r[jk]";?></td>
		<td class="garis"><?php
		if ($r[status_psb]== 1){
		echo "<center><img src='kontenweb/terima.png'></center>";}
		else {
		echo "<center><img src='kontenweb/tolak.png'></center>";
		}?></td>
	</tr>
	<?php $no++; }}
	else {?>
	<tr class="garis"><td class="garis" colspan="5"><b>Data tidak ditemukan</b></td></tr>
	<?php } ?>
	
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 50); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
<table style="margin-top: 20px; width: auto;">
<tr><td><img src="kontenweb/terima.png"></td><td>:</td><td>Daftar Ulang</td></tr>
<tr><td><img src="kontenweb/tolak.png"></td><td>:</td><td>Tidak memenuhi syarat/ belum dimoderasi</td></tr>
<tr><td colspan="3"><b>* Untuk mengetahui hasil moderasi, silahkan menunggu maksimal 1 x 24 jam kerja</b></td></tr>
</table>
<?php } ?>
</div>
</div>
<?php break; ?>





<!--Menampilkan galeri-->
<?php case "galeri": ?>
<div id="konten">
<div id="lebar">
<h3>Album Galeri <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<?php
$album=mysql_query("SELECT * FROM sh_album ORDER BY id_album DESC");
$cek_album=mysql_num_rows($album);
if($cek_album > 0){
while($r=mysql_fetch_array($album)){

$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$r[id_album]'");
$hitung=mysql_num_rows($jmlfoto);

if($hitung > 0 ){
?>
<div class="albumgaleri">
<p class="thumb"><a href="<?php echo "?p=foto&id=$r[id_album]";?>"><img src="images/foto/galeri/album/<?php echo "$r[foto_album]";?>" width="200px"></a></p><br>
<p><?php echo "<b>$r[nama_album]</b>";?><br>
<?php echo "<small>$r[tanggal_album]</small>";?><br>
<?php
echo "Jumlah Foto ($hitung)";
?></p>
</div>
<?php } } }

else { ?>
<b>Data album galeri belum tersedia</b>
<?php } ?>
</div>
</div>
<?php break; ?>

<!--Menampilkan data foto-->
<?php case "foto": ?>
<div id="konten">
<div id="lebar">
<?php
$nama_album=mysql_query("SELECT * FROM sh_album WHERE id_album='$_GET[id]'");
$tampilnama=mysql_fetch_array($nama_album);

$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
$hitung=mysql_num_rows($jmlfoto);
if ($hitung != 0){
?>
<h3>Foto Album <a href="">"&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</a></h3>
<small><?php echo "$tampilnama[tanggal_album]";?></small>
<p><?php echo "$tampilnama[deskripsi_album]";?></p>
<div class="galeriDepan">
<?php
$galeri=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
while ($r=mysql_fetch_array($galeri)){
?>
<p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php echo "$r[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img src="images/foto/galeri/<?php echo "$r[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar" width="350px"/></a>
</p><?php } ?>
</div>
<?php }

else { ?>
<h3>Tidak ada foto dalam album "&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</h3>
<?php } ?>

</div>
</div>
<?php break; ?>

<?php } ?>