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
	$nama = input($_POST['nama']);

	$query = "UPDATE tbl_kategori SET nama='$nama' WHERE id_kategori='$id'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		?>
		<script language="javascript">
			alert('Berhasil Diubah');
			window.location = '../../../index.php?menu=7';
		</script>
		<?php
	} else {
		?>
		<script language="javascript">
			alert('Gagal Mengubah');
			window.location = '../../../index.php?menu=7';
		</script>
		<?php
	}
?>