<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";

$title =  "Profile Dinas - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'notimage') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Update data dinas gagal, file yang di upload bukan gambar
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'oversize') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Update data dinas gagal, max ukuran gambar 1 MB..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Data dinas berhasil diperbaharui congrats
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

$dinas = mysqli_query($koneksi, "SELECT * FROM tbl_diinas WHERE id = 1");
$data = mysqli_fetch_array($dinas);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dinas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile Dinas</li>
                        </ol>

                        <form action="prosesdinas.php" method="POST" enctype="multipart/form-data">
                        <?php
                            if ($msg !== '') {
                                echo $alert;
                            }
                          ?>
                        <div class="card">
                          <div class="card-header">
                              <span class="h5"><i class="fa-solid fa-pen-to-square"></i> Data Dinas</span>
                              <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                              <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-4 text-center px-5">
                                <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">
                                <img src="../asset/img/<?= $data['gambar'] ?>" alt="gambar dinas" class="mb-3" width="100%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih gambar PNG, JPG atau JPEG dengan ukuran max 1 MB</small>
                              </div>
                              <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                  <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -40px;">
                                      <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="nama dinas" required>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -40px;">
                                      <input type="email" class="form-control border-0 border-bottom" id="email" name="email" value="<?= $data['email'] ?>" placeholder="email dinas" required>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -40px;">
                                      <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Visi dan Misi</label>
                                    <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -40px;">
                                      <textarea name="visimisi" id="visimisi" cols="30" rows="3" class="form-control" required><?= $data['visimisi'] ?></textarea>
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