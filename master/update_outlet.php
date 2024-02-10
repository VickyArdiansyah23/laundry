<?php
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

// update data ke database
mysqli_query($koneksi, "UPDATE tb_outlet SET nama= '$nama', alamat = '$alamat', tlp='$tlp' WHERE
id='$id'");
// mengalihkan halaman kembali ke index.php
header("location: outlet.php?info=update");
?>