<?php
    include 'koneksi.php';

    $cart_query = "SELECT * FROM cart";
    $cart_result = mysqli_query($kon, $cart_query);
    $row_count = mysqli_num_rows($cart_result);

    $query = "SELECT * FROM barang;";
    $sql = mysqli_query($kon, $query);

    $no = 1;
?>
<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
    body {
        cursor: default;
    }
</style>
<body>
    <header>
        <div class="logo">
            <img src="/uts/view/jordan.png" alt="Logo">
        </div>
        <div class="jordan">
            <img src="/uts/view/nama.png">
        </div>
    </header>
    <div id="nav">
    <ul>
        <li><a href="../index.php"><b>HOME</b></a></li>
    <li class="dropdown">
        <a href="#login"><b>LOGIN</b></a>
    <div class="dropdown-content">
        <a href="../login/admin.html">Admin</a>
    </div>
    </li>
        <li><a href="../about.php"><b>ABOUT</b></a></li>
    </div>
    <div class="icon">    
        <a href="/uts/user/checkout/order.php"><i class="fa-solid fa-credit-card"></i></a>
        <a href="/uts/user/checkout/cart.php"><i class="fa-solid fa-cart-shopping"><span class="row-count"><?php echo $row_count;?></span></i></a>
    </div>
    </ul>
    
	<div class="galery">
        <?php 
            while($result = mysqli_fetch_assoc($sql)){
        ?>
            <div class="content">
                <h3><?php echo $result["nmbrg"]; ?></h3>
				<img src="<?php echo $result['img']; ?>" alt="img">
                <h6>Stock : <?php echo $result["stokbrg"]; ?></h6>
                <p>$<?php echo $result["hrgbrg"]; ?></p>
                <a href="add_cart.php?cart=<?php echo $result['idbrg']?>">
                <button>
                    Add To Cart
                </button></a>
            </div>
        <?php
            }
        ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".dropdown").click(function(){
            $(".dropdown-content").slideToggle("slow");
        });
    });
</script>
</html>