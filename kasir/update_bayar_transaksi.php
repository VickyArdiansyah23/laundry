<?php
// koneksi database
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$id_transaksi = isset($_POST['id_transaksi']) ? intval($_POST['id_transaksi']) : 0;
$id_paket = isset($_POST['id_paket']) ? intval($_POST['id_paket']) : 0;
$qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0;

// Menghindari SQL Injection
$id_transaksi = mysqli_real_escape_string($koneksi, $id_transaksi);
$id_paket = mysqli_real_escape_string($koneksi, $id_paket);
$qty = mysqli_real_escape_string($koneksi, $qty);

// Memastikan nilai-nilai yang diharapkan sesuai dengan kebutuhan bisnis
if ($id_transaksi > 0 && $id_paket > 0 && $qty > 0) {
    // Pastikan bahwa id_transaksi ada di tb_transaksi
    $query_check_transaksi = "SELECT id FROM tb_transaksi WHERE id = $id_transaksi";
    $result_check_transaksi = mysqli_query($koneksi, $query_check_transaksi);

    if ($result_check_transaksi && mysqli_num_rows($result_check_transaksi) > 0) {
        // Insert data ke tb_detail_transaksi
        $query_insert_detail = "INSERT INTO tb_detail_transaksi VALUES(NULL, '$id_transaksi', '$id_paket', '$qty', 'done')";
        mysqli_query($koneksi, $query_insert_detail);

        // Mengalihkan halaman kembali ke halaman terkait atau memberikan respons sesuai kebutuhan
        header("location:halaman_tertentu.php?info=insert_success");
    } else {
        // id_transaksi tidak ditemukan di tb_transaksi
        echo "ID Transaksi tidak valid.";
    }
} else {
    // Handle kesalahan atau kembalikan pesan kesalahan kepada pengguna
    echo "Terjadi kesalahan pada data yang dikirimkan.";
    // Anda juga dapat mengalihkan ke halaman error atau melakukan tindakan lain sesuai kebutuhan.
}

mysqli_query($koneksi, "UPDATE tb_transaksi SET dibayar='dibayar' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php

header("location:transaksi.php?info=update");
?>