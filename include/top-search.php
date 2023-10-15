<div class="d-flex align-items-center justify-content-between position-absolute bg-white p-3 shadow-sm" style="top: 0; left:0; right:0;">
            <div class="d-flex align-items-center gap-md-3">
                <div class="d-flex align-items-center gap-1">
                    <div class="rounded-circle bg-danger" style="width: 15px; height: 15px;"></div>
                    <div class="rounded-circle bg-primary" style="width: 15px; height: 15px;"></div>
                    <div class="rounded-circle bg-warning" style="width: 15px; height: 15px;"></div>
                    <span class="fw-bold">Cake Shop</span>
                </div>

                <form action="" class="d-none d-md-inline">
                    <div class="input-group ">
                        <input type="text" class="form-control" type="search" name="search" placeholder="" aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button type="submit" class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <?php 
            if (isset($_SESSION["user_data"])) {
                echo '
                <a href="admin/logout.php" class="btn btn-danger fw-bold" style="font-size: 14px;">Logout</a>
                ';
            } else {
                echo '
                <div class="d-flex items-center gap-2">
            <a href="login.php" class="btn btn-danger fw-bold" style="font-size: 14px;">Masuk</a>
            <a href="register.php" class="btn btn-primary fw-bold" style="font-size: 14px;">Daftar</a>
        </div>
                ';
            }
            ?>
        </div>