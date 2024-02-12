<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
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
                            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $password = $row['password'];
                                $nama = $row['nama'];
                                $alamat = $row['alamat'];
                                $foto = $row['foto'];
                                $level = $row['level'];
                                ?>
                                <form action="pages/admin/user/edit.php" method="POST" enctype="multipart/form-data">
                                    <div class="alert alert-info"><i class="fas fa-info"></i> Sebelum menekan tombol simpan
                                        baik ada perubahan atau tidak disarankan kembali menulis password yang sebelumnya
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Username</label>
                                        <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                        <input type="text" class="form-control" name="username"
                                            value="<?= $row['username']; ?>" readonly>
                                    </div>
                                    <div class="password-container">
                                        <label for="exampleFormControlInput1">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            value="<?= $row['password']; ?>">
                                        <span class="lihat" onclick="lihat()"><i class="fas fa-eye"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            value="<?= $row['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                        &nbsp; &nbsp;<img width="100px" src="img/<?= $foto; ?>"><small>
                                            <- "Gambar Sebelumnya" </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Level</label>
                                        <select class="form-control select2" style="width: 100%;" name="level">
                                            <option value="<?= $level; ?>">-- Pilih Level (Sebelumnya
                                                <?= $level; ?>)
                                            </option>
                                            <option value="Admin">Admin</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="btn" class="btn btn-secondary" href="index.php?menu=4">Kembali</a>
                                        <button type="submit" class="btn btn-warning" href="tambah.php">Simpan
                                            Perubahan</button>
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

<script>
    function lihat() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

<style>
    .password-container {
        position: relative;
    }

    .password-container .lihat {
        position: absolute;
        right: 10px;
        top: 73%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
    }
</style>