<?php
include "../../../koneksi.php";
require '../../../vendorexcel/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Inisialisasi objek Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Judul kolom
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Anggota');
$sheet->setCellValue('C1', 'Buku');
$sheet->setCellValue('D1', 'Tanggal Peminjaman');
$sheet->setCellValue('E1', 'Tanggal Pengembalian');
$sheet->setCellValue('F1', 'Status');
$sheet->setCellValue('G1', 'Denda');

// Data peserta
$sql = mysqli_query($koneksi, "SELECT *, user.nama AS nam, tbl_buku.judul AS jud
FROM tbl_peminjaman
INNER JOIN user ON user.id = tbl_peminjaman.id_user
INNER JOIN tbl_buku ON tbl_buku.id = tbl_peminjaman.id_buku
");
if (!$sql) {
    die('Query Error: ' . mysqli_error($koneksi));
}
$no = 0;
$row = 2;

while ($data = mysqli_fetch_assoc($sql)) {
    $no++;
    $sheet->setCellValue('A' . $row, $no);
    $sheet->setCellValue('B' . $row, $data['nam']);
    $sheet->setCellValue('C' . $row, $data['jud']);
    $sheet->setCellValue('D' . $row, $data['tanggal_peminjaman']);
    $sheet->setCellValue('E' . $row, $data['tanggal_pengembalian']);
    $sheet->setCellValue('F' . $row, $data['status']);
    $sheet->setCellValue('G' . $row, $data['denda']);

    $row++;
}

// Set lebar kolom otomatis
foreach (range('A', 'G') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

// Set nama file Excel
$excelFileName = 'daftar_peminjaman.xlsx';

// Mengatur header agar browser mengenali sebagai file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
header('Cache-Control: max-age=0');

// Simpan ke format Excel 2007 (xlsx)
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Hentikan eksekusi script
exit();
?>