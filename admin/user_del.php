<?php
	include "koneksi.php";
	
	$sqln = mysqli_query($kon,"delete from user where id='$_GET[ids]'");

	if ($sqln) {
		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=data_user.php'>";
	} else {
		echo "Gagal Menghapus Data";
	}
?>