<?php
    include '../../../koneksi.php';
    $id = $_POST['id'];

	$query = "DELETE FROM tbl_buku WHERE id='$id'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		?>
		<script language="javascript">
			alert('Berhasil Dihapus');
			window.location = '../../../index.php?menu=3';
		</script>
		<?php
	} else {
		?>
		<script language="javascript">
			alert('Gagal Dihapus');
			window.location = '../../../index.php?menu=3';
		</script>
		<?php
	}
?>