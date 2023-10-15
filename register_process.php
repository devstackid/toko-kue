<?php
// Sertakan file koneksi ke database
include "admin/config/koneksi.php";

// Tangkap data yang dikirim dari form
$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$nomor_telepon = htmlspecialchars($_POST['nomor_telepon']);
$alamat = htmlspecialchars($_POST['alamat']);
$role = $_POST['role'];



// Query SQL untuk memasukkan data ke dalam tabel users
$query = "INSERT INTO users (nama, username, password, nomor_telepon, alamat, role)
          VALUES ('$nama', '$username', '$password', '$nomor_telepon', '$alamat', '$role')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Redirect ke halaman sukses
    $_SESSION['pesan_berhasil'] = "Pembuatan akun berhasil!";
    header("Location: register.php");
} else {
    // Tampilkan pesan error jika gagal
    $_SESSION['pesan_gagal'] = "Tidak dapat memproses pembuatan akun, silahkan coba kembali";
    header("Location: register.php");
    exit();
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
