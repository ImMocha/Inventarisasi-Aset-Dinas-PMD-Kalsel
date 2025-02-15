-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 01:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id` int(11) NOT NULL,
  `aset` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `pemeliharaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aset`
--

INSERT INTO `tbl_aset` (`id`, `aset`, `kondisi`, `keterangan`, `pemeliharaan`) VALUES
(1, 'Kursi', 'Kurang Baik', 'Rusak', 'Tidak Diperbaiki'),
(2, 'Ac', 'Kurang Baik', 'Hampir Rusak', 'Diperbaiki'),
(4, 'Komputer', 'Kurang Baik', 'Hampir Rusak', 'Diperbaiki'),
(5, 'Lemari', 'Kurang Baik', 'Rusak', 'Tidak Diperbaiki'),
(6, 'Printer', 'Kurang Baik', 'Hampir Rusak', 'Diperbaiki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balangan`
--

CREATE TABLE `tbl_balangan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kerjasama` varchar(128) NOT NULL,
  `ksdesa` varchar(128) NOT NULL,
  `statuss` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_balangan`
--

INSERT INTO `tbl_balangan` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(1, 'Juai', 'Balangan', 'Satu Kecamatan', 'Pihak Ketiga', 'Aktif', 'Ada'),
(2, 'Tebing Tinggi', 'Balangan', 'Eks PNPM', 'Satu Kecamatan', 'Aktif', 'Ada'),
(3, 'Paringin Selatan', 'Balangan', 'Satu Kecamatan', 'Eks PNPM', 'Aktif', 'Ada'),
(4, 'Awayan', 'Balangan', 'Diluar Kecamatan', 'Satu Kecamatan', 'Aktif', 'Ada'),
(5, 'Lampihong', 'Balangan', 'Diluar Kecamatan', 'Tidak Ada KS', 'Aktif', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banjar`
--

CREATE TABLE `tbl_banjar` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `ksdesa` varchar(100) NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banjar`
--

INSERT INTO `tbl_banjar` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(1, 'Kertak Hanyar', 'Banjar', 'Diluar Kecamatan', 'Diluar Kecamatan', 'Tidak Aktif', 'Tidak Ada'),
(2, 'Astambul', 'Banjar', 'Satu Kecamatan', 'Pihak Ketiga', 'Aktif', 'Ada'),
(3, 'Gambut', 'Banjar', 'Diluar Kecamatan', 'Tidak Ada KS', 'Tidak Aktif', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangg`
--

