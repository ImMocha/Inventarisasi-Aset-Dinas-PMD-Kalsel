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

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = "";
}

$alert = '';
if ($msg == 'cancel') {
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-xmark"></i> Tambah Posisi Jabatan Gagal Karena Sudah Ada
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'added') {
  $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" id="added" role="alert">
  <i class="fa-solid fa-circle-check"></i> Tambah Ruangan Barang Berhasil  
</div>';
}
if ($msg == 'deleted') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Posisi Jabatan Berhasil Dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'cancelupdate') {
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-xmark"></i> Update Posisi Jabatan Gagal Karena Sudah Ada
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" role="alert" id="updated">
  <i class="fa-solid fa-circle-check"></i> Posisi Jabatan Berhasil DiPerbaharui
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ruangan Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Ruangan Barang</li>
                        </ol>
                        <?php
                        if ($msg !== '') {
                          echo $alert;
                        }
                        ?>
                        <div class="row">
                          <div class="col-4">
                          <div class="card">
                    <div class="card-header">
                    <i class="fa-solid fa-plus"></i> Tambah Ruangan Barang
                    </div>
                    <div class="card-body">
                      <form action="prosesruang.php" method="POST">
                      <div class="mb-3">
                        <label for="ruang" class="form-label ps-1">Ruang</label>
                        <input type="text" class="form-control" id="" name="ruang" placeholder="nama ruang" required>
                      </div>
                      <div class="mb-3">
                        <label for="barang" class="form-label ps-1">Barang</label>
                        <select name="barang" id="barang" class="form-select" required>
                          <option value="" selected>-- Pilih Barang --</option>
                          <?php
                          $queryBarang = mysqli_query($koneksi, "SELECT * FROM Tbl_barangg");
                          while ($dataBarang = mysqli_fetch_array($queryBarang)) { ?>
                            <option value="<?= $dataBarang['barang'] ?>"><?= $dataBarang['barang'] ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="kondisi" class="form-label ps-1">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                          <option value="" selected>-- Pilih Kondisi --</option>
                          <?php
                          $queryKondisi = mysqli_query($koneksi, "SELECT * FROM Tbl_kondisiii");
                          while ($dataKondisi = mysqli_fetch_array($queryKondisi)) { ?>
                            <option value="<?= $dataKondisi['kondisi'] ?>"><?= $dataKondisi['kondisi'] ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="keterangan" class="form-label ps-1">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-select" required>
                          <option value="" selected>-- Pilih Keterangan --</option>
                          <option value="Digunakan">Digunakan</option>
                          <option value="Tidak Digunakan">Tidak Digunakan</option>
                          <option value="Diperbaiki">Diperbaiki</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="fungsi" class="form-label ps-1">Fungsi</label>
                        <select name="fungsi" id="fungsi" class="form-select" required>
                          <option value="" selected>-- Pilih Fungsi --</option>
                          <option value="Berfungsi">Berfungsi</option>
                          <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                          <option value="Diperbaiki">Diperbaiki</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="simpan"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                      <button type="reset" class="btn btn-danger" name="reset"><i class="fa-solid fa-xmark"></i> Batal</button>
                      </form>
                    </div>
                    </div>
                          </div>
                          <div class="col-8">
                            <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Ruangan Barang
                            <div class="dropdown" style="margin-top: -30px;">
                              <button class="btn btn-sm btn-primary dropdown-toggle float-end" type="button" data-bs-toggle="dropdown">Cetak</button>
                              <ul class="dropdown-menu">
                                <li><button type="button" onclick="printDoc()" class="dropdown-item">
                                    <i class="fa-solid fa-print"></i> Print Data Ruangan Barang
                                </button></li>
                                <li><a href="<?= $main_url ?>ruang/cetakpdf.php" class="dropdown-item" target="_blank">
                                    <i class="fa-solid fa-file-pdf"></i> Download PDF
                                </a></li>
                              </ul>
                            </div>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover" id="datatablesSimple">
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
    $queryRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang");
    while ($data = mysqli_fetch_array($queryRuang)) { ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $data['ruang'] ?></td>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td><?= $data['fungsi'] ?></td>
      <td align="center">
        <a href="editruang.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update ruang"><i class="fa-solid fa-pen"></i></a>
        <button type="button" data-id="<?= $data['id'] ?>" id="btnHapus" class="btn btn-sm btn-danger" title="hapus ruang"><i class="fa-solid fa-trash"></i></button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </main>

                <script>
                  function printDoc(){
                    const myWindow = window.open("../report/reportrb.php", "", "width=900,height=600,left=100");
                  }
                </script>

                <!-- modal hapus data -->
<div class="modal" id="mdlHapus" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="" id="btnMdlHapus" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

                <script>
                  $(document).ready(function() {
                    $(document).on('click', "#btnHapus", function(){
                      $('#mdlHapus').modal('show');
                      let id = $(this).data('id');
                      $('#btnMdlHapus').attr('href', "hapusruang.php?id=" + id);
                    })

                    setTimeout(function(){
                      $('#added').fadeIn('slow');
                    },300)
                    setTimeout(function(){
                      $('#added').fadeOut('slow');
                    }, 3000)

                    setTimeout(function(){
                      $('#updated').slideDown('700');
                    },300)
                    setTimeout(function(){
                      $('#updated').slideUp('700');
                    },5000)
                  })

                </script>

<?php 

require_once "../template/footer.php";

?>