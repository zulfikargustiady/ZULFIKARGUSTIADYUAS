<?php
  	include '../../../koneksi.php';
	  function input($data)
	  {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	  }

	$judul = input($_POST['Judul']);
	$pengarang = input($_POST['Pengarang']);
	$penerbit = input($_POST['Penerbit']);
	$id_rak = $_POST['id_rak'];
	$id_kategori = $_POST['id_kategori'];

	 //ambil semua isi array files
	 $nama_file=$_FILES['foto']['name'];
	 $tipe_file=$_FILES['foto']['type'];
	 $ukuran_file=$_FILES['foto']['size'];
	 $error=$_FILES['foto']['error'];
	 $tmp_file=$_FILES['foto']['tmp_name'];
	
    //jika tidak ada foto yang dipilih
    if ($error == 4) {

        $query="INSERT INTO tbl_buku(Judul, Pengarang, Penerbit, id_rak,id_kategori,foto) VALUES('$judul', '$pengarang','$penerbit','$id_rak', '$id_kategori', '')";

        $sql=mysqli_query($koneksi,$query);

        if ($sql) {
            ?>
            <script>
            alert('Data baru berhasil disimpan');
            document.location.href='../../../index.php?menu=3';
            </script>
            <?php
        }else{
            ?>
            <script>
            alert('Ada kesalahan saat input ke database');
            document.location.href='../../../index.php?menu=5';
            </script>
            <?php
        }
    }

    //pengecekan jika bukan foto yang diupload user
    $daftar_foto=['jpg','jpeg','png'];
    $ekstensi_file=explode('.', $nama_file);
    $ekstensi_file=strtolower(end($ekstensi_file));

    //cek ekstensi foto
    if (!in_array($ekstensi_file, $daftar_foto)) {
        ?>
        <script>
        alert('Yang anda pilih bukan foto');
        document.location.href='../../../index.php?menu=5';
        </script>
        <?php
        return false;
    }

    //cek ukuran file tidak boleh lebih besar dari 3mb = (3000000byte)
    if ($ukuran_file > 3000000) {
        ?>
        <script>
        alert('Ukuran foto tidak boleh lebih dari 3mb!');
        document.location.href='../../../index.php?menu=5';
        </script>
        <?php
        return false;
    }

    //jika lolos pengecekan, maka upload
    //generate nama file baru untuk mencegah nama file yang sama
    $nama_file_baru=uniqid();
    $nama_file_baru.='.';
    $nama_file_baru.=$ekstensi_file;

    move_uploaded_file($tmp_file, '../../../img/'.$nama_file_baru);

    $query="INSERT INTO tbl_buku (Judul, Pengarang, Penerbit, id_rak,id_kategori,foto) VALUES('$judul', '$pengarang','$penerbit', '$id_rak', '$id_kategori', '$nama_file_baru')";

    $sql=mysqli_query($koneksi,$query);

    if ($sql) {
        ?>
        <script>
        alert('Data disertai foto baru berhasil disimpan');
        document.location.href='../../../index.php?menu=3';
        </script>
        <?php
    }else{
        ?>
        <script>
        alert('Ada kesalahan saat input ke database');
        document.location.href='../../../index.php?menu=10';
        </script>
        <?php
    }

?>