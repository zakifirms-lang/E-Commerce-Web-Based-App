<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query="INSERT into admin VALUES ( '$username', '$password' )";
	$sql= mysql_query($query) or die (mysql(error));

	if (mysql_num_rows($sql) == 0){
		echo '<script language = "javascript">
		alert ("Registration successful! Please login.");
		document.location="admin.html";</script>';
	}
	else{
		echo '<script language = "javascript">
		alert ("Data gagal disimpan.");
		document.location="admin.html";</script>';
	}