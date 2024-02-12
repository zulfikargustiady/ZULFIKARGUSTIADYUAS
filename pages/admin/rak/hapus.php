<?php
include '../../../koneksi.php';

$id_rak = $_POST['id_rak'];

$query = "DELETE from tbl_rak where id_rak='$id_rak'";
$result = mysqli_query($koneksi,$query);

if($result){
    ?>
    <script>
        alert('Berhasil di hapus');
        window.location.href='../../../index.php?menu=6'
    </script>
    <?php
}else{
    ?>
    <script>
        alert('Gagal di hapus');
        window.location.href='../../../index.php?menu=6'
    </script>
    <?php
}

    
?>