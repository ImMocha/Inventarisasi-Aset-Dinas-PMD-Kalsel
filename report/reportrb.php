<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Hasil Aset Barang Dalam Suatu Ruangan</title>
</head>

<body>

<div style="text-align: center;">
  <h2 style="margin-bottom: -15px;">Laporan Hasil Aset Barang Dalam Suatu Ruangan</h2>
  <h2 style="margin-bottom: 15px;">Dinas PMD Kalsel</h2>
</div>

<table>
  <thead>
    <tr>
      <td colspan="7" style="height: 5px;">
        <hr style="margin-bottom: 2px; margin-left: -5px;", size="3" color="grey">
      </td>
    </tr>
    <tr>
      <th style="width: 200px;">No</th>
      <th style="width: 200px;">Ruang</th>
      <th style="width: 200px;">Barang</th>
      <th style="width: 200px;">Kondisi</th>
      <th style="width: 200px;">Keterangan</th>
      <th style="width: 200px;">Fungsi</th>
    </tr>
    <tr>
      <td colspan="7">
        <hr style="margin-bottom: 2px; margin-top: 1px; margin-left: -5px;", size="3" color="grey">
      </td>
    </tr>
  </thead>
  <tbody>
    <?php
    $dataRuang = mysqli_query($koneksi, "SELECT * FROM tbl_ruang");
    while ($data = mysqli_fetch_array($dataRuang)) { ?>
      <tr>
        <td align="center"><?= $data['id'] ?></td>
        <td align="center"><?= $data['ruang'] ?></td>
        <td align="center"><?= $data['barang'] ?></td>
        <td align="center"><?= $data['kondisi'] ?></td>
        <td align="center"><?= $data['keterangan'] ?></td>
        <td align="center"><?= $data['fungsi'] ?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="10">
        <hr style="margin-top: 1px; margin-bottom: 2px; margin-left: -5px", size="3", color="grey">
        <p>Banjarbaru, <?= date('j F Y') ?></p>
        <p>Dibuat Oleh, <b> Pegawai Dinas PMD Kalsel</b></p>
      </td>
    </tr>
  </tfoot>
</table>
 
<script type="text/javascript">
  window.print();
</script>

</body>

</html>
