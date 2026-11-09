<?php
	include "koneksi.php";
	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$query="INSERT into user VALUES ( '$id', '$username', '$password', '$email', '$phone', '$address' )";
	$sql= mysql_query($query) or die (mysql(error));

	if (mysql_num_rows($sql) == 0){
		echo '<script language = "javascript">
		alert ("Registration successful! Please login.");
		document.location="user.html";</script>';
	}
	else{
		echo '<script language = "javascript">
		alert ("Data gagal disimpan.");
		document.location="user.html";</script>';
	}