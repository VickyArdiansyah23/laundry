<?php
include '../layouts/header.php' ;
include '../layouts/navbar.php' ;

require '../koneksi.php';
$alloutlet1 = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
$alloutlet2 = mysqli_num_rows($alloutlet1) ;

$allpaket1 = mysqli_query($koneksi, "SELECT * FROM tb_paket");
$allpaket2 = mysqli_num_rows($allpaket1) ;

$alluser1 = mysqli_query($koneksi, "SELECT * FROM tb_user");
$alluser2 = mysqli_num_rows($alluser1);

$allmember1 = mysqli_query($koneksi, "SELECT * FROM tb_member");
$allmember2 = mysqli_num_rows($allmember1) ;

$alltransaksil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
$alltransaksi2 = mysqli_num_rows($alltransaksil);

$alllaporan1 = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi");
$alllaporan2 = mysqli_num_rows($alllaporan1) ;
?>

<div class="content-wrapper">
<div class="content">
<div class="container-fluid">
<br>
<div class="row">
<div class="col-md-6">
<h3 >Dashboard</h3>
</div>
<div class="col-md-6 text-right pr-3 ">
<?= date("d-m-y"); ?>
</div>
</div>
<hr>
</div>
</div>
<br>
<h2 class="text-center"> <b>SELAMAT DATANG DI HALAMAN OWNER</b> </h2>
<div class="content">
<div class="container-fluid">
<h3>Informasi Data</h3>
<br>

<div class="row">
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-primary">
<div class="inner">
<h3> <?= $alllaporan2 ?></h3>
<p>Data Laporan</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="laporan.php" class="small-box-footer">Selengkapnya</a>
</div>
</div>
<!--/.col-md-6 -->
</div>
<!--/.row -->
</div>
</div>
</div>
<?php
include '../layouts/footer.php';
?>