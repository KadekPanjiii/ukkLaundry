
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-align-left"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"> 
      <!-- Navbar Search -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $_SESSION['role']; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" id="nav-log-out" href="../logout.php"><i class="fas fa-sign-out-alt"></i> keluar</a>
        </a>
      </div>
    </li>
    </ul>
  </nav>