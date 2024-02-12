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
                <a href="index.php?menu=12" type="btn" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Data
                </a>
                <input type="text" id="searchInput" placeholder="Search...">
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Foto</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM user ";
                    $result = mysqli_query($koneksi, $query);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $id = $row['id'];
                      $username = $row['username'];
                      $password = $row['password'];
                      $nama = $row['nama'];
                      $alamat = $row['alamat'];
                      $foto = $row['foto'];
                      $level = $row['level'];
                      ?>
                      <tr>
                        <td>
                          <?= $i++; ?>
                        </td>
                        <td>
                          <?= $username; ?>
                        </td>
                        <td style="max-width: 200px;">
                          <?= $password; ?>
                        </td>
                        <td>
                          <?= $nama; ?>
                        </td>
                        <td>
                          <?= $alamat; ?>
                        </td>
                        <td>
                          <?php
                          if (!empty($foto)) {
                            ?>
                            <img width="50px" src="img/<?= $foto; ?>">
                            <?php
                          } else {
                            ?>
                            <img width="50px" src="img/buku-1.jpg">
                            <?php
                          }
                          ?>
                        </td>
                        <td>
                          <?= $level; ?>
                        </td>
                        <td align="center">
                          <a type="btn" class="btn btn-warning" href="index.php?menu=13&id=<?= $id; ?>">
                            <i class="fas fa-edit"></i> Edit
                          </a>
                          <a type="btn" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $id; ?>">
                            <i class="fas fa-trash-alt"></i> Delete
                          </a>
                        </td>
                      </tr>
                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus<?= $id ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="pages/admin/user/hapus.php" method="POST">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                  <p>
                                    <b>Apakah anda yakin akan menghapus nama
                                      <?= $nama ?>
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
  </section>
  </div>
  <script src="dist/cari.js">
  </script>

</body>

</html>