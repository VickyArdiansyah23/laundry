<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5 ($_POST['password']);
$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' and password= '$password'");
$cek = mysqli_num_rows($login);

 if($cek > 0) {
$data = mysqli_fetch_assoc($login);
if($data['role'] == "admin"){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['role'] = "admin";
$_SESSION['id_outlet'] = $data['id_outlet'];
header("location:admin");
}else if($data['role'] == "kasir"){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = "kasir";
    $_SESSION['id_outlet'] = $data['id_outlet'];
    header("location:kasir");
}else if ($data['role'] == "master"){
    $_SESSION['password'] = $password;
    $_SESSION['username']= $username;
    $_SESSION['role'] = "master";
    $_SESSION['id_outlet'] = $data['id_outlet'];
    header("location:master");
}else if ($data['role'] == "owner"){
$_SESSION['password'] = $password;
$_SESSION['username']= $username;
$_SESSION['role'] = "owner";
$_SESSION['id_outlet'] = $data['id_outlet'];
header("location:owner");
}else{
header("location:login.php?info=gagal");
}
}else{
header("location:login.php?info=gagal");
}
?>