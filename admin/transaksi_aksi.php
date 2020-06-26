<?php
include '../koneksi.php';

$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$tgl_hari_ini = date('Y-m-d');
$status = 0;

$query_harga = mysqli_query($koneksi, "select * from harga");
$hargaKg = mysqli_fetch_assoc($query_harga);

$harga = $berat * $hargaKg['harga_per_kilo'];

mysqli_query($koneksi, "insert into transaksi set transaksi_tgl='$tgl_hari_ini', transaksi_pelanggan='$pelanggan', transaksi_harga='$harga', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status'");

$id_terakhir = mysqli_insert_id($koneksi);

$jenis_pakaian=$_POST['jenis_pakaian'];
$jumlah_pakaian=$_POST['jumlah_pakaian'];

for ($x=0;$x<count($jenis_pakaian);$x++){
    if ($jenis_pakaian[$x]!=""){
        mysqli_query($koneksi, "insert into pakaian set pakaian_transaksi='$id_terakhir', pakaian_jenis='$jenis_pakaian[$x]', pakaian_jumlah='$jumlah_pakaian[$x]'");
    }
}

header("location:transaksi.php");