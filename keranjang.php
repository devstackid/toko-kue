    <?php
    session_start();
    if (!isset($_SESSION["user_data"])) {
        header("Location: login.php");
        exit;
    }

    include "admin/config/koneksi.php";
    $user_id = $_SESSION["user_data"]["id"];



    // Ambil data dari tabel "carts" untuk pengguna tertentu
    $sql = "SELECT carts.id AS cart_id,  products.nama_produk, products.deskripsi, products.gambar_produk, carts.quantity, products.harga
            FROM carts
            INNER JOIN products ON carts.product_id = products.id
            WHERE carts.user_id = $user_id";
    $result = $conn->query($sql);

    $total_harga_keranjang = 0; // Inisialisasi total harga keranjang


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include('include/header.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>


        <!-- content -->
        <div class="container-fluid d-flex align-items-center justify-content-center position-relative overflow-hidden p-0" style="height: 100vh;">


            <!-- navbar -->
            <div class="position-absolute bottom-0 start-50 translate-middle-x bg-danger-subtle px-3 rounded-top-3 py-1 z-3">
                <?php include('include/menu.php'); ?>
            </div>
            <!-- akhir navbar -->

            <!-- content -->
            <div class="container-fluid overflow-y-auto pb-3" style="height:100vh;">
                <div style="height: 15vh;"></div>
                <div class="container-fluid position-relative">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <h1 class="fw-bold fs-4">Keranjang Saya <p class="d-block text-secondary fw-normal" style="font-size: 12px; width: 80%;">Anda dapat mengelola dan menyesuaikan daftar belanjaan yang anda inginkan</p>
                            </h1>
                        </div>
                    </div>

                    <div class="table mb-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-capitalize">No.</th>
                                    <th class="text-capitalize">Foto</th>
                                    <th class="text-capitalize">Detail</th>
                                    <th class="text-capitalize">Harga</th>
                                    <th class="text-capitalize">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor_urutan = 1;
                                $total_harga_keranjang = 0; // Inisialisasi total harga keranjang
                                foreach ($result as $product) : ?>
                                    <?php
                                    $quantity = $product["quantity"];

                                    ?>
                                    <tr>
                                        <td style="font-size: 13px;"><?= $nomor_urutan; ?></td>
                                        <td><img src="admin/images/<?= $product["gambar_produk"] ?>" width="50" alt=""></td>
                                        <td style="font-size: 13px;" class="text-capitalize"><?= $product["nama_produk"]; ?> <p class="d-block fw-normal text-secondary" style="font-size: 14px;"><?= $product["deskripsi"]; ?> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, sequi!</p>
                                        </td>
                                        <td style="font-size: 13px;" class="text-capitalize"><?= $product["harga"]; ?></td>
                                        <td class="d-flex gap-2 border-bottom-0"><input class="form-control" type="number" name="quantity[<?= $product['cart_id']; ?>]" min="1" value="<?php echo $quantity; ?>" data-product-id="<?= $product['cart_id']; ?>">
                                            <button class="btn btn-warning fw-bold btn-save-quantity" style="display: none;"><i class="bi bi-check"></i></button>
                                            <button class="btn btn-danger btn-delete-product" data-cart-id="<?= $product['cart_id']; ?>"><i class="bi bi-trash"></i></button>

                                        </td>
                                    </tr>

                                <?php $nomor_urutan++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end w-100 gap-2 align-items-center border-bottom pb-2">
                        <div>
                            <h1 class="fw-bold text-secondary mb-0" style="font-size: 14px;">Total</h1>
                            <div id="total-harga-keseluruhan" class="fw-bold">
                                Total: Rp 0.00 <!-- Inisialisasi dengan nilai awal 0.00 -->
                            </div>
                        </div>
                        <button class="btn btn-danger" id="checkout-button">Checkout</button>

                        <a href="https://wa.me/+6281258393640?text=
" class="btn btn-outline-danger" target="_blank"><i class="bi bi-chat-dots-fill"></i></a>
                    </div>



                </div>
            </div>
            <!-- content -->


            <!-- animasi atas -->

            <?php include('include/no-top-search.php'); ?>
            <!-- akhir animasi atas -->
        </div>
        <!-- akhir content -->



        <script>
            $(document).ready(function() {
                // Variabel untuk menyimpan total harga keseluruhan
                var totalHargaKeseluruhan = 0;

                // Fungsi yang dipanggil ketika input quantity berubah
                $("input[type='number']").change(function() {
                    var cartID = $(this).data("product-id"); // Mengambil cart_id dari data-product-id
                    var newQuantity = $(this).val(); // Mengambil nilai baru dari input quantity

                    // Menyembunyikan tombol "Simpan" jika tidak ada perubahan
                    if (newQuantity == $(this).attr("value")) {
                        $(this).next(".btn-save-quantity").hide();
                    } else {
                        $(this).next(".btn-save-quantity").show();
                    }
                });

                // Fungsi yang dipanggil ketika tombol "Simpan" diklik
                $(".btn-save-quantity").click(function() {
                    var cartID = $(this).prev("input[type='number']").data("product-id");
                    var newQuantity = $(this).prev("input[type='number']").val();

                    // Mengirim permintaan Ajax untuk memperbarui kuantitas di server
                    $.ajax({
                        type: "POST",
                        url: "update_cart.php",
                        data: {
                            cartID: cartID,
                            newQuantity: newQuantity
                        },
                        success: function(response) {
                            if (response === "success") {
                                // Jika berhasil, sembunyikan tombol "Simpan"
                                $(".btn-save-quantity").hide();
                                alert("Kuantitas berhasil diperbarui!");

                                // Perbarui total harga keseluruhan
                                updateTotalHargaKeseluruhan();
                            } else {
                                alert("Terjadi kesalahan saat memperbarui kuantitas.");
                            }
                        },
                        error: function() {
                            alert("Terjadi kesalahan saat memperbarui kuantitas.");
                        }
                    });
                });

                // fungsi untuk menghapus data produk ada keranjang
                $(".btn-delete-product").click(function() {
        var cartID = $(this).data("cart-id");

        // Kirim permintaan AJAX untuk menghapus produk
        $.ajax({
            type: "POST",
            url: "hapus_produk.php", // Gantilah dengan URL yang sesuai
            data: { cartID: cartID },
            success: function(response) {
                if (response === "success") {
                    // Produk berhasil dihapus, perbarui tampilan keranjang
                    location.reload();
                } else {
                    alert("Terjadi kesalahan saat menghapus produk dari keranjang.");
                }
            },
            error: function() {
                alert("Terjadi kesalahan saat menghubungi server.");
            }
        });
    });

                // Fungsi untuk mengubah angka menjadi format Rupiah
                function formatRupiah(angka) {
                    var numberString = angka.toString();
                    var split = numberString.split('.');
                    var sisa = split[0].length % 3;
                    var rupiah = split[0].substr(0, sisa);
                    var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

                    if (ribuan) {
                        var separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return 'Rp. ' + rupiah;
                }
                // Fungsi untuk menghitung dan memperbarui total harga keseluruhan
                function updateTotalHargaKeseluruhan() {
                    totalHargaKeseluruhan = 0; // Reset total harga keseluruhan ke 0

                    // Loop semua produk dan tambahkan harga ke total
                    $("input[type='number']").each(function() {
                        var harga = parseFloat($(this).closest("tr").find(".text-capitalize").eq(1).text());
                        var quantity = parseFloat($(this).val());
                        totalHargaKeseluruhan += harga * quantity;
                    });

                    // Perbarui tampilan total harga keseluruhan
                    $("#total-harga-keseluruhan").text(formatRupiah(totalHargaKeseluruhan));
                }

                // Panggil fungsi untuk menginisialisasi total harga keseluruhan
                updateTotalHargaKeseluruhan();

            });

            document.getElementById('checkout-button').addEventListener('click', function() {
                // Ambil data dari keranjang
                var products = []; // Simpan data produk
                var totalAmount = 0; // Simpan total pembayaran

                // Ambil data produk dan total pembayaran dari keranjang
                // Anda bisa mengganti ini dengan cara yang sesuai dengan struktur data Anda
                <?php foreach ($result as $product) : ?>
                    var productName = "<?= $product['nama_produk']; ?>";
                    var productPrice = <?= $product['harga']; ?>;
                    var productQuantity = <?= $product['quantity']; ?>;

                    // Tambahkan produk ke daftar produk
                    products.push(productName + ' x' + productQuantity);

                    // Tambahkan harga produk ke totalAmount
                    totalAmount += productPrice * productQuantity;
                <?php endforeach; ?>

                // Buat pesan WhatsApp dengan data produk dan total pembayaran
                var message = "Halo, saya ingin memesan : \n\n";
                message += products.join('\n');
                message += "\n\n , Total Pembayaran: Rp " + totalAmount.toLocaleString('id-ID');

                // Ganti spasi dengan '%20' untuk URL tautan WhatsApp
                message = message.replace(/ /g, '%20');

                var whatsappNumber = "6281258393640"; // Nomor WhatsApp Anda dengan kode negara (62)
                var whatsappLink = "https://wa.me/" + whatsappNumber + "?text=" + message;

                // Buka tautan WhatsApp
                window.open(whatsappLink, "_blank");
            });
        </script>



    </body>

    </html>