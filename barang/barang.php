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
                        <h1 class="mt-4">Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Barang</li>
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
                    <i class="fa-solid fa-plus"></i> Tambah Barang
                    </div>
                    <div class="card-body">
                      <form action="prosesbarang.php" method="POST">
                      <div class="mb-3">
                        <label for="barang" class="form-label ps-1">Barang</label>
                        <input type="text" class="form-control" id="barang" name="barang" placeholder="nama barang" required>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label ps-1">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                          <option value="" selected>-- Pilih Kategori --</option>
                          <option value="Peralatan Kantor">Peralatan kantor</option>
                          <option value="Kendaraan Dinas">Kendaraan Dinas</option>
                          <option value="Peralatan IT">Peralatan IT</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="pegawai" class="form-label ps-1">Pegawai</label>
                        <select name="pegawai" id="pegawai" class="form-select" required>
                          <option value="" selected>-- Pilih Pegawai --</option>
                          <?php
                          $queryPegawai = mysqli_query($koneksi, "SELECT * FROM Tbl_pegawaiii");
                          while ($dataPegawai = mysqli_fetch_array($queryPegawai)) { ?>
                            <option value="<?= $dataPegawai['nama'] ?>"><?= $dataPegawai['nama'] ?></option>
                            <?php
                          }
                          ?>
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
                            <i class="fa-solid fa-list"></i> Data Barang
                            </div>
                            <div class="card-body">
                            <table class="table table-hover"id="datatablesSimple">
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
    $queryBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barangg");
    while ($data = mysqli_fetch_array($queryBarang)) { ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $data['barang'] ?></td>
      <td><?= $data['kategori'] ?></td>
      <td><?= $data['pegawai'] ?></td>
      <td align="center">
        <a href="editbarang.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update barang"><i class="fa-solid fa-pen"></i></a>
        <button type="button" data-id="<?= $data['id'] ?>" id="btnHapus" class="btn btn-sm btn-danger" title="hapus barang"><i class="fa-solid fa-trash"></i></button>
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
                      $('#btnMdlHapus').attr('href', "hapusbarang.php?id=" + id);
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