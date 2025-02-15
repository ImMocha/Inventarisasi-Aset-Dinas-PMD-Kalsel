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

$queryJabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatann WHERE id= $id");
$data = mysqli_fetch_array($queryJabatan);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Posisi Jabatan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../jabatan/jabatan.php">Back</a></li>
                        </ol>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-pen"></i> Edit Posisi Jabatan
                    </div>
                    <div class="card-body">
                      <form action="prosesjabatan.php" method="POST">
                        <input type="number" name="id" value="<?= $data['id'] ?>" hidden>
                      <div class="mb-3">
                        <label for="jabatan" class="form-label ps-1">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="nama jabatan" value="<?= $data['jabatan'] ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="jenis" class="form-label ps-1">Jenis</label>
                        <select name="jenis" id="jenis" class="form-select" required>
                          <?php
                          $queryJenis = mysqli_query($koneksi, "SELECT * FROM Tbl_kondisiii");
                          while ($dataJenis = mysqli_fetch_array($queryJenis)) {
                            if($data['jenis'] == $dataJenis['jenis']) {
                            ?>
                            <option value="<?= $dataJenis['jenis'] ?>" selected><?= $dataJenis['jenis'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $dataJenis['jenis'] ?>"><?= $dataJenis['jenis'] ?></option>
                            <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label ps-1">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                          <?php
                          $queryKategori = mysqli_query($koneksi, "SELECT * FROM Tbl_barangg");
                          while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                            if($data['kategori'] == $dataKategori['kategori']) {
                            ?>
                            <option value="<?= $dataKategori['kategori'] ?>" selected><?= $dataKategori['kategori'] ?></option>
                            <?php } else { ?>
                            <option value="<?= $dataKategori['kategori'] ?>"><?= $dataKategori['kategori'] ?></option>
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
                      <button type="submit" class="btn btn-primary" name="update"><i class="fa-solid fa-pen"></i> Update</button>
                      <a href="jabatan/jabatan.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</a>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Posisi Jabatan
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"><center>Jabatan</center></th>
      <th scope="col"><center>Jenis</center></th>
      <th scope="col"><center>Kategori</center></th>
      <th scope="col"><center>Barang</center></th>
      <th scope="col"><center>Kondisi</center></th>
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
      <td><?= $data['jabatan'] ?></td>
      <td><?= $data['jenis'] ?></td>
      <td><?= $data['kategori'] ?></td>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['kondisi'] ?></td>
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