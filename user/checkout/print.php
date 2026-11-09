<?php
    include "konek.php";

    $sqln = mysqli_query($kon, "SELECT * FROM `order` ORDER BY `id` DESC LIMIT 1");
    $row = mysqli_num_rows($sqln);
    $no = 1;
                    
    while ($rn = mysqli_fetch_array($sqln))
    { 
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
    <title>INVOICE</title>
</head>
<style>
@page {
    size: auto;   
    margin-bottom: 0mm;
}

body {
    width: 100%;
    background-color: #d5d5d5;
}

#header {
    margin: 30px;
    justify-content: center;
    align-items: center;
    text-align: center;
}
#header img{
    margin-bottom: -30px;
}

#form #detail {
    background-color: #f1f1f1;
    margin: 0 20px;
    padding: 1px 30px;
    justify-content: center;
    text-align: center;
    align-items: center;
}
#form #detail h3 {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 560;
    font-size: 20px;
}
#form #detail .p1 {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 300px;
    font-size: 16px;
}
#form #detail h5 {
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 20px;
    font-size: 36px;
    font-weight: 540;
}
#form #detail h6 {
    font-family: Arial, Helvetica, sans-serif;
    margin-top: -60px;
    font-size: 36px;
    font-weight: 540;
}

#form #detail .p2 {
    padding-bottom: 5px;
    margin-top: -40px;
    font-weight: 560;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    border-bottom: 1px solid#ddd;
    text-align: start;
}
#form #detail .p3 {
    padding-bottom: 5px;
    margin-top: 20px;
    font-weight: 560;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    border-bottom: 1px solid#ddd;
    text-align: start;
}


#form #detail #content .content-desc {
    margin: 15px 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    text-align: start;
    font-family: Arial, Helvetica, sans-serif;
}

#form #detail #content .content-desc .item {
    width: 70%;
    display: grid;
    text-align: start;
    font-family: Arial, Helvetica, sans-serif;
}
</style>
<body>
    <div id="header">
        <a href="../data_barang_user.php">
            <img src="/uts/view/jordan.png" alt="" style="width:200px; ">
        </a>
    </div>

    <div id="form">
        <div id="detail">
            <h3>Hi <?php echo $rn["name"]?>!</h3>
            <p class="p1">Your purchase is successfull.</p>
            <h5>INVOICE ID:</h5>
            <h6><?php echo $rn["id"]?><?php echo $rn["pin_code"]?>24</h6>
            <p class="p2">YOUR ORDER INFORMATION</p>
            <div id="content">
                <div class="content-desc">
                    <div class="desc">NAME</div>
                    <div><?php echo $rn["name"] ?></div>
                </div>
                <div class="content-desc">
                    <div class="desc">PHONE NUMBER</div>
                    <div><?php echo $rn["number"] ?></div>
                </div>
                <div class="content-desc">
                    <div class="desc">PAYMENT METHOD</div>
                    <div><?php echo $rn["method"] ?></div>
                </div>
                <div class="content-desc">
                    <div class="desc">ADDRESS</div>
                    <div><?php echo $rn["street"] ?>, <?php echo $rn["city"] ?>, <?php echo $rn["state"] ?></div>
                </div>
                <div class="content-desc">
                    <div class="desc">TOTAL</div>
                    <div><b>$<?php echo $rn["total_price"] ?></b></div>
                </div>
                <p class="p3">WHAT YOU ORDER</p>
                <div class="content-desc">
                    <div class="desc">PRODUCTS</div>
                    <div class="item"><?php echo $rn["total_products"] ?></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
            <script>
                window.print();
            </script>
        </div>
    </div>
   
</body>
</html>