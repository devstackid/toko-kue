<?php
session_start();
include "admin/config/koneksi.php";

if (!isset($_SESSION["user_data"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_data"]["id"];
    $cartID = $_POST["cartID"];
    $newQuantity = $_POST["newQuantity"];

    // Validasi nilai kuantitas (pastikan bilangan bulat positif)
    if (!is_numeric($newQuantity) || $newQuantity <= 0) {
        echo "error_invalid_quantity";
        exit();
    }

    // Perbarui kuantitas produk dalam keranjang
    $query = "UPDATE carts SET quantity='$newQuantity' WHERE user_id='$user_id' AND id='$cartID'";
    if ($conn->query($query) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
$conn->close();
?>
