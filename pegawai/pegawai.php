<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";
$title = "Pegawai - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = "";
}

$alert = '';
if ($msg == 'deleted') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Data pegawai berhasil dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Data pegawai berhasil diperbaharui
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'canceled') {
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-xmark"></i> Data pegawai gagal diperbaharui, NIP sudah ada
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pegawai</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Pegawai</li>
                        </ol>
                        <?php if($msg != ""){
                          echo $alert;
                        } ?>
                        <div class="card">
                          <div class="card-header">
                          <i class="fa-solid fa-list"></i> Data Pegawai
                          <a href="<?= $main_url ?>pegawai/addpegawai.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Pegawai</a>
                          </div>
                          <div class="card-body">
                          <table class="table table-hover" id="datatablesSimple">
                            <thead>
                              <tr>
                                <th scope="col"><center>No</center></th>
                                <th scope="col"><center>Foto</center></th>
                                <th scope="col"><center>NIP</center></th>
                                <th scope="col"><center>Nama</center></th>
                                <th scope="col"><center>Alamat</center></th>
                                <th scope="col"><center>Telepon</center></th>
                                <th scope="col"><center>Operasi</center></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 1;
                              $queryPegawai = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii");
                              while ($data = mysqli_fetch_array($queryPegawai)) {
                              ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td align="center"><img src="../asset/img/<?= $data['foto'] ?>" class="rounded-circle" width="60px" alt=""></td>
                                <td><?= $data['nip'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['telepon'] ?></td>
                                <td align="center">
                                  <a href="editpegawai.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update pegawai"><i class="fa-solid fa-pen"></i></a>
                                  <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="hapus pegawai" data-id="<?= $data['id'] ?>" data-foto="<?= $data['foto'] ?>"><i class="fa-solid fa-trash"></i></button>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
</table>
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
        <a href="" id="btnMdlhapus" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $(document).on('click', "#btnHapus", function(){
      $('#mdlHapus').modal('show');
      let idPegawai = $(this).data('id');
      let fotoPegawai = $(this).data('foto');
      $('#btnMdlHapus').attr("href", "hapuspegawai.php?id=" + idPegawai + "&foto=" + fotoPegawai);
    })
  })
</script>


<?php 

require_once "../template/footer.php";

?>