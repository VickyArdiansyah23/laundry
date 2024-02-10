<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tb_outlet VALUES('','$nama','$alamat','$tlp')");

// mengalihkan halaman kembali index.php
header("location:outlet.php?info=simpan");

?>