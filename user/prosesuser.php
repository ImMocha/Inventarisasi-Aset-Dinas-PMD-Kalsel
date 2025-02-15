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
  $username  = trim(htmlspecialchars($_POST['username']));
  $nama      = trim(htmlspecialchars($_POST['nama']));
  $jabatan   = $_POST['jabatan'];
  $alamat    = trim(htmlspecialchars($_POST['alamat']));
  $gambar    = trim(htmlspecialchars($_FILES['image']['name']));
  $password  = 1234;
  $pass      = password_hash($password, PASSWORD_DEFAULT);

  // cek username
  $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_useer WHERE username = '$username'");
  if (mysqli_num_rows($cekUsername) > 0) {
      header("location:adduser.php?msg=cancel");
      return;
  }

  // upload gambar
  if ($gambar != null) {
    $url = 'adduser.php';
    $gambar = uploadimg($url);
  } else {
    $gambar = 'tt.jpeg';
  }

  mysqli_query($koneksi, "INSERT INTO tbl_useer VALUES(null,'$username','$pass','$nama','$alamat','$jabatan','$gambar')");

  header("location:adduser.php?msg=added");
  return;
}


?>