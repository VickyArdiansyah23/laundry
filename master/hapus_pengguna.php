<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
$cek = mysqli_query($koneksi,"DELETE FROM tb_user WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
if ($cek) {
    header("location:pengguna.php?info=hapus");
}

?>