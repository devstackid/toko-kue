<div class="d-flex flex-column border-end flex-shrink-0 p-3 bg-white d-none d-md-flex col col-md-3 overflow-auto" style="height: 90vh;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active shadow" aria-current="page">
                        <i class="bi bi-house me-3"></i>
                        Beranda
                    </a>
                </li>

                <li class="nav-item my-3 px-2">
                    <span class="text-uppercase text-secondary" style="font-size: 12px; font-weight: 500;">daftar menu</span>
                </li>

                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-people me-3"></i> Dashboard
                    </button>
                    <div id="collapseOne" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="akun.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Akun Pengguna</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1">
                            <a href="products.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Produk Saya</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="bi bi-card-checklist me-3"></i> Penjadwalan
                    </button>
                    <div id="collapseTwo" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1">
                            <a href="jadwal.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Jadwal Karyawan</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="bi bi-info-circle me-3"></i> Pemberitahuan
                    </button>
                    <div id="collapseThree" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="agenda.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Agenda Kegiatan</a>
                        </div>
                    </div>
                </li>
                <!-- <?php if ($userData["role"] == "admin") : ?>
                <?php endif; ?> -->

                <!-- <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-cash me-3"></i> Keuangan
                    </button>
                    <div id="collapseOne" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="pemasukan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Pemasukan Keuangan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1">
                            <a href="pengeluaran.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Pengeluaran Keuangan</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="bi bi-card-checklist me-3"></i> Catatan
                    </button>
                    <div id="collapseTwo" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1">
                            <a href="catatan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Kebutuhan Bahan</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="bi bi-info-circle me-3"></i> Informasi
                    </button>
                    <div id="collapseThree" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="jadwal.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Penjadwalan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="agenda.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Agenda Kegiatan</a>
                        </div>
                    </div>
                </li> -->
                
                <li class="nav-item accordion-item mb-2">
                    <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <i class="bi bi-filetype-pdf me-3"></i> Laporan
                    </button>
                    <div id="collapseFour" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporankaryawan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Tenaga Kerja</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporanpemasukan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Pemasukan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporanpengeluaran.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Pengeluaran</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporankalkulasi.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Kalkulasi Keuangan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporanbahan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Kebutuhan Bahan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporanpenjadwalan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Penjadwalan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporanagenda.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Agenda Kegiatan</a>
                        </div>
                        <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                            <a href="laporangaji.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Penggajihan</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>