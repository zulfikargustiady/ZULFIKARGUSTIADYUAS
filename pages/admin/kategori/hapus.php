<?php
include '../../../koneksi.php';

$id = $_POST['id'];

$query = "DELETE from tbl_kategori where id_kategori='$id'";
$result = mysqli_query($koneksi,$query);

if($result){
    ?>
    <script>
        alert('Berhasil di hapus');
        window.location.href='../../../index.php?menu=7'
    </script>
    <?php
}else{
    ?>
    <script>
        alert('Gagal di hapus');
        window.location.href='../../../index.php?menu=7'
    </script>
    <?php
}

    
?>