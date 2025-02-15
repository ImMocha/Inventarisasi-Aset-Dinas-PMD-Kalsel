<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav menu-heading">Home</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/adduser.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                              User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/password.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                              Ganti Password
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>pegawaiii/pegawaiii.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                              Pegawai
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>barang/barang.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                              Barang
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>jenis/jenis.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-caravan"></i></div>
                              Kondisi Aset
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>ruangan/ruangan.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney-user"></i></div>
                              Aset Pegawai
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>jabatan/jabatan.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-caravan"></i></div>
                              Posisi Jabatan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>ruang/ruang.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney-user"></i></div>
                              Ruangan Barang
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>pelihara/pelihara.php">
                              <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney-user"></i></div>
                              Pemeliharaan Aset
                            </a>
                            <hr class="mb-0">
                      </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION["ssUser"] ?>
                    </div>
                </nav>
        </div>