<?php
// koneksi database
include '../koneksi.php';

// mendapatkan data yang dikirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

// insert data ke database
$query = mysqli_query($koneksi, "INSERT INTO tb_member VALUES('', '$nama', '$alamat', '$jenis_kelamin', '$tlp')");

if ($query) {
    header("location:pelanggan.php?info=simpan");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
