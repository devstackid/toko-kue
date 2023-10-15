<?php
session_start();
if (isset($_SESSION['pesan_berhasil'])) {
    echo '<script>document.getElementById("success-message").style.display = "block";</script>';
    unset($_SESSION['pesan_berhasil']); // Hapus pesan dari session
}

if (isset($_SESSION['pesan_gagal'])) {
    echo '<script>document.getElementById("error-message").style.display = "block";</script>';
    unset($_SESSION['pesan_gagal']); // Hapus pesan dari session
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('include/header.php'); ?>
</head>

<body>
    <div class="w-100 bg-white d-flex align-items-center justify-content-center position-relative" style="height: 100vh;">
        <div class="py-5" style="width: 500px;">

            <h1 class="text-center text-capitalize fs-4 ">Buat Akun <span class="d-block text-secondary" style="font-size: 12px;">silahkan isi form dibawah ini untuk mendaftar</span></h1>
            <!-- pesan eror -->

            <div id="success-message" class="alert alert-success" style="display:none;">
                Pendaftaran berhasil! Anda dapat masuk ke akun Anda.
            </div>

            <div id="error-message" class="alert alert-danger" style="display:none;">
                Pendaftaran gagal. Mohon periksa kembali data yang Anda masukkan.
            </div>


            <form action="register_process.php" method="POST" class="w-75 mx-auto mt-3">
                <div class="mb-3">
                    <label for="nama" class="fw-semibold" style="font-size: 12px;">Nama Lengkap</label>
                    <input id="nama" name="nama" type="text" class="d-block bg-body-secondary rounded-2 w-100 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="fw-semibold" style="font-size: 12px;">No. telepon</label>
                    <input id="nomor_telepon" name="nomor_telepon" type="text" class="d-block bg-body-secondary rounded-2 w-100 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="fw-semibold" style="font-size: 12px;">Nama Pengguna</label>
                    <input id="username" name="username" type="text" class="d-block bg-body-secondary rounded-2 w-100 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="fw-semibold" style="font-size: 12px;">Kata Sandi</label>
                    <input id="password" name="password" type="password" class="d-block w-100 bg-body-secondary rounded-2 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <input type="hidden" id="alamat" name="alamat" value="nullable"></input>
                <input type="hidden" name="role" value="pelanggan">
                <div class="d-flex align-items-baseline gap-2">
                    <input type="checkbox" name="remember" id="remember" required>
                    <label for="remember" class="text-secondary" style="font-size: 12px;">Saya menyetujui kebijakan dan ketentuan umum dalam penggunaan layanan ini.</label>
                </div>
                <button type="submit" name="Daftar" class="btn btn-warning fw-bold w-100 mt-2">Buat Akun</button>
            </form>
        </div>

        <div class="d-flex align-items-center justify-content-between position-absolute bg-white p-3 shadow-sm" style="top: 0; left:0; right:0;">
            <div class="d-flex align-items-center gap-md-3">
                <div class="d-flex align-items-center gap-1">
                    <div class="rounded-circle bg-danger" style="width: 15px; height: 15px;"></div>
                    <div class="rounded-circle bg-primary" style="width: 15px; height: 15px;"></div>
                    <div class="rounded-circle bg-warning" style="width: 15px; height: 15px;"></div>
                    <span class="fw-bold">Cake Shop</span>
                </div>
            </div>
            <a href="login.php" class="btn btn-primary fw-bold" style="font-size: 14px;">Masuk</a>

        </div>
        <!-- navbar -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x bg-danger-subtle px-3 rounded-top-3 py-1 z-3">
            <?php include('include/menu.php'); ?>
        </div>
        <!-- akhir navbar -->
    </div>


</body>

</html>