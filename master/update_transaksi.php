<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$id_member = $_POST['id_member'];
$kode_invoice = $_POST['kode_invoice'];
$id_outlet = $_POST['id_outlet'];
$qty = $_POST['qty'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$id_user = $_POST['id_user'];

// menginput data ke database
$query = mysqli_query($koneksi, "UPDATE tb_transaksi SET kode_invoice='$kode_invoice', id_member='$id_member', id_outlet='$id_outlet', qty='$qty', biaya_tambahan='$biaya_tambahan', id_user='$id_user' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php 
if ($query) {
    header("location:transaksi.php?info=update");
}
?>
