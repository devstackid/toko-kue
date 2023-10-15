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

// ...

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nama_produk = htmlspecialchars($_POST["nama_produk"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $created_at = htmlspecialchars($_POST["created_at"]);

    if (isset($_FILES["gambar_produk"]) && $_FILES["gambar_produk"]["size"] > 0) {
        $nama_file = $_FILES["gambar_produk"]["name"];
        $ekstensi_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $ukuran_file = $_FILES["gambar_produk"]["size"];

        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $max_file_size = 2 * 1024 * 1024; // 2MB

        if (in_array($ekstensi_file, $allowed_extensions) && $ukuran_file <= $max_file_size) {
            // Direktori tempat gambar akan diunggah
            $direktori_upload = "../images/";

            // Set nama file yang unik untuk menghindari penimpaan
            $nama_file_unik = uniqid() . "_" . $nama_file;

            // Tentukan lokasi akhir file gambar
            $lokasi_simpan_gambar = $direktori_upload . $nama_file_unik;

            // Upload gambar ke server
            if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $lokasi_simpan_gambar)) {
                // Update data produk ke database
                $query = "UPDATE products SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', created_at='$created_at', gambar_produk='$nama_file_unik' WHERE id='$id'";
                
                if ($conn->query($query) === TRUE) {
                    header("Location: ../products.php?pesan=edited");
                    exit();
                } else {
                    header("Location: ../products.php?pesan=invalid");
                    exit();
                }
            } else {
                // Gagal mengunggah gambar
                header("Location: ../products.php?pesan=gagal_upload");
                exit();
            }
        } else {
            // Tipe file tidak valid atau ukuran file terlalu besar
            header("Location: ../products.php?pesan=invalid_image");
            exit();
        }
    } else {
        // File gambar tidak dipilih
        // Update data produk ke database tanpa mengubah gambar
        $query = "UPDATE products SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', created_at='$created_at' WHERE id='$id'";
        
        if ($conn->query($query) === TRUE) {
            header("Location: ../products.php?pesan=edited"); 
            exit();
        } else {
            header("Location: ../products.php?pesan=invalid"); 
            exit();
        }
    }
}

// ...


$conn->close();


?>