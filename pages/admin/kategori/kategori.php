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
                        <h1>Data User</h1>
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
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM tbl_kategori";
                                        $result = mysqli_query($koneksi, $query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id_kategori'];
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
                                                        data-target="#edit<?= $id; ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a type="btn" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#hapus<?= $id; ?>">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- modal edit -->
                                            <div class="modal fade" id="edit<?= $id ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/admin/kategori/edit.php" method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama</label>
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        value="<?= $id; ?>">
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
                                            <div class="modal fade" id="hapus<?= $id ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/admin/kategori/hapus.php" method="POST">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        value="<?= $id; ?>">
                                                                    <p>
                                                                        <b>Apakah anda yakin akan menghapus kategori
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
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pages/admin/kategori/tambah.php" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Kategori</label>
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