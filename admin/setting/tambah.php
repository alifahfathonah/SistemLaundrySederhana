<?php
include "../../koneksi.php";

$nama = $_POST['nama'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "insert into pelanggan set pelanggan_nama='$nama',pelanggan_hp='$no', pelanggan_alamat='$alamat'");

header('location:../add_pelanggan.php?pesan=berhasil');