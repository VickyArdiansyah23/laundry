<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Validate that $id is not empty and is a numeric value
if (!empty($id) && is_numeric($id)) {
    // menghapus data dari database
    $query = "DELETE FROM tb_user WHERE id = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // mengalihkan halaman kembali ke index.php
    header("location:pengguna.php?info=hapus");
    exit(); // Ensure that no further code is executed after the redirect
} else {
    // Handle the case where the 'id' parameter is missing or invalid
    echo "Invalid user ID.";
}
?>
