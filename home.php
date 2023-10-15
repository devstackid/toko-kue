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
    <div class="container-fluid d-flex align-items-center justify-content-center position-relative overflow-hidden p-0" style="height: 100vh;">

        <!-- navbar -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x bg-danger-subtle px-3 rounded-top-3 py-1">
            <?php include('include/menu.php'); ?>
        </div>
        <!-- akhir navbar -->

        <!-- content -->
        <div class="container-fluid overflow-y-auto" style="height:100vh;">
            <div class="d-flex align-items-center justify-content-center text-center w-100" style="height: 100vh;">
                <div>

                    <h1 class="fw-bold">Selamat Datang Di <span class="d-block text-primary">Aqila Cake Shop</span></h1>
                    <span class="block text-black fw-normal" style="font-size: 16px;">Temukan berbagai macam varian kue yang anda inginkan</span>
                    <a href="#about" class="btn btn-warning d-block w-50 mx-auto mt-3">Tentang Kami</a>
                </div>
            </div>

            <!-- section tentang kami -->
            <section id="about" class="d-flex align-items-center justify-content-center text-center w-100" style="height: 100vh;">
                <div class="container">
                    <h1 class="text-center fw-bold text-black">Tentang Kami</h1>
                    <div class="w-100 text-center mt-2">
                        <div class="w-100 mb-5 border-bottom">
                            <p class="text-secondary">Aqila Cake Shop merupakan sebuah platform toko penjualan online berbasis website yang menyediakan berbagai macam varian kue seperti kue lebaran, kue ulang tahun, kue pengantin, kue kering, kue basah dan lain-lain</p>
                        </div>
                        <div class="text-center w-100">
                            <h1 class="fw-bold text-secondary">Kontak</h1>
                            <p class="text-secondary">Anda dapat menghubungi kami melalui kontak yang telah dicantumkan dibawah ini untuk menanyakan seputar informasi yang anda butuhkan.</p>
                            <a href="https://wa.me/+62895631780343?text=
" class="btn btn-danger" target="_blank" class="btn btn-danger"><i class="bi bi-whatsapp"></i> 0895-6317-80343</a>
                            <a href="https://wa.me/+6281258393640?text=
" target="_blank" class="btn btn-outline-danger"><i class="bi bi-whatsapp"></i> 0812-5839-3640</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- akhir tentang kami -->
        </div>
        <!-- content -->


        <!-- animasi atas -->
        <?php include('include/no-top-search.php'); ?>
        
        <!-- akhir animasi atas -->
    </div>
    <!-- akhir content -->
    

</body>

</html>