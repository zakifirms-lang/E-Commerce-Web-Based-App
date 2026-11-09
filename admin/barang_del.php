<?php
	include "koneksi.php";
	
	$sqln = mysqli_query($kon, "DELETE FROM barang WHERE kdbrg='$_GET[idk]'");

	if ($sqln) {
		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=data_barang.php'>";
	} else {
		echo "Gagal Menghapus Data";
	}
?>
