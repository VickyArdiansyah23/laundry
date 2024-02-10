<?php 
// koneksi database
include '../koneksi.php';

//menangkap data yang dikirim dari form
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$id_outlet = $_POST['id_outlet'];
$qty = $_POST['qty'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$id_user = $_POST['id_user'];
$tgl = date('Y-m-d H:i');
$batas_waktu = date('Y-m-d H:i:s', strtotime('+6 days'));

//menginput data ke database
$query = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES('', '$id_outlet', '', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '', '$biaya_tambahan', '', '', 'baru', 'belum_bayar', '$qty', '', '$id_user')");
// echo $kode_invoice;
// echo $id_member;
// echo $id_outlet;
// echo $qty;
// echo $biaya_tambahan;
// echo $id_user;
// echo $tgl;
// echo $batas_waktu;
if($query){
    header("location:transaksi.php?info=simpan");
}
 // mengalihkan halaman kembali ke inde.php
 
 ?>