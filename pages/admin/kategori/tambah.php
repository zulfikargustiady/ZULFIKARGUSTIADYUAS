<?php
include '../../../koneksi.php';

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$nama = input($_POST['nama']);

$query = "INSERT INTO tbl_kategori(nama) VALUES('$nama')";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	?>
	<script language="javascript">
		alert('Berhasil Disimpan');
		window.location = '../../../index.php?menu=7';
	</script>
	<?php
} else {
	?>
	<script language="javascript">
		alert('Gagal Menyimpan');
		window.location = '../../../index.php?menu=7';
	</script>
	<?php
}
?>