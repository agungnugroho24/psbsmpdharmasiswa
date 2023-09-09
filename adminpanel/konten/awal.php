<!DOCTYPE HTML>
<?php include "../konfigurasi/koneksi.php"; ?>
<html>
<head>
<title>SMP DHARMA SISWA</title>
<link rel="stylesheet" type="text/css" href="css/utama.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="js/highslide.js"></script>
<script type="text/javascript" src="js/paging.js"></script>

<script type="text/javascript">
	hs.graphicsDir = 'js/graphics/';
	hs.wrapperClassName = 'wide-border';
</script>
    <link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="js/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/ui/ui.datepicker.js"></script>


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
</head>