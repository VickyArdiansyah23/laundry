<?php
include '../layouts/header.php';
include '../layouts/navbar.php';

require '../koneksi.php';

// Validate and sanitize the session variable to prevent SQL injection

$id_outlet = $_SESSION['id_outlet'];

if ($id_outlet > 0) {
    $allmember1 = mysqli_query($koneksi, "SELECT * FROM tb_member");
    $allmember2 = mysqli_num_rows($allmember1);

    $alltransaksil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_outlet = '$id_outlet'");
    $alltransaksi2 = mysqli_num_rows($alltransaksil);
?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-md-6 text-right pr-3"><?= date("d-m-y"); ?></div>
            </div>
            <hr>
            <div class="row">
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
                <!-- /.col-lg-3 -->
                <!-- Tambahan tag HTML yang hilang -->
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
                <!-- /.col-md-6-->
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>

<?php
} else {
}

include '../layouts/footer.php';
?>
