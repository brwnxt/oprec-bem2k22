<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-text d-flex flex-column ml-0">
          <span class="font-weight-bold mb-2 text-primary">OPREC STAFF BEM</span>
          <span class="text-secondary text-small text-capitalize">Admin</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data_master" aria-expanded="false" aria-controls="data_master">
        <span class="menu-title">Data Master</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi mdi-gamepad-variant menu-icon"></i>
      </a>
      <div class="collapse" id="data_master">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="esport.php">E-sport</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#data_pendaftar" aria-expanded="false" aria-controls="data_master">
        <span class="menu-title">Data Pendaftar</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-account-multiple menu-icon"></i>
      </a>
      <div class="collapse" id="data_pendaftar">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="biodata.php">Biodata</a> </li>
          <li class="nav-item"> <a class="nav-link" href="berkas.php">Berkas</a> </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#seleksi" aria-expanded="false" aria-controls="seleksi">
        <span class="menu-title">Seleksi</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-clipboard-check menu-icon"></i>
      </a>
      <div class="collapse" id="seleksi">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="seleksi1.php">Berkas</a></li>
          <li class="nav-item"> <a class="nav-link" href="seleksi2.php">Final</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"  onclick="return confirm('Yakin ingin logout ?');">
        <span class="menu-title">Log Out</span>
        <i class="mdi mdi-logout menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- partial -->