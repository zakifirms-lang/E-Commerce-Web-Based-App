<?php
include "koneksi.php";

if(isset($_POST['order_btn'])){
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM cart");
   $price_total = 0;
   $product_names = array();
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_names[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      }
   }

   $total_product = implode(', ', $product_names);
   $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, method, street, city, state, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$street','$city','$state','$pin_code','$total_product','$price_total')") or die(mysqli_error($conn));

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
         <div class='message-container'>
            <h3>payment complete!</h3>
            <br>
            <div class='order-detail'>
               <span>".$total_product."</span>
               <span class='total'> total : $".$price_total."</span>
            </div>
            <div class='customer-details'>
               <p> your name : <span>".$name."</span> </p>
               <p> your number : <span>".$number."</span> </p>
               <p> your email : <span>".$email."</span> </p>
               <p> your address : <span>".$street.", ".$city.", ".$state." - ".$pin_code."</span> </p>
               <p> your payment mode : <span>".$method."</span> </p>
            </div>
            <a href='order.php?delete_all=1' class='btn'>continue</a>
            <a href='print.php' class='btn'>print receipt</a>
         </div>
      </div>
      ";
   } else {
      echo "Failed to process the order. Please try again.";
   }
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM cart");
   header("Location: ../data_barang_user.php");
   exit;
}

?>

<html>
<head>
   <title>Checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<section class="checkout-form">

   <div class="header">
      <a href="../data_barang_user.php"><img src="/uts/view/jordan.png" alt="Logo"></a>
      <h2>Payment</h2>
   </div>

   <form action="" method="post">

<div class="display-order">
   <?php
      $select_cart = mysqli_query($conn, "SELECT * FROM cart");
      $grand_total = 0;
      if ($select_cart === false) {
         echo "Error: " . mysqli_error($conn);
      } elseif(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total += $total_price;
            echo "<span>{$fetch_cart['name']} ({$fetch_cart['quantity']})</span>";
         }
      } else {
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      echo "<span class='grand-total'> grand total : $" . number_format($grand_total, 2) . "</span>";
   ?>
</div>
      <div class="flex">
         <div class="inputBox">
            <span>name</span>
            <input type="text" placeholder="enter your name" name="name" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>number</span>
            <input type="text" placeholder="enter your number" name="number" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>email</span>
            <input type="email" placeholder="enter your email" name="email" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="Visa" selected>Visa</option>
               <option value="Mastercard" selected>Mastercard</option>
               <option value="Credit Card">Credit Card</option>
               <option value="Paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address</span>
            <input type="text" placeholder="e.g. street name" name="street" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Chicago" name="city" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. California" name="state" autocomplete="off" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 12345" name="pin_code" autocomplete="off" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="option-btn">

   </form>
</section>

</div>   
</body>
</html>
