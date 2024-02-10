<?php
// koneksi database
include '../koneksi.php';
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
// menghapus data dari database
$query=mysqli_query($koneksi, "DELETE FROM tb_outlet WHERE id='$id'");
if($query){
    header("location:outlet.php?info=hapus");
    }else{
        header("location:outlet.php?info=gagal");
    }
?>