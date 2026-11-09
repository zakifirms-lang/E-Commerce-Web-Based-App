<?php
	session_start();
	include "koneksi.php";
	$sqln = mysqli_query($kon,"update user set id='$_POST[id]', username='$_POST[username]', password='$_POST[password]',
							email='$_POST[email]', phone='$_POST[phone]', address='$_POST[address]' 
							where id='$_POST[id]'");
	if ($sqln) {
		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=data_user.php'>";
	} else {
		echo "Gagal Menghapus Data";
	}
?>