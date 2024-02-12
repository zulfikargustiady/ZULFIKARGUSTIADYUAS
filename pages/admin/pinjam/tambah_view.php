<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Peminjaman Baru</h1>
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
                            <form action="pages/admin/pinjam/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Anggota</label>
                                    <select required class="form-control select2" style="width: 100%;" name="id_user">
                                        <option value="">-- Pilih Anggota --</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM user where level='user'");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option value="<?= $row['id'] ?>">
                                                <?= $row['nama']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Buku</label>
                                    <select required class="form-control select2" style="width: 100%;" name="id_buku">
                                        <option value="">-- Pilih Buku --</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option value="<?= $row['id'] ?>">
                                                <?= $row['judul']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">tanggal_peminjaman</label>
                                    <input required type="date" class="form-control" name="tgl_peminjaman">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">tanggal_pengembalian</label>
                                    <input required type="date" class="form-control" name="tgl_pengembalian">
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