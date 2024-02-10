<?php
include '../layouts/header.php';
?>

<!-- /.content-header -->
<script>
    window.addEventListener("load", function() {
        window.print();
    });
</script>

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <center><h2>Data Laporan</h2></center>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if (isset($_GET['info'])) {
                            if ($_GET['info'] == "hapus") {
                                ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-trash"></i> Sukses</h5>
                                    Data berhasil dihapus
                                </div>
                            <?php } else if ($_GET['info'] == "simpan") { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Sukses</h5>
                                    Data berhasil disimpan
                                </div>
                            <?php } else if ($_GET['info'] == "update") { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-edit"></i> Sukses</h5>
                                    Data berhasil diupdate
                                </div>
                            <?php }
                        }
                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama Member</th>
                                    <th>Jenis Paket</th>
                                    <th>Nama Outlet</th>
                                    <th>Berat Cucian</th>
                                    <th>Biaya Tambahan</th>
                                    <th>Total Bayar</th>
                                    <th style="width: 150px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                include "../koneksi.php";
                                $tb_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi where dibayar='dibayar'");
                                while ($d_tb_transaksi = mysqli_fetch_array($tb_transaksi)) {
                                    $tb_outlet = mysqli_query($koneksi, "SELECT * FROM tb_outlet where id='$d_tb_transaksi[id_outlet]'");
                                    while ($d_tb_outlet_d = mysqli_fetch_array($tb_outlet)) {
                                        $tb_member = mysqli_query($koneksi, "SELECT * FROM tb_member where id='$d_tb_transaksi[id_member]'");
                                        while ($d_tb_member_d = mysqli_fetch_array($tb_member)) {
                                            $tb_user = mysqli_query($koneksi, "SELECT * FROM tb_user where id='$d_tb_transaksi[id_user]'");
                                            while ($d_tb_user_d = mysqli_fetch_array($tb_user)) {
                                                ?>
                                                <?php
                                                if ($d_tb_transaksi['status'] == 'diambil') {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?= $d_tb_transaksi['kode_invoice'] ?></td>
                                                        <td><?= $d_tb_member_d['nama'] ?></td>
                                                        <td>
                                                            <?php
                                                            $tb_paket = mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                                            while ($d_tb_paket_d = mysqli_fetch_array($tb_paket)) {
                                                            ?>
                                                                <?= $d_tb_paket_d['nama_paket'] ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= $d_tb_outlet_d['nama'] ?></td>
                                                        <td>
                                                            <?= $d_tb_transaksi['qty'] ?>
                                                            <?php
                                                            $tb_paket = mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                                            while ($d_tb_paket_d = mysqli_fetch_array($tb_paket)) {
                                                            ?>
                                                                <?= $d_tb_paket_d['jenis'] ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>Rp. <?= number_format($d_tb_transaksi['biaya_tambahan']) ?></td>
                                                        <td>
                                                            <?php
                                                            if ($d_tb_transaksi['id_paket'] == '0') { ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                $tb_paket = mysqli_query($koneksi, "SELECT * FROM tb_paket where id='$d_tb_transaksi[id_paket]'");
                                                                while ($d_tb_paket_d = mysqli_fetch_array($tb_paket)) {
                                                                    $a = $d_tb_paket_d['harga'];
                                                                }
                                                                $b = $d_tb_transaksi['qty'];
                                                                $c = $d_tb_transaksi['biaya_tambahan'];
                                                                $total = ($a * $b) + $c;
                                                                echo "Rp. $total";
                                                                ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <?php
                                                                        if ($d_tb_transaksi['status'] == 'baru') { ?>
                                                                            <p class="btn btn-default btn-sm">Baru</p>
                                                                        <?php } else if ($d_tb_transaksi['status'] == 'proses') { ?>
                                                                            <p class="btn btn-warning btn-sm">Proses</p>
                                                                        <?php } else if ($d_tb_transaksi['status'] == 'selesai') { ?>
                                                                            <p class="btn btn-primary btn-sm">Selesai</p>
                                                                        <?php } else { ?>
                                                                            <p class="btn btn-success btn-sm">Diambil</p>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($d_tb_transaksi['id_paket'] == '@') { ?>
                                                                        <?php } else { ?>
                                                                            <?php if ($d_tb_transaksi['dibayar'] == 'dibayar') { ?>
                                                                                <p class="btn btn-success btn-sm">Dibayar</p>
                                                                            <?php } else { ?>
                                                                                <p class="btn btn-danger btn-sm">Belum Dibayar</p>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <div class="modal fade" id="modal-pilih-paket<?php echo $d_tb_transaksi['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Pilih Paket</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="simpan-transaksi.php" method="post">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $d_tb_transaksi['id']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paket">Pilih Paket</label>
                                                        <select name="id_paket" class="form-control" id="paket" required>
                                                            <?php
                                                            $tb_paket = mysqli_query($koneksi, "SELECT * FROM tb_paket");
                                                            while ($d_tb_paket = mysqli_fetch_array($tb_paket)) {
                                                            ?>
                                                                <option value="<?php echo $d_tb_paket['id']; ?>"><?php echo $d_tb_paket['nama_paket']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Pilih</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<?php include '../layouts/footer.php'; ?>
