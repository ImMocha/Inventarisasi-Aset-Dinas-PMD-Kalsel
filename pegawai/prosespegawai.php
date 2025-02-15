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
  $nip      = trim(htmlspecialchars($_POST['nip']));
  $nama      = trim(htmlspecialchars($_POST['nama']));
  $alamat     = trim(htmlspecialchars($_POST['alamat']));
  $telepon  = trim(htmlspecialchars($_POST['telepon']));
  $gambar    = trim(htmlspecialchars($_FILES['image']['name']));
  
  // cek nip
  $cekNip = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii WHERE nip = '$nip'");
  if (mysqli_num_rows($cekNip) > 0) {
      header("location:addpegawai.php?msg=cancel");
      return;
  }

  // upload gambar
  if ($gambar != null) {
    $url = 'addpegawai.php';
    $gambar = uploadimg($url);
  } else {
    $gambar = 'tt.jpeg';
  }

  mysqli_query($koneksi, "INSERT INTO tbl_pegawaii VALUES(null,'$nip','$nama','$alamat','$telepon','$gambar')");

  header("location:addpegawai.php?msg=added");
  return;
}

if (isset($_POST['update'])) {
  $id         = $_POST['id'];
  $nip      = trim(htmlspecialchars($_POST['nip']));
  $nama      = trim(htmlspecialchars($_POST['nama']));
  $alamat     = trim(htmlspecialchars($_POST['alamat']));
  $telepon  = trim(htmlspecialchars($_POST['telepon']));
  $gambar    = trim(htmlspecialchars($_POST['fotoLama']));

  $sqlPegawai = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii WHERE id= $id");
  $data = mysqli_fetch_array($sqlPegawai);
  $curNip = $data['nip'];

  $newNIP = mysqli_query($koneksi, "SELECT * FROM tbl_pegawaii WHERE nip= '$nip'");

  if ($nip !== $curNIP) {
     if (mysqli_num_rows($newNIP) > 0) {
      header("location:pegawai.php?msg=cancel");
      return;
     }
  }
  
  if ($_FILES['image']['error'] === 4) {
    $fotoPegawai = $foto;
  } else {
    $url = "pegawai.php";
    $fotoPegawai = uploadimg($url);
    if ($foto !== 'tt.jepeg') {
      @unlink('../asset/img/' .$foto);
    }
  }
  
  mysqli_query($koneksi, "UPDATE tbl_pegawaii SET
                          nip = '$nip',
                          nama = '$nama',
                          alamat = '$alamat',
                          telepon = '$telepon',
                          foto = '$fotoPegawai'
                          WHERE id = $id
                          ");

header("location:pegawai.php?msg=updated");
return;
}


?>