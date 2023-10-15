<?php
session_start();
require 'admin/config/koneksi.php';
if (isset($_SESSION["user_data"])) {
    $userData = $_SESSION["user_data"];
}

// Menghitung jumlah total data
$query_count = "SELECT COUNT(*) as total FROM products";
$result_count = $conn->query($query_count);
$total_data = $result_count->fetch_assoc()["total"];


// Mengatur data per halaman
$data_per_page = isset($_GET["data_per_page"]) ? intval($_GET["data_per_page"]) : 5;
$total_pages = ceil($total_data / $data_per_page);

// Mendapatkan halaman yang diminta oleh pengguna
$current_page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$offset = ($current_page - 1) * $data_per_page;

// Mengambil data dari database dengan LIMIT dan OFFSET
$query_data = "SELECT * FROM products LIMIT $data_per_page OFFSET $offset";
$result_data = $conn->query($query_data);
$num_displayed = mysqli_num_rows($result_data);

// pencarian
$search_query = isset($_GET["search"]) ? $_GET["search"] : "";

// Mengambil data dari database dengan LIMIT, OFFSET, dan Kueri Pencarian
$query_data = "SELECT * FROM products 
               WHERE nama_produk LIKE '%$search_query%' 
               LIMIT $data_per_page OFFSET $offset";
$result_data = $conn->query($query_data);


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('include/header.php'); ?>
</head>

<body>


    <!-- content -->
    <div class="container-fluid d-flex align-items-center justify-content-center position-relative overflow-hidden p-0" style="height: 100vh;">

        <!-- pesan -->

        <?php if (isset($_GET['pesan'])) : ?>
            <div class="alert alert-warning alert-dismissible fade show position-absolute z-3" role="alert" style="top: 60px; width: 75%; font-size: 14px;">
                <strong>Berhasil! </strong> <?= $_GET['pesan']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <!-- navbar -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x bg-danger-subtle px-3 rounded-top-3 py-1 z-3">
            <?php include('include/menu.php'); ?>
        </div>
        <!-- akhir navbar -->

        <!-- content -->
        <div class="container-fluid overflow-y-auto pb-3 bg-body-tertiary" style="height:100vh;">
            <div style="height: 15vh;"></div>
            <div class="d-flex justify-content-center w-100">
                <div class="w-100">
                    

                    <div class="container mb-2 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <p class="text-secondary" style="font-size: 12px;">Menampilkan</p>
                            <div class="dropdown mb-3">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $data_per_page ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="?data_per_page=5">5</a>
                                    <a class="dropdown-item" href="?data_per_page=10">10</a>
                                    <a class="dropdown-item" href="?data_per_page=25">25</a>
                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                </div>
                            </div>
                            <p class="text-secondary" style="font-size: 12px;">Data</p>
                        </div>
                        <div class="d-inline d-md-none">
                            <form action="">
                        <div class="input-group ">
                            <input type="text" class="form-control bg-transparent" type="search" name="search" placeholder="" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                            <button type="submit" class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- list produk -->
            <div class="container">

                <div class="row gap-3">
                    <?php foreach ($result_data as $product) : ?>
                        <?php
                        $harga_awal = $product["harga"];
                        $harga = "Rp " . number_format($harga_awal, 0, ",", ".");
                        ?>
                        <div class="col bg-white shadow-sm rounded-2 py-2 px-0 mb-2">
                            <div class="text-center mx-auto overflow-hidden mb-2" style="width: 100px; height: 100px;">
                                <img src="admin/images/<?= $product["gambar_produk"]; ?>" class="img-fluid" alt="">
                            </div>
                            <div class="border-top pt-2 px-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h1 class="text-dark" style="font-size: 16px;"><strong><?= $product["nama_produk"]; ?></strong></h1>
                                    <h1 class="text-danger" style="font-size: 13px;"><strong><?= $harga; ?></strong></h1>
                                </div>
                                <div>
                                    <p class="text-secondary fw-light" style="font-size: 13px;"><strong><?= $product["deskripsi"]; ?></strong></p>
                                </div>
                                <form action="add_to_chart.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button class="btn btn-outline-danger w-100 fw-semibold" style="font-size: 12px;" type="submit"><i class="bi bi-cart-plus"></i> Tambah</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="d-flex align-items-center justify-content-center my-5">

                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm justify-content-end">
                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <li class="page-item border-0">
                                    <a class="page-link text-dark border-0 <?php if ($i === $current_page) echo "bg-danger-subtle text-dark fw-bold"; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- akhir list produk -->
        </div>
        <!-- content -->


        <!-- animasi atas -->



        <?php include('include/top-search.php'); ?>
        <!-- akhir animasi atas -->
    </div>
    
    <!-- akhir content -->
        


    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>