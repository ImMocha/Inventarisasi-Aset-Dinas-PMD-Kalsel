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

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = "";
}

$alert = '';
if ($msg == 'cancel') {
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-xmark"></i> Tambah Barang Gagal, Barang Sudah Ada
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'added') {
  $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" id="added" role="alert">
  <i class="fa-solid fa-circle-check"></i> Tambah Barang Berhasil  
</div>';
}
if ($msg == 'deleted') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Barang Berhasil Dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'cancelupdate') {
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-xmark"></i> Update Barang Gagal, Barang Sudah Ada
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible" style="display: none;" role="alert" id="updated">
  <i class="fa-solid fa-circle-check"></i> Barang Berhasil DiPerbaharui
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Jenis Kondisi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Jenis Kondisi</li>
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
                    <i class="fa-solid fa-plus"></i> Tambah Jenis Kondisi
                    </div>
                    <div class="card-body">
                      <form action="prosesjenis.php" method="POST">
                      <div class="mb-3">
                        <label for="jenis" class="form-label ps-1">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="nama jenis" required>
                      </div>
                      <div class="mb-3">
                        <label for="kondisi" class="form-label ps-1">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                          <option value="" selected>-- Pilih Kondisi --</option>
                          <option value="sangat baik">Sangat Baik</option>
                          <option value="baik">Baik</option>
                          <option value="kurang baik">Kurang Baik</option>
                        </select>
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
                        <label for="keterangan" class="form-label ps-1">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-select" required>
                          <option value="" selected>-- Pilih Keterangan --</option>
                          <option value="Ada">Ada</option>
                          <option value="Tidak Ada">Tidak Ada</option>
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
                            <i class="fa-solid fa-list"></i> Data Jenis Kondisi
                            <div class="dropdown" style="margin-top: -30px;">
                              <button class="btn btn-sm btn-primary dropdown-toggle float-end" type="button" data-bs-toggle="dropdown">Cetak</button>
                              <ul class="dropdown-menu">
                                <li><button type="button" onclick="printDoc()" class="dropdown-item"><i class="fa-solid fa-print"></i> Print Data Kondisi</button></li>
                                <li><a href="<?= $main_url ?>jenis/cetakpdf.php" class="dropdown-item" target="_blank">
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
    $queryJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon");
    while ($data = mysqli_fetch_array($queryJenis)) { ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $data['jenis'] ?></td>
      <td><?= $data['kondisi'] ?></td>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td align="center">
        <a href="editjenis.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update jenis"><i class="fa-solid fa-pen"></i></a>
        <button type="button" data-id="<?= $data['id'] ?>" id="btnHapus" class="btn btn-sm btn-danger" title="hapus jenis"><i class="fa-solid fa-trash"></i></button>
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
                    const myWindow = window.open("../report/reportk.php", "", "width=900,height=600,left=100");
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
                      $('#btnMdlHapus').attr('href', "hapusjenis.php?id=" + id);
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