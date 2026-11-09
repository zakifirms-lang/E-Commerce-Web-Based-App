<?php
session_start();
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $kdbrg = $_POST["kdbrg"];
    $nmbrg = $_POST["nmbrg"];
    $hrgbrg = $_POST["hrgbrg"];
    $stokbrg = $_POST["stokbrg"];

    $sql = "UPDATE barang SET nmbrg='$nmbrg', hrgbrg='$hrgbrg', stokbrg='$stokbrg' WHERE kdbrg='$kdbrg'";
    mysqli_query($kon, $sql);

    if ($_FILES["img"]["error"] == 0) {
        $img = $_FILES["img"]["name"];
        $img_tmp = $_FILES["img"]["tmp_name"];
        $img_path = "/uts/admin/img/" . $img;
        move_uploaded_file($img_tmp, $img_path);

        $sql_update_image = "UPDATE barang SET img='$img_path' WHERE kdbrg='$kdbrg'";
        mysqli_query($kon, $sql_update_image);
    }

    header("Location: data_barang.php");
}
?>