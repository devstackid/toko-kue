<?php
// include("config/koneksi.php");
// session_start();
// $users = $_SESSION['users'];

// if (!isset($_SESSION['users'])){
// header("Location:login.php");
// }
?>	

<!-- navbar sm -->
<header class="w-100 position-relative d-block d-md-none mb-4 " style="height: 55px;">
      <nav class="navbar position-absolute top-0 start-0 end-0 navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="../image/haycoffee_id-08-08-2023-0001.jpg" width="40" class="ratio-1x1 rounded-circle" alt="">
            <span class="text-uppercase fw-bold fs-6">Cake Shop</span>
          </a>

          <button class="navbar-toggler border-0 shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
          </button>
          <div class="collapse navbar-collapse "  id="navbarNavAltMarkup">
            <div class="navbar-nav gap-1 overflow-auto" style="height: 90vh;">
              
              <ul class="nav nav-pills flex-column mb-auto mt-3">
                <li class="nav-item mb-2">
                  <a href="index.php" class="nav-link active text-white fw-bold" aria-current="page">
                    <i class="bi bi-house me-3"></i>
                    Beranda
                  </a>
                </li>

                <li class="nav-item">
                  <a href="profile.php" class="nav-link bg-body-tertiary text-black fw-semibold">
                    <i class="bi bi-people me-3"></i>
                    Pengaturan Profil
                  </a>
                </li>

                <li class="nav-item my-3 px-2">
                  <span class="text-uppercase text-secondary" style="font-size: 12px; font-weight: 500;">daftar menu</span>
                </li>
                
                <li class="nav-item accordion-item mb-2">
                <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="bi bi-people me-3"></i> Pekerja
                </button>
                <div id="collapseOne" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                  <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                    <a href="akun.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Akun</a>
                  </div>
                  <div class="accordion-body ps-2 rounded-2 py-1">
                    <a href="gaji.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Penggajihan</a>
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
                    <a href="agenda" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Agenda Kegiatan</a>
                  </div>
                </div>
              </li>
                <?php if ($userData["role"] == "admin"): ?>
                <?php endif; ?>

                <li class="nav-item accordion-item mb-2">
                  <button class="d-flex px-3 text-dark w-100 fw-semibold bg-body-tertiary py-2 px-2 rounded-3 dropdown-toggle accordion-button" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="bi bi-filetype-pdf me-3"></i> Laporan
                  </button>
                  <div id="collapseFour" class="accordion-collapse collapse py-2" data-bs-parent="#accordionExample">
                    <div class="accordion-body ps-2 rounded-2 py-1 mb-1">
                      <a href="laporankaryawan.php" class="nav-link text-dark"><i class="bi bi-dot me-2"></i> Karyawan</a>
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
                <li class="nav-item">
                  <a href="logout.php" class="nav-link bg-danger text-white fw-semibold">
                    <i class="bi bi-box-arrow-left me-3"></i>
                    Keluar
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- akhir navbar sm -->

    <!-- navbar md - lg -->
    <div class="d-none px-3 py-2 bg-white d-md-flex justify-content-between align-items-center w-100 border-bottom">
      <a href="/" class="text-decoration-none text-black">
        <img src="../image/haycoffee_id-08-08-2023-0001.jpg" width="40" class="ratio-1x1 rounded-circle" alt="">
        <span class="text-uppercase fw-bold">Cake Shop</span>
      </a>
      <div>
        <img src="../image/pngwing.com (3).png" width="40" class="ratio-1x1 rounded-circle" alt="">

        <div class="btn-group">
          <button type="button" class="btn dropdown-toggle text-capitalize" style="font-size: 12px; font-weight: 500;" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
        //    echo $userData['name']; 
          ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php">Pengaturan Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="logout.php">Keluar</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- akhir navbar md - lg -->