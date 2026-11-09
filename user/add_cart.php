<?php
include "koneksi.php";

if (isset($_GET['cart'])) {
    $productId = $_GET['cart'];

    // Fetch product details from the database based on the product ID
    $sql = "SELECT * FROM barang WHERE idbrg = $productId";
    $result = mysqli_query($kon, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Check if the product is already in the cart
        $selectCart = mysqli_query($kon, "SELECT * FROM cart WHERE name = '" . mysqli_real_escape_string($kon, $product['nmbrg']) . "'");
        if (mysqli_num_rows($selectCart) > 0) {
            // Product already in cart
            echo '<script>alert("Product is already in the cart.");
            document.location="data_barang_user.php";</script>';
        } else {
            // Insert the product into the cart table
            $insertQuery = "INSERT INTO cart (name, price, img, quantity) VALUES (
                '" . mysqli_real_escape_string($kon, $product['nmbrg']) . "',
                '" . mysqli_real_escape_string($kon, $product['hrgbrg']) . "',
                '" . mysqli_real_escape_string($kon, $product['img']) . "',
                1
            )";

            $insertResult = mysqli_query($kon, $insertQuery);

            if ($insertResult) {
                // Product added to cart successfully
                echo '<script>alert("Product added to cart successfully!");
                document.location="data_barang_user.php";</script>';
            } else {
                // Error adding product to cart
                echo '<script>alert("Error adding product to cart.' . mysqli_error($kon) . '");
                document.location="data_barang_user.php";</script>';
            }
        }
    } else {
        // Product not found in the database
        echo "Product not found!";
    }
} else {
    // No product ID provided in the URL
    echo "Product ID not provided!";
}
?>
