<?php
// koneksi ke database
include 'koneksi.php';
?>

<html>
<head>
   <title>Transaksi Pembayaran</title>
</head>
<body>
   <h1>Transaksi Pembayaran</h1>
   <p><a href="bayar.html">Form Bayar</a></p>
   <hr>
<?php
// baca ID member dari form bayar.html
$id = $_POST['id'];
// lakukan query pencarian data member berdasarkan ID
$query = "SELECT * FROM member WHERE idMember = '$id'";
$hasil = mysql_query($query);
if (mysql_num_rows($hasil)>0)
{
// jika ditemukan datanya maka tampilkan
$data  = mysql_fetch_array($hasil);
?>
   <form method="post" action="proses2.php">
   <table>
   <tr><td>ID</td><td>:</td><td><?php echo $id; ?></td></tr>
   <tr><td>Nama</td><td>:</td><td><?php echo $data['nama']; ?></td></tr>
   <tr><td>Alamat</td><td>:</td><td><?php echo $data['alamat']; ?></td></tr>
   <tr><td>Jumlah Bayar</td><td>:</td><td>Rp. <input type="text" name="jumlah"></td></tr>
   </table>
   <input type="hidden" name="id" value="<?php echo $id?>">
   <input type="submit" name="submit" value="Submit">
   </form>
<?php
}
// jika tidak maka tampilkan peringatan
else echo "Nomor ID tidak ditemukan";
?>
</body>
</html>