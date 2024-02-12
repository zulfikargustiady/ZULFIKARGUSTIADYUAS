<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data User Baru</h1>
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
                            <form action="pages/admin/user/tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Username</label>
                                    <input required type="text" class="form-control" name="Username">
                                </div>
                                <div class="password-container">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input required type="password" id="password" class="form-control" name="Password">
                                    <span class="lihat" onclick="lihat()"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama</label>
                                    <input required type="text" class="form-control" name="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Alamat</label>
                                    <textarea name="Alamat" id="" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Level</label>
                                    <select required class="form-control select2" style="width: 100%;" name="level">
                                        <option value="">-- Pilih level --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="user">user</option>
                                    </select>
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