<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
  $jabatan = htmlspecialchars($_POST['jabatan']);
  $jenis = $_POST['jenis'];
  $kategori = $_POST['kategori'];
  $barang = $_POST['barang'];
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];
  
  $cekJabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatann WHERE jabatan = '$jabatan'");
  if (mysqli_num_rows($cekJabatan) > 0) {
    header("location:jabatan.php?msg=cancel");
    return;
  }

  mysqli_query($koneksi, "INSERT INTO tbl_jabatann VALUES (null, '$jabatan', '$jenis', '$kategori', '$barang', '$kondisi', '$keterangan')");

  header("location:jabatan.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $jabatan = htmlspecialchars($_POST['jabatan']);
  $jenis = $_POST['jenis'];
  $kategori = $_POST['kategori'];
  $barang = $_POST['barang'];
  $kondisi = $_POST['kondisi'];
  $keterangan = $_POST['keterangan'];

  $queryJabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatann WHERE id = '$id'");
  $data = mysqli_fetch_array($queryJabatan);
  $curJabatan = $data['jabatan'];

  $cekJabatan = mysqli_query($koneksi, "SELECT * FROM tbl_jabatann WHERE jabatan = '$jabatan'");

  if ($jabatan !== $curJabatan) {
    if (mysqli_num_rows($cekJabatan) > 0) {
      header("location:jabatan.php?msgcancelupdate");
      return;
    }
  }

  mysqli_query($koneksi, "UPDATE tbl_jabatann SET
                          jabatan = '$jabatan',
                          jenis = '$jenis',
                          kategori = '$kategori',
                          barang = '$barang',
                          kondisi = '$kondisi',
                          keterangan = '$keterangan'
                          WHERE id = $id
                          ");

header("location:jabatan.php?msg=updated");
return;
}

?>