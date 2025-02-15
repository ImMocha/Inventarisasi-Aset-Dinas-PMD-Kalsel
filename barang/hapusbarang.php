<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM tbl_barangg WHERE id = '$id'");

header("location:/pkl/barang/barang.php?msg=deleted");

?>