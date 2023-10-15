<?php
session_start();
// File add_to_cart.php
include "admin/config/koneksi.php"; // Masukkan file koneksi database
if (!isset($_SESSION["user_data"])) {
    header("Location: login.php");
    exit;
  }
$userData = $_SESSION["user_data"];



// Fungsi untuk menambahkan produk ke keranjang
function tambahkanProdukKeKeranjang($conn, $user_id, $product_id) {
    // Periksa apakah produk sudah ada dalam keranjang
    $sql = "SELECT * FROM carts WHERE user_id = $user_id AND product_id = $product_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 0) {
        // Produk belum ada dalam keranjang, tambahkan ke dalam keranjang dengan quantity = 1
        $sql_insert = "INSERT INTO carts (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
        $conn->query($sql_insert);
        return "Produk berhasil ditambahkan ke dalam keranjang.";
    } else {
        // Produk sudah ada dalam keranjang, update quantity dan total harga
        $sql_update = "UPDATE carts 
                       SET quantity = quantity + 1, 
                           total_harga = (SELECT harga FROM products WHERE id = $product_id) * (quantity + 1)
                       WHERE user_id = $user_id AND product_id = $product_id";
        $conn->query($sql_update);
        return "Jumlah produk dalam keranjang berhasil diperbarui.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Periksa jika metode adalah POST
    $product_id = $_POST['product_id'];
    $user_id = $userData['id'];
    
    $pesan = tambahkanProdukKeKeranjang($conn, $user_id, $product_id);
    
    // Setelah menambahkan produk, arahkan pengguna kembali ke halaman produk.php dengan pesan sukses
    header("Location: products.php?pesan=" . urlencode($pesan));
    exit;
}

?>
