<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $jenis = htmlspecialchars($_POST['jenis']);
  $kondisi = $_POST['kondisi'];
  $barang = $_POST['barang'];
  $keterangan = $_POST['keterangan'];
  
  $cekJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon WHERE jenis = '$jenis'");
  if (mysqli_num_rows($cekJenis) > 0) {
    header("location:jenis.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_jenkon VALUES (null, '$jenis', '$kondisi', '$barang', '$keterangan')");

  header("location:jenis.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $jenis = htmlspecialchars($_POST['jenis']);
  $kondisi = $_POST['kondisi'];
  $barang = $_POST['barang'];
  $keterangan = $_POST['keterangan'];

  $queryJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon WHERE id = '$id'");
  $data = mysqli_fetch_array($queryJenis);
  $curJenis = $data['jenis'];

  $cekJenis = mysqli_query($koneksi, "SELECT * FROM tbl_jenkon WHERE jenis = '$jenis'");

  if ($jenis !== $curJenis) {
    if (mysqli_num_rows($cekJenis) > 0) {
      header("location:jenis.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_jenkon SET
                          jenis = '$jenis',
                          kondisi = '$kondisi',
                          barang = '$barang',
                          keterangan = '$keterangan'
                          WHERE id = $id
                          ");

header("location:jenis.php?msg=updated");
return;
}

?>