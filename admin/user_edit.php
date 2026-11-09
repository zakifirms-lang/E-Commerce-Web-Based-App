<?php
	include "koneksi.php";
	$sqln = mysqli_query($kon, "select * from user where id='$_GET[ids]'");
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
	<a href="data_user.php"><img src="/uts/view/jordan.png" alt="Logo"><a>
		<form name="form1" method="post" action="user_edit_aksi.php" enctype="multipart/form-data">
			<table border="0" cellpadding="0">
				<tr>
					<th>ID</th>
					<td><input type="text" name="id" id="id" value="<?php echo $rn['id']; ?>"></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><input type="text" name="username" id="username" value="<?php echo $rn['username']; ?>"></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input type="text" name="password" id="password" value="<?php echo $rn['password']; ?>"></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><input type="text" name="email" id="email" value="<?php echo $rn['email']; ?>"></td>
				</tr>
				<tr>
					<th>Phone</th>
					<td><input type="text" name="phone" id="phone" value="<?php echo $rn['phone']; ?>"></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><input type="text" name="address" id="address" value="<?php echo $rn['address']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" name="button" id="button">Edit Data</button></td>
				</tr>
			</table>
		</form>
	</div>
</body>