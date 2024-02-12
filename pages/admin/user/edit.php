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
$username = input($_POST['username']);
$newPassword = input($_POST['password']);
$nama = input($_POST['nama']);
$alamat = input($_POST['alamat']);
$level = input($_POST['level']);

// Check if there is a new password input
if (!empty($newPassword)) {
    // Hash the new password only if there is a new password input
    $password = password_hash($newPassword, PASSWORD_DEFAULT);
} else {
    // If there is no new password input, retrieve the existing hashed password from the database
    $queryPassword = mysqli_query($koneksi, "SELECT password FROM user WHERE id='$id'");
    $rowPassword = mysqli_fetch_assoc($queryPassword);
    $password = $rowPassword['password'];
}

$nama_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmp_file = $_FILES['foto']['tmp_name'];

// Jika tidak ada foto yang dipilih
if ($error == 4) {
    $query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', level='$level' WHERE id='$id'");

    if ($query) {
        ?>
        <script>
            alert('Edit Berhasil');
            document.location.href = "../../../index.php?menu=4";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Edit Gagal');
            document.location.href = "../../../index.php?menu=4";
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
        document.location.href = '../../../index.php?menu=4';
    </script>
    <?php
    return false;
}

//cek ukuran file tidak boleh lebih besar dari 3mb = (3000000byte)
if ($ukuran_file > 3000000) {
    ?>
    <script>
        alert('Ukuran foto tidak boleh lebih dari 3mb!');
        document.location.href = '../../../index.php?menu=4';
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

$query = "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', foto='$nama_file_baru' , level='$level' WHERE id='$id'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    ?>
    <script>
        alert('Data disertai foto baru berhasil diedit');
        document.location.href = '../../../index.php?menu=4';
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Ada kesalahan saat input ke database');
        document.location.href = '../../../index.php?menu=4';
    </script>
    <?php
}
?>