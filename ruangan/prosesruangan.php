<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $ruangan = htmlspecialchars($_POST['ruangan']);
  $kondisi = $_POST['kondisi'];
  $barang = $_POST['barang'];
  $pegawai = $_POST['pegawai'];
  $keterangan = $_POST['keterangan'];
  
  $cekRuangan = mysqli_query($koneksi, "SELECT * FROM tbl_pgwrn WHERE ruangan = '$ruangan'");
  if (mysqli_num_rows($cekRuangan) > 0) {
    header("location:ruangan.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_pgwrn VALUES (null, '$ruangan', '$kondisi', '$barang', '$pegawai', '$keterangan')");

  header("location:ruangan.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $ruangan = htmlspecialchars($_POST['ruangan']);
  $kondisi = $_POST['kondisi'];
  $barang = $_POST['barang'];
  $pegawai = $_POST['pegawai'];
  $keterangan = $_POST['keterangan'];

  $queryRuangan = mysqli_query($koneksi, "SELECT * FROM tbl_pgwrn WHERE id = '$id'");
  $data = mysqli_fetch_array($queryRuangan);
  $curRuangan = $data['ruangan'];

  $cekRuangan = mysqli_query($koneksi, "SELECT * FROM tbl_pgwrn WHERE ruangan = '$ruangan'");

  if ($ruangan !== $curRuangan) {
    if (mysqli_num_rows($cekRuangan) > 0) {
      header("location:ruangan.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_pgwrn SET
                          ruangan = '$ruangan',
                          kondisi = '$kondisi',
                          barang = '$barang',
                          pegawai = '$pegawai',
                          keterangan = '$keterangan'
                          WHERE id = $id
                          ");

header("location:ruangan.php?msg=updated");
return;
}

?>