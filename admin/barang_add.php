<head>
    <title>Tambah Barang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            width: 100%;
        }

        #container {
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            border: 1.5px solid black;
            border-radius: 10px;
            padding: 20px;
        }

        img {
            margin-bottom: 14px;
            height: 50px;
            width: auto;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            color: white;
            background-color: #CE1126;
            border-radius: 8px;
            width: 30%;
            padding: 10px;
            margin-top: 6px;
            border: none;
            transition: transform 80ms ease-in;
        }

        button:active {
	        transform: scale(0.95);
        }
    </style>
</head>

<body>
    <div id="container">
        <center><a href="data_barang.php"><img src="/uts/view/jordan.png" alt="Logo"><a>
        <form action="add_barang.php" method="post" enctype="multipart/form-data">
            <label for="kdbrg">Code</label>
            <input type="text" name="kdbrg" autocomplete="off" required>

            <label for="nmbrg">Name</label>
            <input type="text" name="nmbrg" autocomplete="off" required>

            <label for="hrgbrg">Price</label>
            <input type="text" name="hrgbrg" autocomplete="off" required>

            <label for="stokbrg">Stock</label>
            <input type="text" name="stokbrg" autocomplete="off" required>

            <label for="img">Item Image</label>
            <input type="file" name="img" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>