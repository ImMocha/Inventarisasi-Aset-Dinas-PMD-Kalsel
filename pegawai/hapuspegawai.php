<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit;
}

require_once "../config.php";
$id = $_GET["id"];
$foto = $_GET["foto"];


mysqli_query($koneksi, "DELETE * FROM tbl_pegawaii WHERE id = '$id'");
if ($foto != 'tt.jpeg') {
  unlink("../asset/img/" . $foto);
}

header("location:pegawai.php?msg=deleted");

?>