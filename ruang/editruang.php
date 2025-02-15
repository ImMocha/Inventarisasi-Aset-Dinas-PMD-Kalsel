<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Posisi Jabatan - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang WHERE id= $id");
$data = mysqli_fetch_array($queryRuang);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Ruangan Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../ruang/ruang.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Ruangan Barang
                    </div>
                    <div class="card-body">
                      <form action="prosesruang.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="ruang" class="form-label ps-1">Ruang</label>
                        <input type="text" class="form-control" id="ruang" name="ruang" placeholder="nama ruang" value="<?= $data['ruang'] ?>" required>
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
                        <label for="kondisi" class="form-label ps-1">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                          <?php
                          $queryKondisi = mysqli_query($koneksi, "SELECT * FROM Tbl_kondisiii");
                          while ($dataKondisi = mysqli_fetch_array($queryKondisi)) {
                            if($data['kondisi'] == $dataKondisi['kondisi']) {
                            ?>
                            <option value="<?= $dataKondisi['kondisi'] ?>" selected><?= $dataKondisi['kondisi'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $dataKondisi['kondisi'] ?>"><?= $dataKondisi['kondisi'] ?></option>
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
                          $keterangan = ["Digunakan", "Tidak  Digunakan", "Diperbaiki"];
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
                      <div class="mb-3">
                        <label for="fungsi" class="form-label ps-1">Fungsi</label>
                        <select name="fungsi" id="fungsi" class="form-select" required>
                          <?php
                          $fungsi = ["Berfungsi", "Tidak Berfungsi", "Diperbaiki"];
                          foreach ($fungsi as $fgs) {
                            if ($data['fungsi'] == $fgs) { ?>
                              <option value="<?= $fgs ?>" selected><?= $fgs ?></option>
                              <?php } else { ?>
                                <option value="<?= $fgs ?>"><?= $fgs ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                      <a href="ruang/ruang.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Ruangan Barang
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"><center>Ruang</center></th>
      <th scope="col"><center>Barang</center></th>
      <th scope="col"><center>Kondisi</center></th>
      <th scope="col"><center>Keterangan</center></th>
      <th scope="col"><center>Fungsi</center></th>
      <th scope="col"><center>Operasi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $data['ruang'] ?></td>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td><?= $data['fungsi'] ?></td>
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