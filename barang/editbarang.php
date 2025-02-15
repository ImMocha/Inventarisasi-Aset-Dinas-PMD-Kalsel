<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Barang - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barangg WHERE id= $id");
$data = mysqli_fetch_array($queryBarang);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../barang/barang.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Barang
                    </div>
                    <div class="card-body">
                      <form action="prosesbarang.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="barang" class="form-label ps-1">Barang</label>
                        <input type="text" class="form-control" id="barang" name="barang" placeholder="nama barang" value="<?= $data['barang'] ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label ps-1">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                          <?php
                          $kategori = ["Peralatan Kantor", "Kendaraan Dinas", "Peralatan IT"];
                          foreach ($kategori as $ktg) {
                            if ($data['kategori'] == $ktg) { ?>
                              <option value="<?= $ktg ?>" selected><?= $ktg ?></option>
                              <?php } else { ?>
                                <option value="<?= $ktg ?>"><?= $ktg ?></option>
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
                      <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                      <a href="barang/barang.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
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
      <th scope="col"><center>Barang</center></th>
      <th scope="col"><center>Kategori</center></th>
      <th scope="col"><center>Pegawai</center></th>
      <th scope="col"><center>Operasi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
     ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['kategori'] ?></td>
      <td><?= $data['pegawai'] ?></td>
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