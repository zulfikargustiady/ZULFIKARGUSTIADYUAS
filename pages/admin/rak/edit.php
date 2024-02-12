<?php
    include '../../../koneksi.php';

	function input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
    $id_rak = $_POST['id_rak'];  
	$nama = input($_POST['nama']);

	$query = "UPDATE tbl_rak SET nama='$nama' WHERE id_rak='$id_rak'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		?>
		<script language="javascript">
			alert('Berhasil Diubah');
			window.location = '../../../index.php?menu=6';
		</script>
		<?php
	} else {
		?>
		<script language="javascript">
			alert('Gagal Mengubah');
			window.location = '../../../index.php?menu=6';
		</script>
		<?php
	}
?>