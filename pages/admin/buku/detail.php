<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT *, tbl_rak.nama AS rak, tbl_kategori.nama AS kat
                            FROM tbl_buku
                            INNER JOIN tbl_rak ON tbl_rak.id_rak = tbl_buku.id_rak
                            INNER JOIN tbl_kategori ON tbl_kategori.id_kategori = tbl_buku.id_kategori
                            WHERE id='$id'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $judul = $row['judul'];
                                $pengarang = $row['pengarang'];
                                $penerbit = $row['penerbit'];
                                $rak = $row['rak'];
                                $kat = $row['kat'];
                                $foto = $row['foto'];
                                ?>
                                <form action="" method="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID</label>
                                        <input required type="text" class="form-control" name="Judul" value="<?= $id; ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Judul</label>
                                        <input required type="text" class="form-control" name="Judul" value="<?= $judul; ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Pengarang</label>
                                        <input required type="text" class="form-control" name="Pengarang"
                                            value="<?= $pengarang; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Penerbit</label>
                                        <input required type="text" class="form-control" name="Penerbit"
                                            value="<?= $penerbit; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rak</label>
                                        <input required type="text" class="form-control" name="Penerbit"
                                            value="<?= $rak; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kategori</label>
                                        <input required type="text" class="form-control" name="Penerbit"
                                            value="<?= $kat; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Foto</label>
                                        &nbsp; &nbsp;<img width="100px" src="img/<?= $foto; ?>">
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>