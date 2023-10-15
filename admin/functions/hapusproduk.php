<?php 
session_start();
require_once "../config/koneksi.php";

if (!isset($_SESSION["user_data"])) {
    header("Location: ../../login.php");
    exit;
}

$userData = $_SESSION["user_data"];
if ($userData['role'] == "pelanggan") {
    header("Location: ../../home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $productId = $_GET["id"];

    // Ambil nama file gambar_produk dari database
    $query = "SELECT gambar_produk FROM products WHERE id='$productId'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_file_gambar = $row["gambar_produk"];

        // Hapus file gambar_produk dari direktori
        $direktori_upload = "../images/"; // Ganti dengan direktori sesuai lokasi penyimpanan gambar
        $lokasi_file_gambar = $direktori_upload . $nama_file_gambar;

        if (file_exists($lokasi_file_gambar)) {
            unlink($lokasi_file_gambar); // Hapus file gambar
        }

        // Hapus data produk dari database
        $query_hapus_produk = "DELETE FROM products WHERE id='$productId'";
        if ($conn->query($query_hapus_produk) === TRUE) {
            header("Location: ../products.php?pesan=berhasil");
            exit();
        } else {
            header("Location: ../products.php?pesan=gagal");
            exit();
        }
    } else {
        header("Location: ../products.php?pesan=gagal");
        exit();
    }
}

$conn->close();


?>