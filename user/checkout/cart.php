<?php
include "koneksi.php";

if(isset($_POST['update_quantity'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      echo 'success';
   } else {
      echo 'error';
   }
   exit;
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'");
   header('location:cart.php');
   exit;
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM cart");
   header('location:../data_barang_user.php');
   exit;
}
?>

<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script>
      $(document).ready(function(){
         $('input[name="update_quantity"]').on('input', function(){
            var update_id = $(this).data('update-id');
            var update_value = $(this).val();

            $.ajax({
               type: 'POST',
               url: 'cart.php',
               data: {
                  update_quantity: update_value,
                  update_quantity_id: update_id
               },
               success: function(response){
                  if(response === 'success'){
                     // Quantity updated successfully
                     updateTotals(update_id, update_value);
                     location.reload(); // Reload the page after updating quantity
                  } else {
                     // Error updating quantity
                     alert('Error updating quantity');
                  }
               }
            });
         });

         function updateTotals(productId, quantity) {
            var price = parseFloat($('#price_' + productId).text().replace('$', ''));
            var subTotal = price * quantity;
            $('#subtotal_' + productId).text('$' + subTotal.toFixed(2));

            // Update grand total
            var grandTotal = 0;
            $('td[name="subtotal"]').each(function(){
               grandTotal += parseFloat($(this).text().replace('$', ''));
            });
            $('#grand_total').text('$' + grandTotal.toFixed(2));
         }
      });
   </script>
</head>
<body>

<div class="container">

<section class="shopping-cart">

   <div class="heading">
      <a href="../data_barang_user.php"><img src="/uts/view/jordan.png" alt="Logo"></a>
      <h2>Shopping Cart</h2>
   </div>

   <?php
   $select_cart = mysqli_query($conn, "SELECT * FROM cart");
   $row = mysqli_num_rows($select_cart);
   $grand_total = 0;

   if ($row == 0) {
      echo "<table style='border-bottom: 1.33px solid black; border-top: 1.34px solid black'>
             <tr>
               <td>your cart is empty!</td>
             </tr>
           </table>";
   } else {
   ?>

   <table>

      <thead>
         <th></th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th></th>
      </thead>

      <tbody>

         <?php 
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="<?php echo $fetch_cart['img'];?>" height="100" alt="product"></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo number_format($fetch_cart['price']); ?></td>
            <td>
               <input type="number" min="1" data-update-id="<?php echo $fetch_cart['id']; ?>" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            </td>
            <td>$<?php echo number_format($sub_total = $fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')"><i class="fas fa-trash"></i></a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
         }
         ?>
         <tr class="table-bottom">
            <td><a href="order.php" class="option-btn" style="margin-top: 0;">proceed to checkout</a></td>
            <td colspan="2"></td>
            <td>grand total</td>
            <td>$<?php echo number_format($grand_total); ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <?php
   }
   ?>

</section>

</div>
</body>
</html>
