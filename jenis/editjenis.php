<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Jenis - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon WHERE id= $id");
$data = mysqli_fetch_array($queryJenis);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Jenis Kondisi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../jenis/jenis.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Jenis Kondisi
                    </div>
                    <div class="card-body">
                      <form action="prosesjenis.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="jenis" class="form-label ps-1">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="nama jenis" value="<?= $data['jenis'] ?>" required>
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
                        <label for="keterangan" class="form-label ps-1">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-select" required>
                          <?php
                          $keterangan = ["Ada", "Tidak Ada"];
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
                      <a href="jenis.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Barang
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"><center>Jenis</center></th>
      <th scope="col"><center>Kondisi</center></th>
      <th scope="col"><center>Barang</center></th>
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
      <td><?= $data['jenis'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['barang'] ?></td>
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