<!-- Navbar -->

<nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary fixed "> <div class="container">
<a href="#" class="navbar-brand">
<img src="../assets/image/lgo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
<span class="brand-text font-weight-bold">Aplikasi Laundry</span>
</a>
<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target=" #navbarCollapse" aria-controls="navbar Collapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span> </button>
<div class="collapse navbar-collapse order-3" id="navbarCollapse">
<!-- Left navbar links -->
<ul class="navbar-nav">
<?php if ($_SESSION['role'] == "admin") { ?>
<li class="nav-item">
<a href="index.php" class="nav-link text-white"> Beranda</a> </li>
<li class="nav-item dropdown">
<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white dropdown-toggle">Data Master</a>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-> shadow"> <li><a href="outlet.php" class="dropdown-item">Data Outlet</a></li> <li><a href="paket.php" class="dropdown-item">Data Paket</a></li> <li><a href="pengguna.php" class="dropdown-item">Data Pengguna</a></li> </ul>
</li>
<li class="nav-item">
<a href="pelanggan.php" class="nav-link text-white">Registrasi Pelanggan</a>
</li>
<li class="nav-item">
<a href="transaksi.php" class="nav-link text-white">Entri Transaksi</a> </li>
<li class="nav-item">
<a href="laporan.php" class="nav-link text-white">Laporan</a>
</li>
<?php } ?>
<?php if ($_SESSION['role'] == "master") { ?>
<li class="nav-item">
<a href="index.php" class="nav-link text-white"> Beranda</a> </li>
<li class="nav-item dropdown">
<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white dropdown-toggle">Data Master</a>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-> shadow"> <li><a href="outlet.php" class="dropdown-item">Data Outlet</a></li> <li><a href="paket.php" class="dropdown-item">Data Paket</a></li> <li><a href="pengguna.php" class="dropdown-item">Data Pengguna</a></li> </ul>
</li>
<li class="nav-item">
<a href="pelanggan.php" class="nav-link text-white">Registrasi Pelanggan</a>
</li>
<li class="nav-item">
<a href="transaksi.php" class="nav-link text-white">Entri Transaksi</a> </li>
<li class="nav-item">
</li>
<li class="nav-item">
<a href="laporan.php" class="nav-link text-white">Laporan</a> </li>
<?php } ?>


<?php if ($_SESSION['role'] == "kasir") { ?>

<li class="nav-item">
<a href="index.php" class="nav-link text-white"> Beranda</a>
</li>
<li class="nav-item">
<a href="pelanggan.php" class="nav-link text-white">Registrasi Pelanggan</a> </li>
<li class="nav-item">
<a href="transaksi.php" class="nav-link text-white">Entri Transaksi</a> </li>
<li class="nav-item">
<a href="laporan.php" class="nav-link text-white">Laporan</a> </li>
<?php } ?>
<?php if ($_SESSION['role'] == "owner") { ?>
<li class="nav-item">
<a href="index.php" class="nav-link text-white text-white"> Beranda</a> </li>
<li class="nav-item">
<a href="laporan.php" class="nav-link text-white">Laporan</a> </li>
<?php } ?>
</ul>
</div>
<!-- Right navbar links -->
<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
<li class="nav-item">
<a href="../logout.php" class="btn btn-block bg-gradient-light btn-md"> <i class="fas fa-user"></i> <b>Logout</b>
</a>
</li>
</ul>
</div>
</nav>