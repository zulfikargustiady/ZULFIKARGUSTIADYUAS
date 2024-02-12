<?php

session_start();

if (!isset($_SESSION['login'])) {
	header('Location:login.php');
	exit;
}

include 'koneksi.php';

$sqlCommand = "SELECT COUNT(*) FROM tbl_buku";
$query = mysqli_query($koneksi, $sqlCommand);
$tot_buku = mysqli_fetch_array($query);


$sqlCommand = "SELECT COUNT(*) FROM user";
$query = mysqli_query($koneksi, $sqlCommand);
$tot_user = mysqli_fetch_array($query);

$sqlCommand = "SELECT COUNT(*) FROM tbl_rak";
$query = mysqli_query($koneksi, $sqlCommand);
$tot_rak = mysqli_fetch_array($query);

$sqlCommand = "SELECT COUNT(*) FROM tbl_kategori";
$query = mysqli_query($koneksi, $sqlCommand);
$tot_kat = mysqli_fetch_array($query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perpus</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<link rel="icon" href="img/buku-1.jpg" type="image/ico">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php
	include "menu.php";
	if (!empty($_GET['menu'])) {
		$menu = $_GET['menu'];
		if ($_SESSION['level'] == 'Admin') {
			switch ($menu) {
				case 1:
					include 'pages/admin/dashboard.php';
					break;
				case 3:
					include 'pages/admin/buku/buku.php';
					break;
				case 4:
					include 'pages/admin/user/user.php';
					break;
				case 5:
					include 'pages/admin/buku/tambah_view.php';
					break;
				case 6:
					include 'pages/admin/rak/rak.php';
					break;
				case 7:
					include 'pages/admin/kategori/kategori.php';
					break;
				case 8:
					include 'pages/admin/buku/detail.php';
					break;
				case 9:
					include 'pages/admin/buku/edit_view.php';
					break;
				case 10:
					include 'pages/admin/pinjam/pinjam.php';
					break;
				case 11:
					include 'pages/admin/pinjam/tambah_view.php';
					break;
				case 12:
					include 'pages/admin/user/tambah_view.php';
					break;
				case 13:
					include 'pages/admin/user/edit_view.php';
					break;
				case 14:
					include 'pages/admin/pinjam/pdf.php';
					break;
				default:
					include 'blank.php';
					break;
			}
		} else {
			switch ($menu) {
				case 21:
					include 'pages/user/buku/buku.php';
					break;
				case 22:
					include 'pages/user/buku/detail.php';
					break;
				case 23:
					include 'pages/user/profile/edit_view.php';
					break;
				case 24:
					include 'pages/user/peminjaman/pinjam.php';
					break;
				default:
					include 'blank.php';
					break;
			}
		}

	}
	?>

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">

		</div>
		<!-- Default to the left -->
		<strong>©Copyright by 21552011124_Kelompok5_TIF221PA_UASWEB1</strong>
	</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="assets/dist/js/adminlte.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<script src="assets/dist/js/demo.js"></script>
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="assets/dist/js/adminlte.js"></script>
	<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="assets/plugins/chart.js/Chart.min.js"></script>

	<!-- PAGE SCRIPTS -->
	<script src="assets/dist/js/pages/dashboard2.js"></script>
</body>

</html>