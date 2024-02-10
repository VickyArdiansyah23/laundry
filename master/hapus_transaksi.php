<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id =$_GET['id'];

// menghapus data dari database
$query=mysqli_query($koneksi,"DELETE FROM tb_transaksi WHERE id='$id'");

if($query){
    header("location:transaksi.php?info=hapus");
    }else{
        header("location:transaksi.php?info=bayar");
    }
?>