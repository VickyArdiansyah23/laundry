<?php
// koneksi database
include '../koneksi.php';

// mendapatkan data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];

// update data ke database
$query = mysqli_query($koneksi, "UPDATE tb_user SET nama='$nama', username='$username', password='$password', id_outlet='$id_outlet', role='$role' WHERE id='$id'");

if ($query) {
    header("location:pengguna.php?info=update");
}
?>
