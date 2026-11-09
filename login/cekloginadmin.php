<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = mysql_query("SELECT * FROM admin WHERE username = '$username'
	and password = '$password'") or die (mysql_error());
	
	if (mysql_num_rows($sql) == 0 ) {
		echo '<script language= "javascript">
		alert ("Wrong username or password! Please try again.");
        document.location="admin.html";</script>';
	}else{
		echo '<script language= "javascript">
		alert ("Login successful."); 
		document.location="../admin/data_barang.php";</script>';
	}
?>