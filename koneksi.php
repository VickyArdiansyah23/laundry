<?php
$koneksi = mysqli_connect("localhost","root","","vicky_laundry");

// Check connection
if (mysqli_connect_errno()){
    echo"koneksi database gagal : " . mysqli_connect_error();
}
?>