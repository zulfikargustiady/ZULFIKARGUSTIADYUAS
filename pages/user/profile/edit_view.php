<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Profile</h1>
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
                            $username = $_SESSION['username'];
                            $query = mysqli_query($koneksi, "SELECT * from user WHERE username='$username'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $password = $row['password'];
                                $nama = $row['nama'];
                                $alamat = $row['alamat'];
                                $foto = $row['foto'];
                                $level = $row['level'];
                                ?>
                                <form action="pages/user/profile/edit.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID</label>
                                        <input required type="text" class="form-control" name="id" value="<?= $id; ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">username</label>
                                        <input required type="text" class="form-control" name="username"
                                            value="<?= $username; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <div id="password_fields">
                                            <label for="password_baru">Password</label><br>
                                            <input type="password" class="form-control" id="password_baru"
                                                name="password" readonly>
                                        </div>
                                        <input type="checkbox" id="ganti_password" name="ganti_password">
                                        <label for="ganti_password">Ganti Password</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">nama</label>
                                        <input required type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">alamat</label>
                                        <input required type="text" class="form-control" name="alamat"
                                            value="<?= $alamat; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                        &nbsp; &nbsp;<img width="100px" src="img/<?= $foto; ?>"><small>
                                            <- "Gambar Sebelumnya" </small>

                                    </div>
                                    <div class="modal-footer">
                                        <a type="btn" class="btn btn-secondary" href="index.php?menu=4">Kembali</a>
                                        <button type="submit" class="btn btn-primary" href="tambah.php">Simpan</button>
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
    document.getElementById("ganti_password").addEventListener("change", function () {
        var passwordField = document.getElementById("password_baru");
        if (this.checked) {
            passwordField.removeAttribute("readonly");
            passwordField.setAttribute("required", "required");
        } else {
            passwordField.setAttribute("readonly", "readonly");
            passwordField.removeAttribute("required");
        }
    });
</script>