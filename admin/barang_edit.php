<?php
	include "koneksi.php";
	$sqln = mysqli_query ($kon, "select * from barang where kdbrg='$_GET[idk]'");
	$rn = mysqli_fetch_array($sqln);
?>

<head>
    <title>Edit</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
		body {
			font-family: 'Poppins', sans-serif;
		}

		#container {
			margin: 60px auto;
			width: 50%;
			padding: 30px 30px 5px;
			border: 2px solid black;
			border-radius: 8px;
		}

		img {
			padding: 0 0 20px;
			margin-left: 6px;
			height: 50px;
            width: auto;
		}

		form {
			text-align: left;
		}

		table {
			width: 100%;
			text-align: left;
		}

		th, td {
			padding: 8px;
		}

		input {
			width: 100%;
		}

		button {
			background-color: #CE1126;
			color: white;
			border-radius: 8px;
			margin-top: 5px;
			padding: 10px;
			border: none;
			width: 30%;
			cursor: pointer;
			transition: transform 80ms ease-in;
		}

		button:active {
		transform: scale(0.95);
		}
	</style>
</head>

<body>
    <div id="container">
        <a href="data_barang.php"><img src="/uts/view/jordan.png" alt="Logo"><a>

        <form name="form1" method="post" action="barang_edit_aksi.php" enctype="multipart/form-data">
            <table border="0" cellpadding="0">
                <tr>
                    <th>CODE</th>
                    <td><input type="text" name="kdbrg" id="kdbrg" autocomplete="off" value="<?php echo $rn['kdbrg']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>NAME</th>
                    <td><input type="text" name="nmbrg" id="nmbrg" autocomplete="off" value="<?php echo $rn['nmbrg']; ?>"></td>
                </tr>
                <tr>
                    <th>PRICE</th>
                    <td><input type="text" name="hrgbrg" id="hrgbrg" autocomplete="off" value="<?php echo $rn['hrgbrg']; ?>"></td>
                </tr>
                <tr>
                    <th>STOCK</th>
                    <td><input type="text" name="stokbrg" id="stokbrg" autocomplete="off" value="<?php echo $rn['stokbrg']; ?>"></td>
                </tr>
                <tr>
                    <th>PICT</th>
                    <td><input type="file" name="img" id="img"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="button" id="button">Edit Data</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
