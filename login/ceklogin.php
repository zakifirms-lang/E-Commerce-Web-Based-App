<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = mysql_query("SELECT * FROM user WHERE username = '$username'
	and password = '$password'") or die (mysql_error());
	
	if (mysql_num_rows($sql) == 0 ) {
		echo '<script language= "javascript">
		alert ("Wrong username or password! Please try again.");
		document.location="user.html";</script>';
	}else{
		echo '<script language= "javascript">
		alert ("Login successful."); 
		document.location="../user/data_barang_user.php";</script>';
	}
?>