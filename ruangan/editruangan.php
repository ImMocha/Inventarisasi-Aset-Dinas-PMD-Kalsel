<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Ruangan - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryRuangan = mysqli_query($koneksi, "SELECT * FROM tbl_pgwrn WHERE id= $id");
$data = mysqli_fetch_array($queryRuangan);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Aset Pegawai</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../ruangan/ruangan.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Aset Pegawai
                    </div>
                    <div class="card-body">
                      <form action="prosesruangan.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="ruangan" class="form-label ps-1">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="nama ruangan" value="<?= $data['ruangan'] ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="kondisi" class="form-label ps-1">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                          <?php
                          $kondisi = ["Sangat Baik", "Baik", "Kurang Baik"];
                          foreach ($kondisi as $kds) {
                            if ($data['kondisi'] == $kds) { ?>
                              <option value="<?= $kds ?>" selected><?= $kds ?></option>
                              <?php } else { ?>
                                <option value="<?= $kds ?>"><?= $kds ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="barang" class="form-label ps-1">Barang</label>
                        <select name="barang" id="barang" class="form-select" required>
                          <?php
                          $queryBarang = mysqli_query($koneksi, "SELECT * FROM Tbl_barangg");
                          while ($dataBarang = mysqli_fetch_array($queryBarang)) {
                            if($data['barang'] == $dataBarang['barang']) {
                            ?>
                            <option value="<?= $dataBarang['barang'] ?>" selected><?= $dataBarang['barang'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $dataBarang['barang'] ?>"><?= $dataBarang['barang'] ?></option>
                            <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="pegawai" class="form-label ps-1">Pegawai</label>
                        <select name="pegawai" id="pegawai" class="form-select" required>
                          <?php
                          $queryPegawai = mysqli_query($koneksi, "SELECT * FROM Tbl_pegawaiii");
                          while ($dataPegawai = mysqli_fetch_array($queryPegawai)) {
                            if($data['pegawai'] == $dataPegawai['nama']) {
                            ?>
                            <option value="<?= $dataPegawai['nama'] ?>" selected><?= $dataPegawai['nama'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $dataPegawai['nama'] ?>"><?= $dataPegawai['nama'] ?></option>
                            <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="keterangan" class="form-label ps-1">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-select" required>
                          <?php
                          $keterangan = ["Dipakai", "Tidak  Dipakai", "Diperbaiki"];
                          foreach ($keterangan as $ktr) {
                            if ($data['keterangan'] == $ktr) { ?>
                              <option value="<?= $ktr ?>" selected><?= $ktr ?></option>
                              <?php } else { ?>
                                <option value="<?= $ktr ?>"><?= $ktr ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                      <a href="barang.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Aset Pegawai
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"><center>Ruangan</center></th>
      <th scope="col"><center>Kondisi</center></th>
      <th scope="col"><center>Barang</center></th>
      <th scope="col"><center>Pegawai</center></th>
      <th scope="col"><center>Keterangan</center></th>
      <th scope="col"><center>Operasi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $data['ruangan'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['pegawai'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td align="center">
        <button type="button" class="btn btn-sm btn-warning rounded-0 col-10">Updating..</button>
      </td>
    </tr>
  </tbody>
</table>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </main>

<?php 

require_once "../template/footer.php";

?>