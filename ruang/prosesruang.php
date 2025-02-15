<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $ruang = htmlspecialchars($_POST['ruang']);
  $barang = $_POST['barang'];
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];
  $fungsi = $_POST['fungsi'];
  
  $cekRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang WHERE ruang = '$ruang'");
  if (mysqli_num_rows($cekRuang) > 0) {
    header("location:ruang.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_ruang VALUES (null, '$ruang', '$barang', '$kondisi', '$keterangan', '$fungsi')");

  header("location:ruang.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $ruang = htmlspecialchars($_POST['ruang']);
  $barang = $_POST['barang'];
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];
  $fungsi = $_POST['fungsi'];

  $queryRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang WHERE id = '$id'");
  $data = mysqli_fetch_array($queryRuang);
  $curruang = $data['ruang'];

  $cekRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang WHERE ruang = '$ruang'");

  if ($ruang !== $curRuang) {
    if (mysqli_num_rows($cekRuang) > 0) {
      header("location:ruang.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_ruang SET
                          ruang = '$ruang',
                          barang = '$barang',
                          kondisi = '$kondisi',
                          keterangan = '$keterangan',
                          fungsi = '$fungsi'
                          WHERE id = $id
                          ");

header("location:ruang.php?msg=updated");
return;
}

?>