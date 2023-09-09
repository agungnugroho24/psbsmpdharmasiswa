<?php
session_start();
include 'konfigurasi/koneksi.php';
    $query = mysql_query("select * from sh_psb order by no DESC");
	$no = 1;
    $data = mysql_fetch_array($query)
?>
<html>
<head>
    <title>Print Formulir</title>
    <link rel='stylesheet' href='gaya.css'>

<html>
<head>
    <title>Print Formulir</title>
    <link rel='stylesheet' href='gaya.css'>
    <?php 
    echo "<script type='text/javascript'>javascript:window.print()</script>";
    ?>
</head>
<body>
<!-- tabel body -->
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    <!-- kop -->
    <tr><td colspan='3'><?php include 'kop.php' ?></td></tr>
    <!-- kop -->
    <tr>
        <td colspan='3' align='center'>PERINCIAN PEMBAYARAN</td>
    </tr>
    <tr>
        <td width='20'><!-- margin kanan --><br></td>
        <td>
        <!-- Bagian Tengah / Isi -->
            <!-- tabel kontent -->
            <table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
			 <tr>
                    <td>Id daftar</td><td width='5'>:</td><td><?php echo $data['id_daftar']; ?></td>
                </tr>
				<tr>
                    <td>Tanggal daftar</td><td width='5'>:</td><td><?php echo $data['tgl_skrg']; ?></td>
                </tr>
				<tr>
                    <td>Nama</td><td width='5'>:</td><td><?php echo $data['nama']; ?></td>
                </tr>
			    <tr>
                    <td>NISN</td><td width='5'>:</td><td><?php echo $data['nisn']; ?></td>
                </tr>
				<tr>
                    <td>Nama sekolah</td><td width='5'>:</td><td><?php echo $data['namasekolah']; ?></td>
                </tr>
                <tr>
				
				</table><br>
				<table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
                    <td colspan='3'><b>Syarat Pendaftaran</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <tr>
                    <td>Foto copy Ijazah SD/MI	</td><td width='5'>:</td><td>2 Lembar</td>
                </tr>
                <tr>
                    <td>Foto copy SKHUASBN	</td><td width='5'>:</td><td>2 Lembar</td>
                </tr>
                <tr>
                    <td>Foto copy Akte Kelahiran	</td><td width='5'>:</td><td>2 Lembar</td>
                </tr>
                <tr>
                    <td>Foto copy Raport kelas VI	</td><td width='5'>:</td><td>1 Lembar</td>
                </tr>
                <tr>
                    <td>Pas Photo uk. 3 x 4	</td><td width='5'>:</td><td>2 Lembar</td>
                </tr>
                </table>
			<br><br>	
			 <table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
				<tr>
                    <td colspan='3'><b>Biaya Pendaftaran</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <tr>
                    <td>Pendaftaran</td><td width='5'>:</td><td>Rp.      60.000</td>
                </tr>
                <tr>
                    <td>SPP Juli 2015 ( Setelah dikurangi BOS )</td><td width='5'>:</td><td>Rp.      55.000</td>
                </tr>
                <tr>
                    <td>Komputer 1 Tahun</td><td width='5'>:</td><td>Rp.    125.000</td>
                </tr>
                <tr>
                    <td>Osis 1 Tahun</td><td width='5'>:</td><td>Rp.      80.000</td>
                </tr>
                <tr>
                    <td>MBS</td><td width='5'>:</td><td>Rp.      40.000</td>
                </tr>
				<tr>
                    <td>Total</td><td width='5'>:</td><td>Rp.    360.000</td>
                </tr>
                <!-- Isi Konten -->
            </table>
        </td>
        <td width='20'><!-- margin kiri --></td>
    </tr>
</table>   

</body>
    
</html>