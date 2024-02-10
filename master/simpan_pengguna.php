<?php
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5 ($_POST['password']);
$id_outlet = $_POST['id_outlet'];
$role= $_POST['role'];
// menginput data ke database
$cek = mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$nama', '$username', '$password',' $id_outlet', '$role')");
// mengalihkan halaman kembali ke index.php
if ($cek) {
    header("location: pengguna.php?info=simpan");
}

?>