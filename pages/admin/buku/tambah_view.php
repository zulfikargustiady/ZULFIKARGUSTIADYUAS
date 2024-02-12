<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Buku Baru</h1>
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
                            <form action="pages/admin/buku/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Judul</label>
                                    <input required type="text" class="form-control" name="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pengarang</label>
                                    <input required type="text" class="form-control" name="Pengarang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Penerbit</label>
                                    <input required type="text" class="form-control" name="Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Rak</label>
                                    <select required class="form-control select2" style="width: 100%;"
                                        name="id_rak">
                                        <option value="">-- Pilih Rak --</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_rak");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option value="<?= $row['id_rak'] ?>">
                                                <?= $row['nama']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kategori</label>
                                    <select required class="form-control select2" style="width: 100%;"
                                        name="id_kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option value="<?= $row['id_kategori'] ?>">
                                                <?= $row['nama']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="modal-footer">
                                    <a type="btn" class="btn btn-secondary" href="index.php?menu=4">Kembali</a>
                                    <button type="submit" class="btn btn-primary" href="tambah.php">Simpan</button>
                                </div>
                            </form>
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