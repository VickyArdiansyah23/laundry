<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$id_paket = $_POST['id_paket'];

// update data ke database
mysqli_query($koneksi, "UPDATE tb_transaksi SET id_paket='$id_paket' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location: transaksi.php?info=update");
?>
