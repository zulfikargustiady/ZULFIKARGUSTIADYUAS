<?php
include '../../../koneksi.php';

$id_peminjaman = $_POST['id_peminjaman'];

// Mengambil informasi peminjaman
$query_info = "SELECT * FROM tbl_peminjaman WHERE id_peminjaman='$id_peminjaman'";
$result_info = mysqli_query($koneksi, $query_info);
$row_info = mysqli_fetch_assoc($result_info);

$tgl_pengembalian_seharusnya = $row_info['tanggal_pengembalian'];
$status = 'Selesai';

// Hitung denda jika terlambat
$denda = 0;
$tanggal_sekarang = date('Y-m-d');
if ($tanggal_sekarang > $tgl_pengembalian_seharusnya) {
    $selisih_hari = strtotime($tanggal_sekarang) - strtotime($tgl_pengembalian_seharusnya);
    $denda = ceil($selisih_hari / (60 * 60 * 24)) * 1000; // Denda per hari 1000
}

// Update status peminjaman dan denda
$query_update = "UPDATE tbl_peminjaman SET status='$status', denda='$denda' WHERE id_peminjaman='$id_peminjaman'";
$result_update = mysqli_query($koneksi, $query_update);

if ($result_update) {
    ?>
    <script language="javascript">
        alert('Berhasil Diubah');
        window.location = '../../../index.php?menu=10';
    </script>
    <?php
} else {
    ?>
    <script language="javascript">
        alert('Gagal Mengubah');
        window.location = '../../../index.php?menu=7';
    </script>
    <?php
}
?>
