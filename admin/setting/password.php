<?php
include '../../koneksi.php';

$new = md5($_POST['password']);

mysqli_query($koneksi, "update admin set password='$new'");

header('location:../GantiPassword.php?pesan=berhasil');