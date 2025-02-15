<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Pemeliharaan - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryAset = mysqli_query($koneksi, "SELECT * FROM tbl_aset WHERE id= $id");
$data = mysqli_fetch_array($queryAset);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Pemeliharaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../pelihara/pelihara.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Pemeliharaan
                    </div>
                    <div class="card-body">
                      <form action="prosespelihara.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="aset" class="form-label ps-1">Aset</label>
                        <input type="text" class="form-control" id="aset" name="aset" placeholder="nama aset" value="<?= $data['aset'] ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="kondisi" class="form-label ps-1">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                          <?php
                          $kondisi = ["Baik", "Kurang Baik"];
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
                        <label for="keterangan" class="form-label ps-1">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-select" required>
                          <?php
                          $keterangan = ["Rusak", "Hampir Rusak"];
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
                        <label for="pemeliharaan" class="form-label ps-1">Pemeliharaan</label>
                        <select name="pemeliharaan" id="pemeliharaan" class="form-select" required>
                          <?php
                          $pemeliharaan = ["Tidak Diperbaiki", "Diperbaiki"];
                          foreach ($pemeliharaan as $plh) {
                            if ($data['pemeliharaan'] == $plh) { ?>
                              <option value="<?= $plh ?>" selected><?= $plh ?></option>
                              <?php } else { ?>
                                <option value="<?= $plh ?>"><?= $plh ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                      <a href="pelihara.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Pemeliharaan
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"><center>Aset</center></th>
      <th scope="col"><center>Kondisi</center></th>
      <th scope="col"><center>Keterangan</center></th>
      <th scope="col"><center>Pemeliharaan</center></th>
      <th scope="col"><center>Operasi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $data['aset'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td><?= $data['pemeliharaan'] ?></td>
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