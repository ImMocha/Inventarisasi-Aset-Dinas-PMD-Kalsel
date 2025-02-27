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

$id = $_GET['id'];

$queryPegawai = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii WHERE id= $id");
$data = mysqli_fetch_array($queryPegawai);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Pegawai</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="pegawai.php">Pegawai</a></li>
                            <li class="breadcrumb-item active">Update Pegawai</li>
                        </ol>
                        <form action="prosespegawai.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                  <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Pegawai</span>
                    <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                      <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <label for="nip" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                          <input type="text" name="nip" pattern="[0-9]{18,}" title="minimal 18 angka" class="form-control ps-2 border-0 border-bottom" value="<?= $data['nip'] ?>" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <label for="nama" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                          <input type="text" name="nama" class="form-control ps-2 border-0 border-bottom" value="<?= $data['nama'] ?>" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <label for="alamat" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $data ['alamat'] ?></textarea>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <label for="telepon" class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-9" style="margin-left: -50px;">
                          <input type="tel" name="telepon" pattern="[0-9]{5,}" title="minimal 5 angka" class="form-control ps-2 border-0 border-bottom" value="<?= $data['telepon'] ?>" required>
                        </div>
                      </div>
                      </div>
                      <div class="col-4 text-center px-5">
                        <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                        <img src="../asset/img/<?= $data['foto'] ?>" class="mb-3 rounded-circle" width="40%" alt="">
                        <input type="file" name="image" class="form-control form-control-sm">
                        <small class="text-secondary">Pilih Foto PNG, JPG atau JPEG dengan ukuran max 1 MB</small>
                        <div><small class="text-secondary">width = height</small></div>
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