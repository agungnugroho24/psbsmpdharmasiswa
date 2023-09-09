<?php
session_start();
include "konfigurasi/koneksi.php";
include "file/tema/edisi_spesial/atas.php";
?>
<body>
	<div id="wrapper">
		<?php include "file/tema/edisi_spesial/header.php";?>
		
		<div id="menu">
			<?php include "file/tema/edisi_spesial/menu.php";?>
		</div>
		
		<?php include "file/tema/edisi_spesial/konten.php";?>
		
		<div id="sidebar">
			<?php include "file/tema/edisi_spesial/sidebar.php";?>
		</div>
	<div class="clear"></div>
	
		<?php include "file/tema/edisi_spesial/footer.php"; ?>
	
	<div class="clear"></div>
	</div>
</body>
</html>