<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

// menginput data ke database
$query = "INSERT INTO tb_member VALUES('', '$nama', '$alamat', '$jenis_kelamin', '$tlp')";
$result = mysqli_query($koneksi, $query);

// mengecek apakah proses input data berhasil
if ($result) {
    // mengalihkan halaman kembali ke index.php dengan info=simpan
    header("location:pelanggan.php?info=simpan");
} else {
    // menampilkan pesan kesalahan jika query gagal dieksekusi
    echo "Error: " . mysqli_error($koneksi);
}

// tutup koneksi database
mysqli_close($koneksi);
?>
