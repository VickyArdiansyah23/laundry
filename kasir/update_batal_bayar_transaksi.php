<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id =$_POST['id'];
// update data ke database
mysqli_query($koneksi,"UPDATE tb_transaksi SET dibayar='belum_dibayar' WHERE id='$id'");
mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE id_transaksi='$id'");

//mengalihkan halaman kembali ke index.php
header("location:transaksi.php?info=update");
?>