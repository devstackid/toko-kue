<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/header.php'); ?>
</head>
<body>
    

    <!-- content -->
    <div class="container-fluid d-flex align-items-center justify-content-center position-relative overflow-hidden" style="height: 100vh;">
        <div class="text-center">
            <img src="images/avatar.png" width="200" alt="foto">
            <h5 class="fw-bold">Selamat Datang Di Toko Kue Aqila <span class="d-block fw-normal text-secondary" style="font-size: 14px;">Kami menyediakan berbagai macam aneka kue mulai dari varian kue kering dan basah</span> <span class="d-block fw-normal text-secondary" style="font-size: 14px;">Ingin melihat apa saja varian kue yang kami sediakan?</span></h5>
            <a href="home.php" class="btn btn-primary mt-2">Lanjutkan</a>
        </div>

        <!-- animasi atas -->
        
        <div class="bg-danger-subtle rounded-circle position-absolute" style="width: 300px; height: 200px; top:-150px; right:-50px;"></div>

        <div class="d-flex align-items-center gap-1 position-absolute" style="top: 15px; left:20px;">
            <div class="rounded-circle bg-danger" style="width: 15px; height: 15px;"></div>
            <div class="rounded-circle bg-primary" style="width: 15px; height: 15px;"></div>
            <div class="rounded-circle bg-warning" style="width: 15px; height: 15px;"></div>
            <span class="fw-bold">Cake Shop</span>
        </div>
        <!-- akhir animasi atas -->
    </div>
    <!-- akhir content -->

    
</body>
</html>