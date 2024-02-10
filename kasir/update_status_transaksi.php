<?php
// koneksi database
include '../koneksi.php';

//menangkap data yang di kirim dari form
$id = $_POST['id'];
$status = $_POST['status'];
// update data ke database
mysqli_query($koneksi,"UPDATE tb_transaksi SET status='$status' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:transaksi.php?info=update");
?>