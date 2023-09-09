<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial_hijau/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial_hijau/header.php";?>
		
		<div id="menu">
			<?php include "file/tema/edisi_spesial_hijau/menu.php";?>
		</div>
		
		<?php include "file/tema/edisi_spesial_hijau/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial_hijau/sidebar.php";?>
		</div>
	<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial_hijau/footer.php"; ?>
	
	<div class="clear"></div>
	</div>
</body>
</html>