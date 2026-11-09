<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
<div id="menuBtn">&#9776;</div>
</header>
<div id="sidebar">
    <div id="list">
    <ul>
        <li><a href="../index.php"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="data_riwayat.php">History</a></li>
        <li>
            <input type="checkbox" id="dataToggle">
            <label for="dataToggle">Data</label>
            <ul>
                <li><a href="data_barang.php">Item</a></li>
                <li><a href="#">User</a></li>
            </ul>
        </li>
    </ul>
    </div>
</div>


<div id="content">
<center><h2 style="color: black; width: 100%; padding-top: 20px; text-align: center;">Dashboard</h2></center>
    <div>
        <?php
        include "koneksi.php";
        echo "<table id='data'>";
        echo "<tr>";
        echo "<thead>";
        echo "<th>No</th>";
        echo "<th>USERNAME</th>";
        echo "<th>PASSWORD</th>";
        echo "<th>EMAIL</th>";
        echo "<th>PHONE</th>";
        echo "<th>ADDRESS</th>";
        echo "<th>ACTION</th>";
        echo "</tr>
            </thead>";

            $sqln = mysqli_query($kon, "select * from user");
            $row = mysqli_num_rows($sqln);
            $no = 1;
            if ($row == 0) {
                echo "<tr><td>No Data</td></tr>";
            }else {
                while ($rn = mysqli_fetch_array($sqln)){
                echo "<tbody>
                <td>$no</td>
                <td>$rn[username]</td>
                <td>$rn[password]</td>
                <td>$rn[email]</td>
                <td>$rn[phone]</td>
                <td>$rn[address]</td>";

                echo "<td style='text-align:center;'>
                            <a href='user_edit.php?ids=$rn[id]'><button style='color: white; background-color: goldenrod;'>Edit</button></a>
                            <a href='user_del.php?ids=$rn[id]'><button style='color: white; background-color: darkred;'>Delete</button></a>
                      </td>";
                echo "</tr></tbody>";
                $no++;
            }
        }
        echo "</table>";
        ?>
    </div>
</div>

<script>
    document.getElementById('menuBtn').addEventListener('click', function () {
        toggleSidebar();
    });

    function toggleSidebar() {
        let sidebar = document.getElementById('sidebar');
        let content = document.getElementById('content');
        if (sidebar.style.width === '200px') {
            sidebar.style.width = '0';
            content.style.marginLeft = '0';
        } else {
            sidebar.style.width = '200px';
            content.style.marginLeft = '200px';
        }
    }
</script>
</body>
</html>