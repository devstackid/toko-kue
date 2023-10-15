<?php
session_start();
include "admin/config/koneksi.php";

if (!isset($_SESSION["user_data"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION["user_data"])) {
    $user_id = $_SESSION["user_data"]["id"];
    $cartID = $_POST["cartID"];

    // Periksa apakah produk berada di keranjang pengguna
    $sql = "DELETE FROM carts WHERE id = $cartID AND user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
