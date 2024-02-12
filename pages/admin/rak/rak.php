<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Rak</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </button>
                                <input type="text" id="searchInput" placeholder="Search...">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Rak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM tbl_rak ";
                                        $result = mysqli_query($koneksi, $query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id_rak = $row['id_rak'];
                                            $nama = $row['nama'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td>
                                                    <?= $nama; ?>
                                                </td>
                                                <td align="center">
                                                    <a type="btn" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit<?= $id_rak; ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a type="btn" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#hapus<?= $id_rak; ?>">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- modal edit -->
                                            <div class="modal fade" id="edit<?= $id_rak ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Rak
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/admin/rak/edit.php" method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Rak</label>
                                                                    <input type="hidden" class="form-control" name="id_rak"
                                                                        value="<?= $id_rak; ?>">
                                                                    <input type="text" class="form-control" name="nama"
                                                                        value="<?= $nama; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-warning">Simpan
                                                                        Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- modal hapus -->
                                            <div class="modal fade" id="hapus<?= $id_rak ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Rak
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/admin/rak/hapus.php" method="POST">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" name="id_rak"
                                                                        value="<?= $id_rak; ?>">
                                                                    <p>
                                                                        <b>Apakah anda yakin akan menghapus Rak
                                                                            <?= $nama ?>
                                                                        </b>?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pages/admin/rak/tambah.php" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Rak</label>
                            <input required type="text" class="form-control" name="nama">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" href="tambah.php">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </section>
    </div>
    <script src="dist/cari.js">
    </script>

</body>

</html>