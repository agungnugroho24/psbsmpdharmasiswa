<?php
// koneksi ke database
include 'koneksi.php';

// baca current date
$today = date("Ymd");
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

// baca id member dari form proses.php
$id = $_POST['id'];

// baca jumlah pembayaran dari form proses.php
$jumlah = $_POST['jumlah'];

// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = "SELECT max(idTransaksi) AS last FROM transaksi WHERE idTransaksi LIKE '$today%'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$lastNoTransaksi = $data['last'];

// baca nomor urut transaksi dari id transaksi terakhir
$lastNoUrut = substr($lastNoTransaksi, 8, 4); 

// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;

// membuat format nomor transaksi berikutnya
$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

// proses simpan data transaksi dengan nomor transaksi yang baru
$query = "INSERT INTO transaksi (idTransaksi, idMember, jumlah)
          VALUES ('$nextNoTransaksi', '$id', '$jumlah')";
$hasil = mysql_query($query);
if ($hasil)
{
    // jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
    $query2 = "SELECT * FROM member WHERE idMember = '$id'";
    $hasil2 = mysql_query($query2);
    $data2  = mysql_fetch_array($hasil2);
?>

   <p>Transaksi Pembayaran Sukses</p>
   <table>
   <tr><td>ID Transaksi</td><td>:</td><td><?php echo $nextNoTransaksi; ?></td></tr>
   <tr><td>ID Member</td><td>:</td><td><?php echo $id; ?></td></tr>
   <tr><td>Nama</td><td>:</td><td><?php echo $data2['nama']; ?></td></tr>
   <tr><td>Alamat</td><td>:</td><td><?php echo $data2['alamat']; ?></td></tr>
   <tr><td>Jumlah Bayar</td><td>:</td><td>Rp. <?php echo $jumlah; ?></td></tr>
   </table>

<?php
}
else echo "Transaksi Gagal";
?>   

</body>
</html>