<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kdbrg = $_POST["kdbrg"];
    $nmbrg = $_POST["nmbrg"];
    $hrgbrg = $_POST["hrgbrg"];
    $stokbrg = $_POST["stokbrg"];

    $img = $_FILES["img"]["name"];
    $img_tmp = $_FILES["img"]["tmp_name"];
    $img_path = "/uts/admin/img/" . $img;
    move_uploaded_file($img_tmp, $img_path);

    $sql = "INSERT INTO barang (kdbrg, nmbrg, hrgbrg, stokbrg, img) VALUES ('$kdbrg', '$nmbrg', '$hrgbrg', '$stokbrg', '$img_path')";
    mysqli_query($kon, $sql);

    header("Location: data_barang.php"); 
}
?>
