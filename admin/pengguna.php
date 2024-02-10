<?php
include '../layouts/header.php';
include '../layouts/navbar.php'; 
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<brxbr>
<div class="container">
<div class="row mb-2">
<div class="col-sm-12 text-center">
<hl class="m-0"> Data Pengguna</hl>
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
<div class="card-tools">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
<i class="fas fa-plus"></i> Tambah Data</button>
</div>
</div>
<!-- /.card-header -->
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr class="bg-primary text-center">
<th style="width: 10px">No</th>
<th>Nama</th>
<th>Username</th>
<th>Nama Outlet</th>
<th>Akses</th>
<th style="width: 200px">Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
include "../koneksi.php";
$id_outlet = $_SESSION['id_outlet'];
$tb_user = mysqli_query($koneksi, "SELECT * FROM tb_user where id_outlet = $id_outlet");
while ($d_tb_user = mysqli_fetch_array($tb_user)) {
$tb_outlet_d = mysqli_query($koneksi, "SELECT * FROM tb_outlet where id='$d_tb_user[id_outlet]'");
while ($d_tb_outlet_d = mysqli_fetch_array($tb_outlet_d)) { ?>
<tr>
<td class="text-center bg-dark"><b> <?php echo $no++; ?></b></td>
<td><?= $d_tb_user['nama'] ?></td>
<td><?= $d_tb_user['username'] ?></td>
<td><?= $d_tb_outlet_d['nama'] ?></td>
<td><?= $d_tb_user['role'] ?></td>
<td class="text-center">
<button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modal-edit<?php echo $d_tb_user['id']; ?>"><i class="fas fa-edit"></i> Ubah</button>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_tb_user['id']; ?>"><i class="fas fa-trash"></i> Hapus</button>
</td>
</tr>
<div class="modal fade" id="modal-hapus<?php echo $d_tb_user['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-danger">Hapus Data Pengguna</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">	
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p>Apakah anda yakin akan menghapus data <b><?php echo $d_tb_user['nama'];?></b>...?</p>
</div>
<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
<a href="hapus_pengguna.php?id=<?php echo $d_tb_user['id']; ?>" class="btn btn-danger">Hapus</a>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="modal-edit<?php echo $d_tb_user['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-warning">Edit Data <?php echo
$d_tb_user['nama'];	?></h4>
<button type="button" class="close" data-dismiss="modal" aria-
label="Close">	<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="post" action="update_pengguna.php">
<div class="modal-body">
<div class="form-group">
<label>Nama Pengguna</label>
<input type="text" name="id" value="<?php echo $d_tb_user['id']; ?>" hidden>			  
<input type="text" name="nama" value="<?php echo $d_tb_user['nama'];	?> "class= "form-control" placeholder= "Masukan Nama Pengguna" >
</div>
<div class="form-group">
<label>Username</label>

<input type="text" name="username" value="<?php echo
$d_tb_user['username']; ?>" class="form-control" placeholder="Masukan Username">
	</div>
<div class="form-group">
<label>Password</label>

<input type="password" name="password" class="form-control" placeholder="Masukan Password" required="">
	</div>
<div class="form-group">
<label>Nama Outlet</label>
<select class="form-control" name="id_outlet">
<option>--- Pilih Nama Outlet ---</option>
	<?php
include "../koneksi.php";
$tb_outlet = mysqli_query($koneksi, "SELECT * FROM tb_outlet");	
while ($d_tb_outlet = mysqli_fetch_array($tb_outlet)) { ?>
<option value="<?= $d_tb_outlet['id'] ?>" <?php if ($d_tb_outlet['id'] == $d_tb_user['id_outlet']) {echo 'selected' ;} ?>><?=
$d_tb_outlet['nama'] ?></option>
	<?php } ?>
</select>
</div>
<div class="form-group">
<label>Akses</label>
<select class="form-control" name="role">
<option>— Silahkan Pilih Akses —</option>
<option value="admin">Admin</option>
<option value="kasir">Kasir</option>
<option value="owner">Owner</option>
<option value="master">Master</option></select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
<button type="submit" class="btn btn-warning text-white">
Perbarui</button>	
</div>
</form>
</div>
</div>
</div>
<?php }
} ?>
<div class="modal fade" id="modal-tambah">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-primary">Tambah Data Pengguna</h4>
<button type="button" class="close" data-dismiss="modal" aria-
label="Close">	<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="post" action="simpan_pengguna.php">
<div class="modal-body">

<div class="form-group">
<label>Nama Pengguna</label>

<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengguna">
</div>
<div class="form-group">
<label>Username</label>

<input type="text" name="username" class="form-control" placeholder="Masukan Username">
	</div>
<div class="form-group">
<label>Password</label>

<input type="password" name="password" class="form-control" placeholder="Masukan Password">
	</div>
<div class="form-group">
<label>Nama Outlet</label>
<select class="form-control" name="id_outlet">
<option>— Pilih Nama Outlet —</option>
<?php
include "../koneksi.php";
$tb_outlet = mysqli_query($koneksi, "SELECT * FROM
tb_outlet");	while ($d_tb_outlet = mysqli_fetch_array($tb_outlet)) { ?>

<option value="<?= $d_tb_outlet['id'] ?>"><?= $d_tb_outlet['nama'] ?></option>
	<?php } ?>
</select>
</div>
<div class="form-group">
<label>Akses</label>
<select class="form-control" name="role">
<option>— Silahkan Pilih Akses —</option>
<option value="admin">Admin</option>
<option value="kasir">Kasir</option>
<option value="owner">Owner</option>
<option value="master">Master</option></select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>	
<button type="submit" class="btn btn-primary">Simpan</button>
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
<!-- /•row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<?php
include '../layouts/footer.php';
?>
