<?php
include '../../../koneksi.php';

$id_user = $_POST['id_user'];
$id_buku = $_POST['id_buku'];
$tgl_peminjaman = $_POST['tgl_peminjaman'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];

$query = "INSERT INTO tbl_peminjaman (id_user, id_buku, tanggal_peminjaman, tanggal_pengembalian,status, denda) VALUES ('$id_user', '$id_buku', '$tgl_peminjaman', '$tgl_pengembalian', 'Dipinjam', '0')";
;
$sql = mysqli_query($koneksi, $query);
if ($sql) {
    ?>
    <script language="javascript">
        alert('Berhasil Disimpan');
        window.location = '../../../index.php?menu=10';
    </script>
    <?php
} else {
    ?>
    <script language="javascript">
        alert('Gagal Menyimpan');
        window.location = '../../../index.php?menu=10';
    </script>
    <?php
}
?>