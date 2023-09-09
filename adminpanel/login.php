<?php
session_start();
error_reporting(0);
if (isset($_SESSION['adminsh']))
{
	header('location:index.php');
	exit;
}
else{ 
    if (file_exists("../instalasi/index.php")) {
	session_start();
	$_SESSION['pertama'] == 'pertama';
	header ('location:../instalasi/index.php');
	}
	else {
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login Admin</title>
<link rel="stylesheet" type="text/css" href="css/utama.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
</head>

<body style="text-align: center; background: url(css/img/bg_biru.jpg)" id="login" OnLoad="document.login.username.focus();">
<img src="images/logo_login.png" style="margin-top: 10%;">
<div id="kotakLogin">
	<form method="POST" action="valid.php" name="login" id="login">
	<table>
		<tr><td><small style="font-size: 11px;">Username</small><br><input type="text" name="username" class="login" title="Masukkan Username"></td>
			<td><small style="font-size: 11px;">Password</small><br><input type="password" name="password" class="login" title="Masukkan Password"></td>
			<td><small style="font-size: 11px;">&nbsp;</small><br><input type="submit" value="Login" class="gembok"></td></tr>
	</table>
	</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("login");
			frmvalidator.addValidation("username","req","Anda belum memasukkan username");
			frmvalidator.addValidation("password","req","Anda belum memasukkan password");
			//]]>
		</script>
</div>
<br>
<?php
date_default_timezone_set('Asia/Jakarta');
$tahun=date("Y");
?>
<font style="font-size:11px; color: #2e2e2e">&copy; <?php echo "$tahun";?>, <a href="../index.php">Back</a> </font>
</body>
</html>
<?php } } ?>