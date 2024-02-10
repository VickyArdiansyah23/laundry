<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

// update data ke database
mysqli_query($koneksi, "UPDATE tb_member SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp='$tlp' WHERE id='$id'");

// mengalihkan halaman kembali ke pelanggan.php dengan info update
header("location:pelanggan.php?info=update");
?>