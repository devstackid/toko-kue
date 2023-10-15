<?php 
session_start();
include 'admin/config/koneksi.php';
if (isset($_SESSION["user_data"])) {
    header("Location: home.php");
    exit();
}
if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST["username"]);
    
    $password = htmlspecialchars($_POST["password"]);

    $login =  "select * from users where username='$username' and password='$password'";
    $result = $conn->query($login);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $_SESSION['user_data'] = array (
            "id" => $user['id'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'password' => $user['password'],
            'nomor_telepon' => $user['nomor_telepon'],
            'alamat' => $user['alamat'],
            'role' => $user['role']
        );

        header("Location: home.php");
        exit();
    }else {
        $error_message = "Nama pengguna atau kata sandi salah!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/header.php'); ?>
</head>
<body>
<div class="w-100 bg-white d-flex align-items-center justify-content-center position-relative" style="height: 100vh;">
        <div class="py-5" style="width: 500px;">
            <div class="w-100 text-center">

                <img src="images/avatar.png" class="rounded-circle ratio-1x1 border border-3 border-black" width="50" alt="">
            </div>
            <h1 class="text-center text-capitalize fs-4 ">masuk <span class="d-block text-secondary" style="font-size: 12px;">silahkan masuk untuk melanjutkan</span></h1>
            
            <?php if (isset($error_message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show w-75 mx-auto" style="font-size: 12px;" role="alert">
                    <?php echo $error_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php endif; ?>

            <form action="" method="post" class="w-75 mx-auto mt-3">
                <div class="mb-3">
                    <label for="username" class="fw-semibold" style="font-size: 12px;">Nama Pengguna</label>
                    <input id="username" name="username" type="text" class="d-block bg-body-secondary rounded-2 w-100 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="fw-semibold" style="font-size: 12px;">Kata Sandi</label>
                    <input id="password" name="password" type="password" class="d-block w-100 bg-body-secondary rounded-2 text-secondary px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 12px;" required>
                </div>
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="fw-semibold text-dark" style="font-size: 12px;">Ingat saya</label>
                </div>
                <button type="submit" name="login" class="btn btn-danger fw-bold w-100 mt-2">Masuk</button>
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
            <a href="register.php" class="btn btn-primary fw-bold" style="font-size: 14px;">Daftar</a>
            
        </div>

        <!-- navbar -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x bg-danger-subtle px-3 rounded-top-3 py-1 z-3">
            <?php include('include/menu.php'); ?>
        </div>
        <!-- akhir navbar -->
    </div>

    
</body>
</html>