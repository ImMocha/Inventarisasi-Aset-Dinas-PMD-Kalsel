<?php
require('../fpdf186/fpdf.php');
require_once "../config.php";

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        // $this->Image('../assets/img/kalsel.png', 10, 8, 25);
        // Font Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(30);
        // Title
        $this->Cell(140, 8, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', 0, 1, 'C');
        $this->Cell(200, 8, 'PROVINSI KALIMANTAN SELATAN', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(200, 8, 'DATA RUANGAN BARANG', 0, 1, 'C');

        // Tambahkan tanggal cetak
        $this->SetFont('Arial', '', 10);
        $this->Cell(200, 8, 'Tanggal Cetak: ' . date('d-m-Y'), 0, 1, 'C');

        $this->Ln(5);
        $this->SetLineWidth(1);
        $this->Line(10, 35, 200, 35);
        $this->SetLineWidth(0);
        $this->Line(10, 36, 200, 36);
        $this->Ln(10);
    }

    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

// Heading tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(35, 10, 'Ruang', 1, 0, 'C');
$pdf->Cell(35, 10, 'Barang', 1, 0, 'C');
$pdf->Cell(30, 10, 'Kondisi', 1, 0, 'C');
$pdf->Cell(40, 10, 'Keterangan', 1, 0, 'C');
$pdf->Cell(40, 10, 'Fungsi', 1, 1, 'C');

// Isi tabel
$pdf->SetFont('Arial', '', 9);
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_ruang ORDER BY ruang ASC");
while ($data = mysqli_fetch_array($query)) {
    // Cek jika perlu halaman baru
    if ($pdf->GetY() > 250) {
        $pdf->AddPage();
        // Ulangi header tabel di halaman baru
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Ruang', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Barang', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Kondisi', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Keterangan', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Fungsi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
    }

    $pdf->Cell(10, 10, $no, 1, 0, 'C');
    $pdf->Cell(35, 10, $data['ruang'], 1, 0, 'L');
    $pdf->Cell(35, 10, $data['barang'], 1, 0, 'L');
    $pdf->Cell(30, 10, $data['kondisi'], 1, 0, 'L');
    $pdf->Cell(40, 10, $data['keterangan'], 1, 0, 'L');
    $pdf->Cell(40, 10, $data['fungsi'], 1, 1, 'L');
    $no++;
}

$pdf->Output('I', 'Daftar_Ruangan_Barang.pdf');
?>