<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/buku-1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Perpus</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $foto = $_SESSION['foto'];
          if (!empty($foto)) {
            ?>
            <img class="img-circle elevation-2" alt="User Image" src="img/<?= $foto; ?>">
            <?php
          } else {
            ?>
            <img class="img-circle elevation-2" alt="User Image" src="img/buku-1.jpg">
            <?php
          }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php echo $_SESSION['nama'] ?> |
            <?php echo $_SESSION['level'] ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
          <?php
          if ($_SESSION['level'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="index.php?menu=1" class="nav-link <?php if ($_GET['menu'] == 1) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=3" class="nav-link <?php if ($_GET['menu'] == 3) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Menu Buku
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=4" class="nav-link <?php if ($_GET['menu'] == 4) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Menu User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=6" class="nav-link <?php if ($_GET['menu'] == 6) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  Menu Rak
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=7" class="nav-link <?php if ($_GET['menu'] == 7) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Menu Kategori
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=10" class="nav-link <?php if ($_GET['menu'] == 10) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Menu Peminjaman
                </p>
              </a>
            </li>
            <?php
          } else {
            ?>
            <li class="nav-item">
              <a href="index.php?menu=21" class="nav-link <?php if ($_GET['menu'] == 21) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Menu Buku
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=23" class="nav-link <?php if ($_GET['menu'] == 23) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Menu Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?menu=24" class="nav-link <?php if ($_GET['menu'] == 24) {
                echo 'active';
              } ?>">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Menu Peminjaman
                </p>
              </a>
            </li>
            <?php
          }
          ?>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>