<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";
$title = "Tambah Pegawai - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = "";
}

$alert = '';
if ($msg == 'cancel') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-xmark"></i> Tambah pegawai gagal, nip sudah ada..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'notimage') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-xmark"></i> Tambah pegawai gagal, file yang anda upload bukan gambar..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'oversize') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-xmark"></i> Tambah pegawai gagal, max ukuran gambar 1 MB..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'added') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Tambah pegawai berhasil congrats
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Pegawai</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="pegawaiii.php">Pegawai</a></li>
                            <li class="breadcrumb-item active">Tambah Pegawai</li>
                        </ol>
                        <form action="prosespegawaiii.php" method="POST" enctype="multipart/form-data">
                          <?php if($msg != '') {
                            echo $alert;
                          } ?>
                        <div class="card">
                  <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Pegawai</span>
                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                      <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <label for="nama" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                          <input type="text" name="nama" class="form-control ps-2 border-0 border-bottom" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <label for="alamat" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <label for="telepon" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                          <input type="tel" name="telepon" pattern="[0-9]{5,}" title="minimal 5 angka" class="form-control ps-2 border-0 border-bottom" required>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                    </div>
                </main>

<?php 

require_once "../template/footer.php";

?>