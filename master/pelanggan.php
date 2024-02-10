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
                    <h1 class="m-0">Data Pelanggan</h1> <!-- Fix the typo here -->
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
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"> <!-- Fix the space here -->
                                    <i class="fas fa-plus"></i> Tambah Data
                                </button> 
                            </div> 
                        </div> 
                        <!-- /.card-header --> 

                        <div class="card-body"> 
                            <?php  
                            if(isset($_GET['info'])){ 
                                if($_GET['info']=="hapus"){ ?> 
                                    <div class="alert alert-success alert-dismissible"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        <h5><i class="icon fas fa-trash"></i> Sukses</h5> 
                                        Data berhasil di hapus
                                    </div> 
                                <?php } else if($_GET['info'] == "simpan"){ ?> 
                                    <div class="alert alert-success alert-dismissible"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        <h5><i class="icon fas fa-check"></i> Sukses</h5> 
                                        Data berhasil di simpan 
                                    </div> 
                                <?php }else if($_GET['info'] == "update"){ ?> 
                                    <div class="alert alert-success alert-dismissible"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        <h5><i class="icon fas fa-edit"></i> Sukses</h5> 
                                        Data berhasil di update 
                                    </div> 
                                <?php } 
                            } ?> 

                            <table class="table table-bordered"> 
                                <thead> 
                                    <tr class="bg-primary text-center"> 
                                        <th style="width: 10px">No</th> 
                                        <th>Nama</th> 
                                        <th>Alamat</th> 
                                        <th>Jenis Kelamin</th> 
                                        <th>Telepon</th> 
                                        <th style="width: 200px">Aksi</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php 
                                    $no = 1; 
                                    include "../koneksi.php"; 
                                    $tb_member = mysqli_query($koneksi, "SELECT * FROM tb_member"); 
                                    while($d_tb_member = mysqli_fetch_array($tb_member)){ 
                                    ?> 
                                    <tr> 
                                        <td class="bg-dark text-center"><b><?php echo $no++; ?></b></td> 
                                        <td><?=$d_tb_member['nama']?></td> 
                                        <td><?=$d_tb_member['alamat']?></td> 
                                        <td> 
                                            <?php 
                                            if ($d_tb_member['jenis_kelamin'] == 'L') { ?> 
                                                Laki-Laki 
                                            <?php } else { ?> 
                                                Perempuan 
                                            <?php } ?> 
                                        </td> 
                                        <td><?=$d_tb_member['tlp']?></td> 
                                        <td class="text-center"> 
                                            <button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modal-edit<?php echo $d_tb_member['id']; ?>">
                                                <i class="fas fa-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_tb_member['id']; ?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button> 
                                        </td> 
                                    </tr>
                                    <div class="modal fade" id="modal-hapus<?php echo $d_tb_member['id']; ?>"> 
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title text-danger">Hapus Data Pelanggan</h4> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                                        <span aria-hidden="true">&times;</span> 
                                                    </button> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <p>Apakah anda yakin akan menghapus data <b><?php echo $d_tb_member['nama'] ?></b>...?</p> 
                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button> 
                                                    <a href="hapus_pelanggan.php?id=<?php echo $d_tb_member['id']; ?>" class="btn btn-danger">Hapus</a> 
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="modal fade" id="modal-edit<?php echo $d_tb_member['id']; ?>"> 
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title text-warning">Edit Data <?= $d_tb_member['nama']; ?></h4> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                                        <span aria-hidden="true">&times;</span> 
                                                    </button> 
                                                </div> 
                                                <form method="post" action="update_pelanggan.php"> 
                                                    <div class="modal-body"> 
                                                        <div class="form-group"> 
                                                            <label>Nama Pelanggan</label> 
                                                            <input type="text" name="id" value="<?php echo $d_tb_member['id']; ?>" hidden> 
                                                            <input type="text" name="nama" value="<?php echo $d_tb_member['nama']; ?>" class="form-control" placeholder="Masukan Nama Pelanggan"> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Alamat</label> 
                                                            <textarea name="alamat" class="form-control" rows="3"><?php echo $d_tb_member['alamat']; ?></textarea> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Jenis Kelamin</label> 
                                                            <select class="form-control" name="jenis_kelamin"> 
                                                                <option>--- Pilih Jenis Kelamin ---</option> 
                                                                <option value="L" <?php if('L' == $d_tb_member['jenis_kelamin']){ echo 'selected'; } ?>>Laki-Laki</option> 
                                                                <option value="P" <?php if('P' == $d_tb_member['jenis_kelamin']){ echo 'selected'; } ?>>Perempuan</option> 
                                                            </select> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Telepon</label> 
                                                            <input type="text" name="tlp" value ="<?php echo $d_tb_member['tlp']; ?>" class="form-control" placeholder="Masukan No Telephone"> 
                                                        </div> 
                                                    </div> 
                                                    <div class="modal-footer"> 
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button> 
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
                                                    <h4 class="modal-title text-primary">Tambah Data Pelanggan</h4> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                                        <span aria-hidden="true">&times;</span> 
                                                    </button> 
                                                </div> 
                                                <form method="post" action="simpan_pelanggan.php"> 
                                                    <div class="modal-body"> 
                                                        <div class="form-group"> 
                                                            <label>Nama Pelanggan</label> 
                                                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pelanggan" required> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Alamat</label> 
                                                            <textarea name="alamat" class="form-control" rows="3" required></textarea> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Jenis Kelamin</label> 
                                                            <select required class="form-control" name="jenis_kelamin"> 
                                                                <option>--- Pilih Jenis Kelamin ---</option> 
                                                                <option value="L">Laki-Laki</option> 
                                                                <option value="P">Perempuan</option> 
                                                            </select> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                            <label>Telepon</label> 
                                                            <input type="text" name="tlp" class="form-control" placeholder="Masukan No Telephone" required> 
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
            <!-- /.row --> 
        </div><!-- /.container-fluid --> 
    </div><!-- /.content --> 
</div> 

<?php 
include '../layouts/footer.php'; 
?>
