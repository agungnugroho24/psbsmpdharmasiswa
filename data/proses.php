<?php
// koneksi ke database
include 'koneksi.php';
// show all errors and warning
  ini_set('display_errors', 0);
  error_reporting(E_ALL);
?>

<html>
<head>
   <title> </title>
</head>
<body>
   <h1> </h1>
   <p><a href="../index.php">Back</a></p><a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Cetak</a>
   <hr>
<?php
// baca ID member dari form bayar.html
$id = $_POST['id'];
// lakukan query pencarian data member berdasarkan ID
$query = "SELECT * FROM sh_psb WHERE id_daftar = '$id'";
$hasil = mysql_query($query);
if (mysql_num_rows($hasil)>0)
{
// jika ditemukan datanya maka tampilkan
$data  = mysql_fetch_array($hasil);
?>
   <form method="post" action="proses2.php">
   <table>
   <tr><td>ID Daftar</td><td>:</td><td><?php echo $id; ?></td></tr>
   <tr><td>Tgl daftar</td><td>:</td><td><?php echo $data['tgl_skrg']; ?></td></tr>
   <tr><td>Waktu daftar</td><td>:</td><td><?php echo $data['jam_skrg']; ?></td></tr>
   <tr><td>Nama</td><td>:</td><td><?php echo $data['nama']; ?></td></tr>
   <tr><td>NISN</td><td>:</td><td><?php echo $data['nisn']; ?></td></tr>
   <tr><td>Jenis kelamin</td><td>:</td><td><?php echo $data['jk']; ?></td></tr>
   <tr><td>Tempat lahir</td><td>:</td><td><?php echo $data['tempat_lahir']; ?></td></tr>
   <tr><td>Tanggal lahir</td><td>:</td><td><?php echo $data['tanggal_lahir']; ?></td></tr>
   <tr><td>Agama</td><td>:</td><td><?php echo $data['agama']; ?></td></tr>
   <tr><td>Status dalam keluarga</td><td>:</td><td><?php echo $data['sdk']; ?></td></tr>
   <tr><td>Alamat</td><td>:</td><td><?php echo $data['alamat']; ?></td></tr>
   <tr><td>Telepon</td><td>:</td><td><?php echo $data['Tlp']; ?></td></tr>
   <tr><td>Tahun lulus</td><td>:</td><td><?php echo $data['thn']; ?></td></tr>
   <tr><td>No. ijazah</td><td>:</td><td><?php echo $data['noijazah']; ?></td></tr>
   <tr><td>Asal sekolah</td><td>:</td><td><?php echo $data['namasekolah']; ?></td></tr>
   <tr><td>Alamat sekolah</td><td>:</td><td><?php echo $data['alamatsekolah']; ?></td></tr>
   <tr><td>Nama Ayah</td><td>:</td><td><?php echo $data['ayah']; ?></td></tr>
   <tr><td>Pekerjaan ayah</td><td>:</td><td><?php echo $data['job_ayah']; ?></td></tr>
   <tr><td>Pendidikan ayah</td><td>:</td><td><?php echo $data['sekolah_ayah']; ?></td></tr>
   <tr><td>Nama ibu</td><td>:</td><td><?php echo $data['ibu']; ?></td></tr>
   <tr><td>Pekerjaan ibu</td><td>:</td><td><?php echo $data['job_ibu']; ?></td></tr>
   <tr><td>Pendidikan ibu</td><td>:</td><td><?php echo $data['sekolah_ibu']; ?></td></tr>
   <tr><td>Alamat orang tua</td><td>:</td><td><?php echo $data['alamatortu']; ?></td></tr>
   <tr><td>Telepon orang tua</td><td>:</td><td><?php echo $data['tlportu']; ?></td></tr>
   <tr><td>Nama wali</td><td>:</td><td><?php echo $data['wali']; ?></td></tr>
   <tr><td>Pekerjaan wali</td><td>:</td><td><?php echo $data['job_wali']; ?></td></tr>
   <tr><td>Pendidikan wali</td><td>:</td><td><?php echo $data['sekolah_wali']; ?></td></tr>
   <tr><td>Alamat wali</td><td>:</td><td><?php echo $data['alamatwali']; ?></td></tr>
   <tr><td>Telepon wali</td><td>:</td><td><?php echo $data['tlpwali']; ?></td></tr>
   <tr><td>Polling</td><td>:</td><td><?php echo $data['polling']; ?></td></tr>
   </form>
<?php
}
// jika tidak maka tampilkan peringatan
else echo "Nomor ID tidak ditemukan";
?>
</body>
</html>