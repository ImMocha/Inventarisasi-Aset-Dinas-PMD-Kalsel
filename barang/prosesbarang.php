<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $barang = htmlspecialchars($_POST['barang']);
  $kategori = $_POST['kategori'];
  $pegawai = $_POST['pegawai'];
  
  $cekBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barangg WHERE barang = '$barang'");
  if (mysqli_num_rows($cekBarang) > 0) {
    header("location:barang.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_barangg VALUES (null, '$barang', '$kategori', '$pegawai')");

  header("location:barang.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $barang = htmlspecialchars($_POST['barang']);
  $kategori = $_POST['kategori'];
  $pegawai = $_POST['pegawai'];

  $queryBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barangg WHERE id = '$id'");
  $data = mysqli_fetch_array($queryBarang);
  $curBarang = $data['barang'];

  $cekBarang = mysqli_query($koneksi, "SELECT * FROM tbl_barangg WHERE barang = '$barang'");

  if ($barang !== $curBarang) {
    if (mysqli_num_rows($cekBarang) > 0) {
      header("location:barang.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_barangg SET
                          barang = '$barang',
                          kategori = '$kategori',
                          pegawai = '$pegawai'
                          WHERE id = $id
                          ");

header("location:barang.php?msg=updated");
return;
}

?>