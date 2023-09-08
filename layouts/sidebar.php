<?php
    $url = $_SERVER['REQUEST_URI'];

?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="color: white;font-weight: bold;" class="brand-text">Aplikasi Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($_SESSION['role'] == 'admin' ){ ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?= strpos($url, 'index.php') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="outlet.php" class="nav-link <?= strpos($url, 'outlet.php') ? 'active' : '' ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Data Outlet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="paket.php" class="nav-link <?= strpos($url, 'paket.php') ? 'active' : '' ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Data Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="member.php" class="nav-link <?= strpos($url, 'member.php') ? 'active' : '' ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Data Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php" class="nav-link <?= strpos($url, 'user.php') ? 'active' : '' ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
        </ul>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="transaksi.php" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Transaksi Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-history nav-icon"></i>
                  <p>Riwayat Transaksi</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['role'] == 'kasir' ){ ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="member.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Data Member</p>
                </a>
              </li>
            </ul>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="transaksi.php" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Transaksi Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-history nav-icon"></i>
                  <p>Riwayat Transaksi</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['role'] == 'owner' ){ ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <?php } ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>