CREATE TABLE `tbl_barangg` (
  `id` int(11) NOT NULL,
  `barang` varchar(128) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pegawai` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barangg`
--

INSERT INTO `tbl_barangg` (`id`, `barang`, `kategori`, `pegawai`) VALUES
(1, 'Kursi', 'Peralatan Kantor', 'Agus, S.E'),
(2, 'Printer', 'Peralatan IT', 'Agus, S.E'),
(4, 'Komputer', 'Peralatan IT', 'Wahyu, A.P'),
(5, 'Meja', 'Peralatan Kantor', 'Wahyu, A.P'),
(6, 'Lemari', 'Peralatan Kantor', 'Agus, S.E'),
(8, 'Mobil Dinas', 'Kendaraan Dinas', 'Wahyu, A.P'),
(9, 'Laptop', 'Peralatan IT', 'Dedy, S.T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batolaa`
--

CREATE TABLE `tbl_batolaa` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(120) NOT NULL,
  `kabupaten` varchar(120) NOT NULL,
  `kerjasama` varchar(120) NOT NULL,
  `ksdesa` varchar(120) NOT NULL,
  `statuss` varchar(120) NOT NULL,
  `keterangan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_batolaa`
--

INSERT INTO `tbl_batolaa` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(2, 'Bakumpai', 'Batola', 'Pihak Ketiga', 'Tidak Ada KS', '-', 'Ada'),
(3, 'Anjir Pasar', 'Batola', 'Diluar Kecamatan', 'Satu Kecamatan', 'Tidak Aktif', 'Tidak Ada'),
(4, 'Rantau Badauh', 'Batola', 'Eks PNPM', 'Tidak Ada KS', 'Tidak Aktif', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diinas`
--

CREATE TABLE `tbl_diinas` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diinas`
--

INSERT INTO `tbl_diinas` (`id`, `nama`, `alamat`, `email`, `visimisi`, `gambar`) VALUES
(1, 'Dinas PMD Kalimantan Selatan', 'Jl. Bangun Praja No 1 Komplek Perkantoran Pemprov Kalsel Kelurahan Cempaka Banjarbaru', 'dinaspmdkalsel@gmail.com', 'Kalsel Maju sebagai gerbang ibukota negara serta Memperkuat sarana prasarana dasar dan perekonomian', '11-bgLogin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatann`
--

CREATE TABLE `tbl_jabatann` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `barang` varchar(128) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatann`
--

INSERT INTO `tbl_jabatann` (`id`, `jabatan`, `jenis`, `kategori`, `barang`, `kondisi`, `keterangan`) VALUES
(1, 'Kepala Dinas', 'Toyota Avanza', 'Kendaraan Dinas', 'Mobil Dinas', 'Baik', 'Digunakan'),
(2, 'Sekretaris', 'Toyota Avanza', 'Kendaraan Dinas', 'Mobil Dinas', 'Baik', 'Digunakan'),
(5, 'Kepala Bidang', 'Toyota Avanza', 'Kendaraan Dinas', 'Mobil Dinas', 'Baik', 'Digunakan'),
(6, 'Kepala Seksi', 'Toyota Avanza', 'Kendaraan Dinas', 'Mobil Dinas', 'Baik', 'Digunakan'),
(8, 'Kepala Sub Bagian', 'Toyota Avanza', 'Kendaraan Dinas', 'Mobil Dinas', 'Baik', 'Digunakan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenkon`
--

CREATE TABLE `tbl_jenkon` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenkon`
--

INSERT INTO `tbl_jenkon` (`id`, `jenis`, `kondisi`, `barang`, `keterangan`) VALUES
(1, 'Epson', 'Baik', 'Printer', 'Ada'),
(4, 'Acer', 'Baik', 'Komputer', 'Ada'),
(5, 'Canon', 'Baik', 'Printer', 'Ada'),
(6, 'Lenovo', 'Baik', 'Laptop', 'Ada'),
(7, 'Asus', 'Baik', 'Komputer', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kab`
--

CREATE TABLE `tbl_kab` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kodekab` varchar(50) NOT NULL,
  `provinsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kab`
--

INSERT INTO `tbl_kab` (`id`, `nama`, `kodekab`, `provinsi`) VALUES
(5, 'Tanah Laut', '6301', 'Kalimantan Selatan'),
(6, 'Kotabaru', '6302', 'Kalimantan Selatan'),
(7, 'Banjar', '6303', 'Kalimantan Selatan'),
(8, 'Batola', '6304', 'Kalimantan Selatan'),
(9, 'Balangan', '6311', 'Kalimantan Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kec`
--

CREATE TABLE `tbl_kec` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kec`
--

INSERT INTO `tbl_kec` (`id`, `nama`, `kabupaten`, `provinsi`) VALUES
(1, 'Lampihong', 'Balangan', 'Kalimantan Selatan'),
(2, 'Gambut', 'Banjar', 'Kalimantan Selatan'),
(3, 'Bakumpai', 'Batola', 'Kalimantan Selatan'),
(4, 'Hampang', 'Kotabaru', 'Kalimantan Selatan'),
(5, 'Jorong', 'Tanah Laut', 'Kalimantan Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerma`
--

CREATE TABLE `tbl_kerma` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kerjasama` varchar(128) NOT NULL,
  `ksdesa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kerma`
--

INSERT INTO `tbl_kerma` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`) VALUES
(2, 'Paringin Selatan', 'Balangan', 'Satu Kecamatan', 'Eks PNPM'),
(3, 'Martapura', 'Banjar', 'Eks PNPM', 'Pihak Ketiga'),
(4, 'Pulau Laut Barat', 'Kotabaru', 'Diluar Kecamatan', 'Tidak Ada KS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kondisiii`
--

CREATE TABLE `tbl_kondisiii` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kondisiii`
--

INSERT INTO `tbl_kondisiii` (`id`, `jenis`, `kondisi`, `barang`) VALUES
(1, 'Toyota Avanza', 'Baik', 'Mobil Dinas'),
(2, 'Acer', 'Baik', 'Komputer'),
(3, 'Perabotan', 'Sangat Baik', 'Kursi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kotabaru`
--

CREATE TABLE `tbl_kotabaru` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `ksdesa` varchar(100) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kotabaru`
--

INSERT INTO `tbl_kotabaru` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(1, 'Hampang', 'Kotabaru', 'Satu Kecamatan', 'Tidak Ada KS', 'Aktif', 'Ada'),
(2, 'Pamukan Selatan', 'Kotabaru', 'Diluar Kecamatan', 'Satu Kecamatan', 'Aktif', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawaii`
--

CREATE TABLE `tbl_pegawaii` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawaii`
--

INSERT INTO `tbl_pegawaii` (`id`, `nip`, `nama`, `alamat`, `telepon`, `foto`) VALUES
(4, '1975121001202510001', 'Kinantara SE', 'Banjarbaru', '085854261425', '16-bgLogin.jpeg'),
(5, '19981210202411010001', 'Taniara ST', 'Banjarmasin Utara', '081542355678', '39-bgLogin.jpeg'),
(6, '19830104200320021001', 'Shalih Spdi', 'Banjarmasin', '074756621426', '20-bgLogin.jpeg'),
(7, '198512092025241001', 'Abu A S.kom', 'Martapura', '085745635173', '13-bgLogin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawaiii`
--

CREATE TABLE `tbl_pegawaiii` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawaiii`
--

INSERT INTO `tbl_pegawaiii` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Wahyu, A.P', 'Banjarbaru', '087933425610'),
(2, 'Agus, S.E', 'Banjarbaru', '0829105987580'),
(3, 'Dedy, S.T', 'Banjarmasin', '081456449492'),
(7, 'Nurul Yanti', 'Martapura', '085836621472'),
(8, 'Nor Laila, S.E', 'Cempaka, Banjarbaru', '086854264128');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgwrn`
--

CREATE TABLE `tbl_pgwrn` (
  `id` int(11) NOT NULL,
  `ruangan` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `pegawai` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pgwrn`
--

INSERT INTO `tbl_pgwrn` (`id`, `ruangan`, `kondisi`, `barang`, `pegawai`, `keterangan`) VALUES
(1, 'Ruang Kabid', 'Baik', 'Lemari', 'Wahyu, A.P', 'Dipakai'),
(3, 'Ruang Sekretariat', 'Baik', 'Meja', 'Agus, S.E', 'Dipakai'),
(5, 'Ruang Tata Usaha', 'Baik', 'Komputer', 'Dedy, S.T', 'Dipakai'),
(6, 'Ruang Kasi', 'Baik', 'Komputer', 'Nor Laila, S.E', 'Dipakai'),
(7, 'Ruang Rapat', 'Kurang Baik', 'Kursi', 'Nurul Yanti', 'Dipakai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id` int(11) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `fungsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id`, `ruang`, `barang`, `kondisi`, `keterangan`, `fungsi`) VALUES
(2, 'Ruang Kadis', 'Komputer', 'Baik', 'Digunakan', 'Berfungsi'),
(3, 'Ruang Kabid', 'Komputer', 'Baik', 'Digunakan', 'Berfungsi'),
(6, 'Ruang Seksi', 'Komputer', 'Baik', 'Digunakan', 'Berfungsi'),
(7, 'Ruang Tata Usaha', 'Printer', 'Baik', 'Digunakan', 'Berfungsi'),
(8, 'Ruang Sekretariat', 'Lemari', 'Baik', 'Digunakan', 'Berfungsi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanahlaut`
--

CREATE TABLE `tbl_tanahlaut` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kerjasama` varchar(50) NOT NULL,
  `ksdesa` varchar(50) NOT NULL,
  `statuss` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tanahlaut`
--

INSERT INTO `tbl_tanahlaut` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(1, 'Takisung', 'Tanah Laut', 'Eks PNPM', 'Tidak Ada KS', 'Aktif', 'Ada'),
(2, 'Tambang Ulang', 'Tanah Laut', 'Diluar Kecamatan', 'Satu Kecamatan', 'Aktif', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tapin`
--

CREATE TABLE `tbl_tapin` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `ksdesa` varchar(100) NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tapin`
--

INSERT INTO `tbl_tapin` (`id`, `kecamatan`, `kabupaten`, `kerjasama`, `ksdesa`, `statuss`, `keterangan`) VALUES
(3, 'Salam Babaris', 'Tapin', 'Diluar  Kecamatan', 'Pihak Ketiga', 'Aktif', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useer`
--

CREATE TABLE `tbl_useer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_useer`
--

INSERT INTO `tbl_useer` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(1, 'admin', '$2y$10$mwzno1.dDtPubvFYmY9kkOleuM9QwmiKhBuYnknXO/romtVgvpF4u', 'Iva SH', 'Banjarmasin', 'Kasi', '504-ft.jpeg'),
(2, 'user', '$2y$10$QCRM.ArT7aRai/EuQH5/JO6ZKD7RhyFjc2x.iwl7TExePv054AKZm', 'Aza Ap', 'Banjarbaru', 'Staf', '884-oo.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_balangan`
--
ALTER TABLE `tbl_balangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banjar`
--
ALTER TABLE `tbl_banjar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barangg`
--
ALTER TABLE `tbl_barangg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_batolaa`
--
ALTER TABLE `tbl_batolaa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diinas`
--
ALTER TABLE `tbl_diinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatann`
--
ALTER TABLE `tbl_jabatann`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenkon`
--
ALTER TABLE `tbl_jenkon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kab`
--
ALTER TABLE `tbl_kab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kerma`
--
ALTER TABLE `tbl_kerma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kondisiii`
--
ALTER TABLE `tbl_kondisiii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kotabaru`
--
ALTER TABLE `tbl_kotabaru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawaii`
--
ALTER TABLE `tbl_pegawaii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawaiii`
--
ALTER TABLE `tbl_pegawaiii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pgwrn`
--
ALTER TABLE `tbl_pgwrn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tanahlaut`
--
ALTER TABLE `tbl_tanahlaut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tapin`
--
ALTER TABLE `tbl_tapin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useer`
--
ALTER TABLE `tbl_useer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_balangan`
--
ALTER TABLE `tbl_balangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_banjar`
--
ALTER TABLE `tbl_banjar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_barangg`
--
ALTER TABLE `tbl_barangg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_batolaa`
--
ALTER TABLE `tbl_batolaa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_diinas`
--
ALTER TABLE `tbl_diinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jabatann`
--
ALTER TABLE `tbl_jabatann`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jenkon`
--
ALTER TABLE `tbl_jenkon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kab`
--
ALTER TABLE `tbl_kab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kerma`
--
ALTER TABLE `tbl_kerma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kondisiii`
--
ALTER TABLE `tbl_kondisiii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kotabaru`
--
ALTER TABLE `tbl_kotabaru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pegawaii`
--
ALTER TABLE `tbl_pegawaii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pegawaiii`
--
ALTER TABLE `tbl_pegawaiii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pgwrn`
--
ALTER TABLE `tbl_pgwrn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tanahlaut`
--
ALTER TABLE `tbl_tanahlaut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tapin`
--
ALTER TABLE `tbl_tapin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_useer`
--
ALTER TABLE `tbl_useer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
