<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>
                <?= $tot_buku[0]; ?>
              </h3>
              <p>Buku</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="index.php?menu=3" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?= $tot_user[0] ?>
              </h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="index.php?menu=4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
                <?= $tot_rak[0] ?>
              </h3>
              <p>Rak</p>
            </div>
            <div class="icon">
              <i class="fas fa-folder"></i>
            </div>
            <a href="index.php?menu=6" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
                <?= $tot_kat[0] ?>
              </h3>
              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fas fa-list"></i>
            </div>
            <a href="index.php?menu=7" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!--/.direct-chat -->

      <!-- TO DO List -->

      <!-- /.card -->

  </section>
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->

  <!-- Calendar -->
  <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>