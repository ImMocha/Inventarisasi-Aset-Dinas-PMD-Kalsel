<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("Location: authh/login.php");
    exit;
}

require_once "config.php";

$title = "Dashboard - Inventarisasi Aset Dinas PMD Kalsel";
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";

$queryJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon");
$jmlJenis = mysqli_num_rows($queryJenis);

$queryRuangan = mysqli_query($koneksi, "SELECT * FROM tbl_pgwrn");
$jmlRuangan = mysqli_num_rows($queryRuangan);

$queryRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang");
$jmlRuang = mysqli_num_rows($queryRuang);

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatann");
$jmlJabatan = mysqli_num_rows($queryJabatan);

?>
                
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Kondisi Aset</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"><?= $jmlJenis ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Data Aset Pegawai</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"><?= $jmlRuangan ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Data Aset Ruangan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"><?= $jmlRuang ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Data Aset Jabatan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"><?= $jmlJabatan ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </main>

                <?php

                  require_once "template/footer.php";

                ?>
                