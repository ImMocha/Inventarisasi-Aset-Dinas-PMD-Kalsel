<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  // ambil value yang diposting
  $id         = $_POST['id'];
  $nama       = trim(htmlspecialchars($_POST['nama']));
  $email      = trim(htmlspecialchars($_POST['email']));
  $alamat     = trim(htmlspecialchars($_POST['alamat']));
  $visimisi   = trim(htmlspecialchars($_POST['visimisi']));
  $gbr        = trim(htmlspecialchars($_POST['gbrLama']));

  // cek apakah gambar user
  if ($_FILES['image']['error'] === 4) {
      $gbrDinas = $gbr;
  } else {
    $url = 'profiledinas.php';
    $gbrDinas = uploadimg($url);
    @unlink('../asset/img/' . $gbr);
  }

  // update data
  mysqli_query($koneksi, "UPDATE tbl_diinas SET
                          nama = '$nama',
                          email = '$email',
                          alamat = '$alamat',
                          visimisi = '$visimisi',
                          gambar = '$gbrDinas'
                          WHERE id = $id
                          ");
  header("location:profiledinas.php?msg=updated");
  return;
}

?>