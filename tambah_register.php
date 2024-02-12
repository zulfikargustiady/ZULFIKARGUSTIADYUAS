<?php
include 'koneksi.php';


$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

$checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $checkUsernameQuery);

if (mysqli_num_rows($result) > 0) {
    ?>
    <script language="javascript">
        alert('Gagal Menyimpan, username sudah ada');
        window.location = 'register.php';
    </script>
    <?php
} else {
    $query = "INSERT INTO user (username, password, nama, alamat,foto,level) VALUES ('$username', '$password', '$nama','$alamat','','user')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        ?>
        <script language="javascript">
            alert('Berhasil Disimpan');
            window.location = 'login.php';
        </script>
        <?php
    } else {
        ?>
        <script language="javascript">
            alert('Gagal Menyimpan');
            window.location = 'register.php';
        </script>
        <?php
    }
}
?>
