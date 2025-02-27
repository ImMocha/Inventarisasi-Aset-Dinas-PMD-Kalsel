<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
  header("location:../authh/login.php");
  exit();
}

require_once "../config.php";
$title = "Data Pemakaian - Dinas PMD Kalsel";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pemakaian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Pemakaian</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Pemakaian
                            <a href="<?= $main_url ?>pemakaian/nilaipemakaian.php" class="btn btn-sm btn-primary float-end ms-1"><i class="fa-solid fa-plus"></i> Tambah Data Pemakaian</a>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col"><center>No Pemakaian</center></th>
                                    <th scope="col"><center>Tanggal Pemakaian</center></th>
                                    <th scope="col"><center>Nip</center></th>
                                    <th scope="col"><center>Kategori</center></th>
                                    <th scope="col"><center>Total Pemakaian</center></th>
                                    <th scope="col"><center>Lama Pemakaian</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php 

require_once "../template/footer.php";

?>