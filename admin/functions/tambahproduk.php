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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama_produk = htmlspecialchars($_POST["nama_produk"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $gambar_produk = $_POST['gambar_produk'];
    $created_at = htmlspecialchars($_POST["created_at"]);

    // Validasi apakah gambar telah dipilih
    if (isset($_FILES["gambar_produk"])) {
        $nama_file = $_FILES["gambar_produk"]["name"];
        $ukuran_file = $_FILES["gambar_produk"]["size"];
        $tmp_file = $_FILES["gambar_produk"]["tmp_name"];
        $tipe_file = $_FILES["gambar_produk"]["type"];

        // Validasi tipe file (misalnya, hanya menerima gambar)
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (!in_array($tipe_file, $allowed_types)) {
            header("Location: ../products.php?pesan=invalid_image_type");
            exit();
        }

        // Validasi ukuran file (misalnya, tidak lebih dari 2MB)
        $max_file_size = 2 * 1024 * 1024; // 2MB
        if ($ukuran_file > $max_file_size) {
            header("Location: ../products.php?pesan=file_too_large");
            exit();
        }

        // Direktori tempat gambar akan diunggah
        $direktori_upload = "../images/";

        // Set nama file yang unik untuk menghindari penimpaan
        $nama_file_unik = uniqid() . "_" . $nama_file;

        // Tentukan lokasi akhir file gambar
        $lokasi_simpan_gambar = $direktori_upload . $nama_file_unik;

        // Upload gambar ke server
        if (move_uploaded_file($tmp_file, $lokasi_simpan_gambar)) {
            // Simpan data produk ke database
            $query = "INSERT INTO products (nama_produk, deskripsi, harga, created_at, gambar_produk) VALUES ('$nama_produk','$deskripsi', '$harga', '$created_at', '$nama_file_unik')";
            
            if ($conn->query($query) === TRUE) {
                header("Location: ../products.php?pesan=success"); // Redirect ke halaman daftar produk
                exit();
            } else {
                header("Location: ../products.php?pesan=error");
                exit();
            }
        } else {
            // Gagal mengunggah gambar
            header("Location: ../products.php?pesan=gagal_upload");
            exit();
        }
    } else {
        // File gambar tidak dipilih
        header("Location: ../products.php?pesan=gambar_required");
        exit();
    }
}



$conn->close();
?>
