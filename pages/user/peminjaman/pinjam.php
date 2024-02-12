<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman</h1>
                    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
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
                        <div class="card-header">
                            <input type="text" id="searchInput" placeholder="Search...">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                        <th>Denda</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $query = mysqli_query($koneksi, "SELECT *, tbl_buku.judul AS jud
                                    FROM tbl_peminjaman
                                    INNER JOIN tbl_buku ON tbl_buku.id = tbl_peminjaman.id_buku
                                    Where tbl_peminjaman.id_user = $id");
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $id_peminjaman = $row['id_peminjaman'];
                                        $id_buku = $row['jud'];
                                        $tanggal_peminjaman = $row['tanggal_peminjaman'];
                                        $tanggal_pengembalian = $row['tanggal_pengembalian'];
                                        $status = $row['status'];
                                        $denda = $row['denda'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo $id_buku ?>
                                            </td>
                                            <td>
                                                <?php echo $tanggal_peminjaman ?>
                                            </td>
                                            <td>
                                                <?php echo $tanggal_pengembalian ?>
                                            </td>
                                            <td>
                                                <?php echo $status ?>
                                            </td>
                                            <td>
                                                <?php echo $denda ?>
                                            </td>
                                        </tr>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?= $id_peminjaman ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peminjaman
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="pages/admin/pinjam/hapus.php" method="POST">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="id"
                                                                    value="<?= $id_peminjaman; ?>">
                                                                <p>
                                                                    <b>Apakah anda yakin akan menghapus peminjaman atas nama
                                                                        <?= $id_user; ?>
                                                                    </b>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal proses kembali -->
                                        <div class="modal fade" id="kembali<?php echo $id_peminjaman; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Proses Pemgembalian</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="pages/admin/pinjam/kembali.php"
                                                            method="post">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id_peminjaman"
                                                                        value="<?php echo $id_peminjaman; ?>" />
                                                                    <input type="hidden" name="tanggal_pengembalian"
                                                                        value="<?php echo $tanggal_pengembalian; ?>" />
                                                                    <input type="hidden" name="id_buku"
                                                                        value="<?php echo $id_buku; ?>" />
                                                                    <p>Apakah Anda yakin mau melakukan proses pengembalian
                                                                        atas nama <b>
                                                                            <?php echo $id_user ?>
                                                                        </b> ?</p>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-primary">Proses</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
    </section>
</div>
<!-- /.container-fluid -->
<!-- /.content -->
<!-- </div> -->

<script src="dist/cari.js"></script>