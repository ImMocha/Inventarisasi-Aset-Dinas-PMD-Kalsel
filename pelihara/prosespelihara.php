<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $aset = htmlspecialchars($_POST['aset']);
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];
  $pemeliharaan = $_POST['pemeliharaan'];

  $cekAset = mysqli_query($koneksi, "SELECT * FROM tbl_aset WHERE aset = '$aset'");
  if (mysqli_num_rows($cekAset) > 0) {
    header("location:pelihara.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_aset VALUES (null, '$aset', '$kondisi', '$keterangan','$pemeliharaan')");

  header("location:pelihara.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $aset = htmlspecialchars($_POST['aset']);
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];
  $pemeliharaan = $_POST['pemeliharaan'];

  $queryAset = mysqli_query($koneksi, "SELECT * FROM tbl_aset WHERE id = '$id'");
  $data = mysqli_fetch_array($queryAset);
  $curAset = $data['aset'];

  $cekAset = mysqli_query($koneksi, "SELECT * FROM tbl_aset WHERE aset = '$aset'");

  if ($aset !== $curAset) {
    if (mysqli_num_rows($cekAset) > 0) {
      header("location:pelihara.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_aset SET
                          aset = '$aset',
                          kondisi = '$kondisi',
                          keterangan = '$keterangan',
                          pemeliharaan = '$pemeliharaan'
                          WHERE id = $id
                          ");

header("location:pelihara.php?msg=updated");
return;
}

?>