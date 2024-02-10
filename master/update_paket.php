<?php
// koneksi database
include '../koneksi.php';
$id = $_POST['id'];

// menangkap data yang di kirim dari form
$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga =$_POST['harga'];
// update data ke database
mysqli_query($koneksi, "UPDATE tb_paket SET id_outlet = '$id_outlet', jenis='$jenis', nama_paket='$nama_paket', harga='$harga' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:paket.php?info=update");
?>