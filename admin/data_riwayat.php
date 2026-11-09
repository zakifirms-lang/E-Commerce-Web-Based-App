<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
    #data td{
    border-left: 1.5px solid #ddd;
    border-right: 1.5px solid #ddd;
}
</style>
<body>
    <header>
        <div id="menuBtn">&#9776;</div>
    </header>

    <div id="sidebar">
        <div id="list">
            <ul>
                <li><a href="../index.php"><i class="fa-solid fa-house"></i></a></li>
                <li><a href="#">History</a></li>
                <li>
                    <input type="checkbox" id="dataToggle">
                    <label for="dataToggle">Data</label>
                    <ul>
                        <li><a href="data_barang.php">Item</a></li>
                        <li><a href="data_user.php">User</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div id="content" style="height: 580px; overflow-y: auto;">
    <center><h2 style="color: black; width: 100%;">History</h2></center>
        <div>
            <?php
                include "koneksi.php";
                echo "<table id='data'>";
                echo "<tr>";
                echo "<thead>";
                echo "<th>No</th>";
                echo "<th>Name</th>";
                echo "<th>Number</th>";
                echo "<th>Email</th>";
                echo "<th>Payment</th>";
                echo "<th>Address</th>";
                echo "<th>Products</th>";
                echo "<th>Price</th>";
                echo "</tr></thead>";

                $sqln = mysqli_query($kon, "SELECT * FROM `order` ORDER BY `id`");
                $row = mysqli_num_rows($sqln);
                $no = 1;

                if ($row == 0) {
                    echo "<tr><td>No History Data</td></tr>";
                } else {
                    while ($rn = mysqli_fetch_array($sqln)) {
                        echo "<tbody>
                                <td>$no</td>
                                <td>$rn[name]</td>
                                <td>$rn[number]</td>
                                <td>$rn[email]</td>
                                <td>$rn[method]</td>
                                <td style='width: 30%;'>$rn[street], $rn[city], $rn[state] - $rn[pin_code]</td>
                                <td style='width: 20%;'>$rn[total_products]</td>
                                <td>$$rn[total_price]</td>";
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
