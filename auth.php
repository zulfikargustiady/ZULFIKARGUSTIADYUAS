<?php
session_start();
include 'koneksi.php';

// Menangani input dan membersihkan data
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Menggunakan prepared statement untuk mencegah SQL injection
$query = "SELECT * FROM user WHERE username=? LIMIT 1";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);

// Mengambil hasil query
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Memeriksa password dengan password_verify
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['login'] = true;
	$_SESSION['username'] = $user['username'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['foto'] = $user['foto'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['level'] = $user['level'];

    if ($_SESSION['level'] == 'Admin') {
        header('location:index.php?menu=1');
    } else {
        header('location:index.php?menu=21');
    }
} else {
    ?>
    <script>
        alert('Username atau Password yang Anda inputkan salah');
        document.location.href = "login.php";
    </script>
    <?php
}

// Tutup prepared statement
mysqli_stmt_close($stmt);
?>
