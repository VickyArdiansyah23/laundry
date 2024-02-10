<?php
// koneksi database
include '../koneksi.php';
// menangkap data id yang di kirim dari url 
$id = $_GET['id'];
// menghapus data dari database
$query=mysqli_query($koneksi,"delete from tb_transaksi where id='$id'");
// mengalihkan halaman kembali ke index.php 
if($query){
    header("location:transaksi.php?info=hapus");
    }else{
        header("location:transaksi.php?info=bayar");
    }
?>
