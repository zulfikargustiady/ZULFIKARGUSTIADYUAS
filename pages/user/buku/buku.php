<?php

include 'koneksi.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Buku</h1>
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
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tbl_buku");
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($query)) {
                    $id = $row['id'];
                    $judul = $row['judul'];
                    $pengarang = $row['pengarang'];
                    $penerbit = $row['penerbit'];
                    ?>
                    <tr>
                      <td>
                        <?= $i++; ?>
                      </td>
                      <td>
                        <?php echo $judul ?>
                      </td>
                      <td>
                        <?php echo $pengarang ?>
                      </td>
                      <td>
                        <?php echo $penerbit ?>
                      </td>
                      <td>
                        <a type="btn" class="btn btn-info" href="index.php?menu=22&id=<?= $id; ?>">
                          <i class="fas fa-info"></i> Detail
                        </a>
                      </td>
                    </tr>
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?= $id ?>" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="pages/admin/buku/hapus.php" method="POST">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                <p>
                                  <b>Apakah anda yakin akan menghapus Buku
                                    <?= $judul; ?>
                                  </b>?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
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

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pages/admin/buku/tambah.php" method="POST">
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" href="tambah.php">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="dist/cari.js"></script>