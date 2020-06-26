<?php
include "../../koneksi.php";

$harga = $_POST['harga'];

mysqli_query($koneksi, "UPDATE harga set harga_per_kilo='$harga'");

header('location:../harga.php');