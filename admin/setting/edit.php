<?php
include '../../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$no = $_POST['no'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE pelanggan SET pelanggan_nama='$nama', pelanggan_hp='$no', pelanggan_alamat='$alamat' WHERE pelanggan_id='$id'");
header("location: ../edit_pelanggan.php?pesan=berhasil&id=$id");
?>