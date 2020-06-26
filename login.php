<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");

$check = mysqli_num_rows($query);

if ($check>0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header('location:admin/index.php');
} else{
    header('location:index.php?pesan=salah');
}