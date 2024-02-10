<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang dikirim dari URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ID tidak diberikan.');

// menghapus data dari database dengan parameterisasi query
$query = "DELETE FROM tb_member WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);

// bind parameter
mysqli_stmt_bind_param($stmt, "i", $id);

// eksekusi statement
if (mysqli_stmt_execute($stmt)) {
    // mengalihkan halaman kembali ke pelanggan.php dengan info=hapus
    header("location:pelanggan.php?info=hapus");
} else {
    // menampilkan pesan kesalahan jika query gagal dieksekusi
    echo "Error: " . mysqli_error($koneksi);
}

// tutup statement
mysqli_stmt_close($stmt);

// tutup koneksi database
mysqli_close($koneksi);
?>
