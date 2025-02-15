<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  // ambil value elemen yang diposting
  $nama      = trim(htmlspecialchars($_POST['nama']));
  $alamat     = trim(htmlspecialchars($_POST['alamat']));
  $telepon  = trim(htmlspecialchars($_POST['telepon']));
  
  // cek nama
  $cekNama = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaiii WHERE nama = '$nama'");
  if (mysqli_num_rows($cekNama) > 0) {
      header("location:addpegawaiii.php?msg=cancel");
      return;
  }


  mysqli_query($koneksi, "INSERT INTO tbl_pegawaiii VALUES(null, '$nama','$alamat','$telepon')");

  header("location:addpegawaiii.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id         = $_POST['id'];
  $nama      = trim(htmlspecialchars($_POST['nama']));
  $alamat     = trim(htmlspecialchars($_POST['alamat']));
  $telepon  = trim(htmlspecialchars($_POST['telepon']));

  $sqlPegawai = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaiii WHERE id= $id");
  $data = mysqli_fetch_array($sqlPegawai);
  $curNama = $data['nama'];

  $newNama = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaiii WHERE nama= '$nama'");

  if ($nama !== $curNama) {
     if (mysqli_num_rows($newNama) > 0) {
      header("location:pegawaiii.php?msg=cancel");
      return;
     }
  }
  
  mysqli_query($koneksi, "UPDATE tbl_pegawaiii SET
                          nama = '$nama',
                          alamat = '$alamat',
                          telepon = '$telepon',
                          WHERE id = $id
                          ");

header("location:pegawaiii.php?msg=updated");
return;
}


?>