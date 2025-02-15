<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Nilai Pemakaian - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <div class="row">
                        <div class="col-7">
                        <h1 class="mt-4">Nilai Pemakaian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="../pemakaian/pemakaian.php">Pemakaian</a></li>
                            <li class="breadcrumb-item active">Nilai Pemakaian</li>
                        </ol>
                        </div>
                        <div class="col-5">
                          <div class="card mt-3 border-0">
                            <h5>Keterangan Pemakaian</h5>
                            <ul class="ps-3">
                              <li><small>Dari Awal Pemakaian</small></li>
                              <li><small>Hingga Akhir Pemakaian</small></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-4">
                        <div class="card">
                          <div class="card-header">
                          <i class="fa-solid fa-list"></i> Data Pegawai Yang Menggunakan Barang (Aset)
                          </div>
                          <div class="card-body">
                            <div class="input-group mb-2">
                              <span class="input-group-text"><i class="fa-solid fa-rotate fa-sm"></i></span>
                              <input type="text" name="noPemakaian" class="form-control bg-transparent" readonly>
                            </div>
                            <div class="input-group mb-2">
                              <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                              <select name="nip" id="nip" class="form-select" required>
                                <option value="">-- Pilih Pegawai --</option>
                                <?php 
                                $queryPegawai = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii");
                                while ($data = mysqli_fetch_array($queryPegawai)) { ?> 
                                <option value="<?= $data['nip'] ?>"><?= $data['nip'] . '-' . $data['nama'] ?></option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="input-group mb-2">
                              <span class="input-group-text"><i class="fa-solid fa-location-arrow fa-sm"></i></span>
                              <select name="kategori" id="kategori" class="form-select" required>
                                <option value="">-- Kategori --</option>
                                <option value="Atk">Atk</option>
                                <option value="Alat Transfortasi">Alat Transfortasi</option>
                                <option value="Peralatan">Peralatan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="card-body border mt-2 rounded">
                        <div class="input-group mb-2">
                              <span class="input-group-text col-2 ps-2 fw-bold">Sum</span>
                              <input type="text" name="sum" class="form-control" placeholder="Total Pemakaian" id="total_pemakaian" required>
                            </div>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="card">
                          <div class="card-header">
                            <i class="fa-solid fa-list"></i> Input Nilai Pemakaian
                            <button type="submit" name="simpan" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" name="reset" class="btn btn-sm btn-danger me-1 float-end"><i class="fa-solid fa-xmark"></i> Reset</button>
                          </div>
                          <div class="card-body">
                            <table class="table table-hover table-bordered">
                               <thead>
                                <tr>
                                  <th><center>No</center></th>
                                  <th scope="col"><center>Barang</center></th>
                                  <th scope="col"><center>Kategori</center></th>
                                  <th scope="col"><center>Nilai Kualitas</center></th>
                                </tr>
                               </thead>
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