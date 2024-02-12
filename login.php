<?php 

session_start();

if (isset($_SESSION['login'])) {
	header('Location:blank.php');
	exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="tampilan.css">
</head>
<body>
	<div class="login-page">
		<h1>Sistem Informasi Perpustakaan</h1>
		<div class="form">
			<form action="auth.php" class="login-form" method="POST">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<button>login</button>
			</form>
			<h5><a href="register.php">Register</a></h5>
		</div>
	</div>
</body>
</html>