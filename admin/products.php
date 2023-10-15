<?php 
session_start();
require 'config/koneksi.php';

if (!isset($_SESSION["user_data"])) {
    header("Location: ../login.php");
    exit;
}

$userData = $_SESSION["user_data"];

if ($userData['role'] == "pelanggan") {
    header("Location: ../home.php");
}

// paginasi dan jumlah data yang ditampilkan

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
    <!-- navbar menu -->
    <?php include('include/menu.php'); ?>
    <!-- akhir navbar menu -->

    <!-- content -->
    <div class="w-100 h-100 row m-0">

        <?php include('include/sidebar.php'); ?>

        <!-- main -->
        <!-- main -->
        <div class="col bg-white overflow-auto p-3" style="height: 90vh;">
            <div class="mb-4 d-flex align-items-center justify-content-between px-2">
                <h3>Daftar Produk <span class="d-block" style="font-size: 12px;">Anda dapat melakukan pengelolaan produk disini.</span></h3>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-plus"></i> Tambah Produk
                </button>
            </div>
            <?php
            if (isset($_GET["pesan"])) {
                if ($_GET["pesan"] === "success") {
                    echo "<div class='alert alert-info alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Berhasil menambahkan akun.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                } elseif ($_GET["pesan"] === "error") {
                    echo "<div class='alert alert-danger alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Akun tidak berhasil ditambahkan
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                } elseif ($_GET["pesan"] === "berhasil") {
                    echo "<div class='alert alert-info alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Akun berhasil dihapus
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                } elseif ($_GET["pesan"] === "gagal") {
                    echo "<div class='alert alert-danger alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Tidak dapat menghapus akun.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                } elseif ($_GET["pesan"] === "invalid") {
                    echo "<div class='alert alert-danger alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Tidak dapat melakukan perubahan pada akun.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                } elseif ($_GET["pesan"] === "edited") {
                    echo "<div class='alert alert-info alert-dismissible fade show w-100' style='font-size: 12px;' role='alert'>
                                Berhasil mengubah informasi akun
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                }
            }
            ?>
            <div class="container">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <p class="text-secondary fw-medium" style="font-size: 12px;">Menampilkan</p>
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
                        <p class="text-secondary fw-medium" style="font-size: 12px;">Data</p>
                    </div>
                    <!-- pencarian -->
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" type="search" name="search" placeholder="Cari data" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                            <button type="submit" class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></button>
                        </div>
                    </form>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-capitalize">No.</th>
                                <th class="text-capitalize">Gambar</th>
                                <th class="text-capitalize">Nama Produk</th>
                                <th class="text-capitalize">Deskripsi</th>
                                <th class="text-capitalize">Harga</th>
                                <th class="text-capitalize">Tanggal</th>
                                <th class="text-capitalize">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $nomor_urutan = $offset + 1;
                            
                            foreach ($result_data as $product) : ?>
                                <tr>
                                    <td style="font-size: 13px;"><?= $nomor_urutan; ?></td>
                                    <td><img src="images/<?= $product["gambar_produk"] ?>" width="50" alt=""></td>
                                    <td style="font-size: 13px;" class="text-capitalize"><?= $product["nama_produk"]; ?></td>
                                    <td style="font-size: 13px;" class="text-capitalize"><?= $product["deskripsi"]; ?></td>
                                    <td style="font-size: 13px;" class="text-capitalize"><?= $product["harga"]; ?></td>
                                    <td style="font-size: 13px;" class="text-capitalize"><?= $product["created_at"]; ?></td>
                                    
                                    <td style="font-size: 13px;" class="gap-2 text-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $product["id"]; ?>" class="btn-sm btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo $product["id"]; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <!-- modal hapus -->
                                <div class="modal fade" id="deleteModal-<?php echo $product["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                                </button>
                                            </div>
                                            <div class="modal-body border-0">
                                                Apakah Anda yakin ingin menghapus produk ini?
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a class="btn btn-danger" href="functions/hapusproduk.php?id=<?php echo $product["id"]; ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal edit data -->
                                <div class="modal fade" id="editModal-<?php echo $product["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title" id="editModalLabel">Ubah Data <span class="d-block text-secondary" style="font-size: 12px;">Anda dapat mengubah informasi produk dengan mengubah data dibawah ini</span></h5>
                                            </div>
                                            <div class="modal-body border-0">
                                                <form method="post" action="functions/editproduk.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                                                    <div class="mb-2">
                                                        <label class="fw-semibold text-black" style="font-size: 12px;">Nama Produk</label>
                                                        <input id="nama_produk_<?php echo $product["id"]; ?>" name="nama_produk" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" value="<?php echo $product["nama_produk"]; ?>">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="fw-semibold text-black" style="font-size: 12px;">Deskripsi</label>
                                                        <input id="deskripsi_<?php echo $product["id"]; ?>" name="deskripsi" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" value="<?php echo $product["deskripsi"]; ?>">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="fw-semibold text-black" style="font-size: 12px;">Harga</label>
                                                        <input id="harga_<?php echo $product["id"]; ?>" name="harga" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" value="<?php echo $product["harga"]; ?>">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="fw-semibold text-black" style="font-size: 12px;">Gambar</label>
                                                        <input id="gambar_produk_<?php echo $product["id"]; ?>" name="gambar_produk" type="file" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="fw-semibold text-black" style="font-size: 12px;">Waktu Diposting</label>
                                                        <input id="created_at_<?php echo $product["id"]; ?>" name="created_at" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" value="<?php echo $product["created_at"]; ?>">
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php $nomor_urutan++; endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="text-primary fw-medium" style="font-size: 13px;">Menampilkan <?php echo $offset + $num_displayed; ?> dari <?php echo $total_data; ?> data</p>

                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-end">
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item <?php if ($i === $current_page) echo "active"; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir main -->
        <!-- akhir main -->
    </div>

    <!-- modal tambah data -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk <span class="d-block text-secondary fw-semibold" style="font-size: 12px;">Isi data dibawah ini untuk menambahkan produk</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="functions/tambahproduk.php" enctype="multipart/form-data">
                        
                        <div class="mb-2">
                            <label for="nama_produk" class="fw-semibold text-black" style="font-size: 12px;">Nama Produk</label>
                            <input id="nama_produk" name="nama_produk" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" required>
                        </div>
                        <div class="mb-2">
                            <label for="deskripsi" class="fw-semibold text-black" style="font-size: 12px;">Deskripsi</label>
                            <input id="deskripsi" name="deskripsi" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" required>
                        </div>
                        <div class="mb-2">
                            <label for="harga" class="fw-semibold text-black" style="font-size: 12px;">Harga</label>
                            <input id="harga" name="harga" type="text" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" required>
                        </div>
                        <div class="mb-2">
                            <label for="gambar_produk" class="fw-semibold text-black" style="font-size: 12px;">Gambar</label>
                            <input id="gambar_produk" name="gambar_produk" type="file" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" required>
                        </div>
                        <div class="mb-2">
                            <label for="created_at" class="fw-semibold text-black" style="font-size: 12px;">Tanggal Posting</label>
                            <input id="created_at" name="created_at" type="date" class="d-block text-capitalize bg-body-tertiary fw-bold w-100 text-black rounded-2 px-1 py-2 border-0 border-bottom" style="outline: none; font-size: 14px;" required>
                        </div>
                        


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir content -->

    <!-- footer -->
    <?php include('include/footer.php'); ?>
    <!-- akhir footer -->
</body>

</html>