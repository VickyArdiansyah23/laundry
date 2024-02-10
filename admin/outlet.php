<?php
include '../layouts/header.php';
include '../layouts/navbar.php'; 
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<br><br>
<div class="container">
<div class="row mb-2">
<div class="col-sm-12 text-center">
<h1 class="m-0"> Data Outlet</h1>
</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
<div class="container">
<div class="row">
<!-- /.col-md-6 -->
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"> Outlet</h3>
<div class="card-tools">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="
#modal-tambah"><i class="fas fa-plus"></i> Tambah Data</button>
</button>
</div>
</div>
<!-- /.card-header -->
<div class="card-body">
<?php
if(isset($_GET['info'])){
if($_GET['info'] == "hapus"){ ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-trash"></i> Sukses</h5>
Data berhasil dihapus
</div>
<?php } else if($_GET['info'] == "simpan"){ ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Sukses</h5>
Data berhasil disimpan
</div>
<?php } else if($_GET['info'] == "update"){ ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-edit"></i> Sukses</h5>
Data berhasil diupdate
</div>
<?php } else if($_GET['info'] == "gagal"){ ?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-edit"></i> Gagal</h5>
Data gagal di hapus, data outlet masih ada di pengguna
</div>
<?php } } ?>
<table class="table table-bordered">
<thead>
<tr class="bg-primary text-center">
<th style="width: 10px">No</th>
<th> Nama Outlet</th>
<th>Alamat Outlet</th>
<th>Telepon Outlet</th>
<th style="width: 200px">Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
include "../koneksi.php";
$tb_outlet = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
while($d_tb_outlet = mysqli_fetch_array($tb_outlet)){
?>
<tr>
<td class="text-center bg-dark"><b><?php echo $no++; ?></b></td>
<td> <?=$d_tb_outlet['nama'] ?></td>
<td><?=$d_tb_outlet['alamat'] ?></td>
<td><?=$d_tb_outlet['tlp'] ?></td>
<td class="text-center">
<button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modal-edit<?php echo $d_tb_outlet['id']; ?>">
<i class="fas fa-edit"></i> Ubah</button>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_tb_outlet['id']; ?>">
<i class="fas fa-trash"></i> Hapus</button>	
</td>
</tr>
<div class="modal fade" id="modal-hapus<?php echo $d_tb_outlet['id']; ?>">	
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-danger">Hapus Data Outlet</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p>Apakah anda yakin akan menghapus data <b><?php echo $d_tb_outlet['nama']; ?></b> ini...?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
<a href="hapus_outlet.php?id=<?php echo $d_tb_outlet['id']; ?>" class="btn btn-danger">Hapus</a>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-edit<?php echo $d_tb_outlet['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-warning">Edit Data <?= $d_tb_outlet['nama']?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">	
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="post" action="update_outlet.php">
    <div class="modal-body">
        <div class="form-group">
            <label>Nomor</label>
            <input type="text" name="id" value="<?php echo $d_tb_outlet['id']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $d_tb_outlet['nama']; ?>" placeholder="Masukan Nama">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="3"><?php echo $d_tb_outlet['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="tlp" value="<?php echo $d_tb_outlet['tlp']; ?>" class="form-control" placeholder="Masukan Telephone">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-warning text-white">Perbarui</button>
    </div>
</form>
</div>
</div>
</div>
<?php } ?>



<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-primary">Tambah Data Outlet</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">	
    <span aria-hidden="true">&times;</span>
</button>
</div>
<form method="post" action="simpan_outlet.php">
<div class="modal-body">
<div class="form-group">
<label>Nama Outlet</label>
<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Outlet" required>
</div>
<div class="form-group">
<label>Alamat Outlet</label>
<textarea class="form-control" name="alamat" rows="3" placeholder="Masukan Alamat Outlet" required></textarea>
</div>
<div class="form-group">
<label>Telepon Outlet</label>
<input type="text" name="tlp" class="form-control" placeholder="Masukan Telepon Outlet" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
<button type="submit" class="btn btn-warning text-white">Perbarui</button>
</div>
</form>
</div>
</div>
</div>
</tbody>
</table>
</div>
</div>
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

<?php
include '../layouts/footer.php';
?>
