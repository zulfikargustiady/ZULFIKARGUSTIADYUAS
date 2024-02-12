<?php

include '../../../koneksi.php';

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = $_POST['id'];
$judul = input($_POST['Judul']);
$pengarang = input($_POST['Pengarang']);
$penerbit = input($_POST['Penerbit']);
$id_rak = $_POST['id_rak'];
$id_kategori = $_POST['id_kategori'];

 //ambil semua isi array files
 $nama_file=$_FILES['foto']['name'];
 $tipe_file=$_FILES['foto']['type'];
 $ukuran_file=$_FILES['foto']['size'];
 $error=$_FILES['foto']['error'];
 $tmp_file=$_FILES['foto']['tmp_name'];
//jika tidak ada foto yang dipilih
if ($error == 4) {

    $query = mysqli_query($koneksi, "UPDATE tbl_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', id_rak='$id_rak', id_kategori='$id_kategori' WHERE id='$id'");


    if ($query) {
        ?>
        <script>
            alert('Edit Berhasil');
            document.location.href = "../../../index.php?menu=3";
        </script>
    <?php
    } else {
        ?>
        <script>
            alert('Edit Gagal');
            document.location.href = "../../../index.php?menu=9";
        </script>
        <?php
    }
    return false;
}

//pengecekan jika bukan foto yang diopload user
$daftar_foto = ['jpg', 'jpeg', 'png'];
$ekstensi_file = explode('.', $nama_file);
$ekstensi_file = strtolower(end($ekstensi_file));

//cek ekstensi foto
if (!in_array($ekstensi_file, $daftar_foto)) {
    ?>
    <script>
        alert('Yang anda pilih bukan foto');
        document.location.href = '../../../index.php?menu=9';
    </script>
    <?php
    return false;
}

//cek ukuran file tidak boleh lebih besar dari 3mb = (3000000byte)
if ($ukuran_file > 3000000) {
    ?>
    <script>
        alert('Ukuran foto tidak boleh lebih dari 3mb!');
        document.location.href = '../../../index.php?menu=9';
    </script>
    <?php
    return false;
}

//jika lolos pengecekan, maka upload
//generate nama file baru untuk mencegah nama file yang sama
$nama_file_baru = uniqid();
$nama_file_baru .= '.';
$nama_file_baru .= $ekstensi_file;

move_uploaded_file($tmp_file, '../../../img/' . $nama_file_baru);

$query = "UPDATE tbl_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', id_rak='$id_rak', id_kategori='$id_kategori', foto='$nama_file_baru' WHERE id='$id'";

$query_hapus_foto = mysqli_query($koneksi, "SELECT foto FROM tbl_buku WHERE id = '$id'");
if ($hapus_foto = mysqli_fetch_assoc($query_hapus_foto)) {
    $hapus_foto_buku = $hapus_foto['foto'];
    unlink('../../../img/' . $hapus_foto_buku);
}

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    ?>
    <script>
        alert('Data disertai foto baru berhasil diedit');
        document.location.href = '../../../index.php?menu=3';
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Ada kesalahan saat input ke database');
        document.location.href = '../../../index.php?menu=9';
    </script>
    <?php
}

?>