<?php
include '../../../koneksi.php';

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = input(mysqli_real_escape_string($koneksi, $_POST['Username']));
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
$nama = input(mysqli_real_escape_string($koneksi, $_POST['Nama']));
$alamat = input(mysqli_real_escape_string($koneksi, $_POST['Alamat']));

//ambil semua isi array files
$nama_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmp_file = $_FILES['foto']['tmp_name'];

$level = mysqli_real_escape_string($koneksi, $_POST['level']);


$checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $checkUsernameQuery);

if (mysqli_num_rows($result) > 0) {
    ?>
    <script language="javascript">
        alert('Gagal Menyimpan, username sudah ada');
        window.location = '../../../index.php?menu=4';
    </script>
    <?php
} else {
    //jika tidak ada foto yang dipilih
    if ($error == 4) {

        $query = "INSERT INTO user(username, password, nama, alamat,foto,level) VALUES('$username', '$password','$nama', '$alamat', '', '$level')";

        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            ?>
            <script>
                alert('Data baru berhasil disimpan');
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
    }

    //pengecekan jika bukan foto yang diupload user
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

    $query = "INSERT INTO user (username, password, nama, alamat,foto,level) VALUES('$username', '$password','$nama', '$alamat', '$nama_file_baru', '$level')";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        ?>
        <script>
            alert('Data disertai foto baru berhasil disimpan');
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
}
?>