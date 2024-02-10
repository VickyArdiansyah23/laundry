<?php
include '../layouts/header.php';
include '../layouts/navbar.php';

require '../koneksi.php';

$alloutletl = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
$alloutlet2 = mysqli_num_rows($alloutletl);

$allpaketl = mysqli_query($koneksi, "SELECT * FROM tb_paket");
$allpaket2 = mysqli_num_rows($allpaketl);

$alluserl = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role='admin'");
$alluser2 = mysqli_num_rows($alluserl);

$allmemberl = mysqli_query($koneksi, "SELECT * FROM tb_member");
$allmember2 = mysqli_num_rows($allmemberl);

$alltransaksil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
$alltransaksi2 = mysqli_num_rows($alltransaksil);

$alllaporanl = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi");
$alllaporan2 = mysqli_num_rows($alllaporanl);
?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-md-6 text-right pr-3">
                    <?= date("d-m-y"); ?>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <br>
    <h2 class="text-center"> <b>SELAMAT DATANG DI HALAMAN ADMIN</b> </h2>

    <div class="content">
        <div class="container-fluid">
            <h3>Informasi Data</h3>
            <br>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $alloutlet2 ?></h3>
                            <p>Data Outlet</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="outlet.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $allpaket2 ?></h3>
                            <p>Data Paket</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="paket.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $alluser2 ?></h3>
                            <p>Data Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="pengguna.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $allmember2 ?></h3>
                            <p>Data Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="pelanggan.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $alltransaksi2 ?></h3>
                            <p>Data Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="transaksi.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $alllaporan2 ?></h3>
                            <p>Data Laporan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="laporan.php" class="small-box-footer">Selengkapnya</a>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>

<?php
include '../layouts/footer.php';
?>
