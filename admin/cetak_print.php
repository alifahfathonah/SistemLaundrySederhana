<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK LAPORAN LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
<?php
session_start();
if ($_SESSION['status']!="login"){
    header("location:../index.php?pesan=not-login");
}
include "../koneksi.php";
?>

<div class="container mt-5">
    <h4 class="text-center mb-4"><b>LAUNDRY DHANIAFFA</b></h4>
    <?php
    if (isset($_GET['dari']) && isset($_GET['sampai'])){
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai']; ?>
        <div class="card">
            <div class="card-header">
                <h4>Data Laporan Laundry Dari <b><?php echo $dari;?></b> Sampai <b><?php echo $sampai;?></b></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">NO</th>
                        <th>INVOICE</th>
                        <th>TANGGAL</th>
                        <th>PELANGGAN</th>
                        <th>BERAT</th>
                        <th>TGL. SELESAI</th>
                        <th>HARGA</th>
                        <th>STATUS</th>
                    </tr>

                    <?php
                    include "../koneksi.php";
                    $query = mysqli_query($koneksi, "select * from transaksi,pelanggan where transaksi_pelanggan=pelanggan_id and date(transaksi_tgl)>='$dari' and date(transaksi_tgl)<='$sampai' order by transaksi_id desc");
                    $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    $counter = 1;
                    foreach ($hasil as $item){
                        ?>
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td><?php echo "INVOICE-".$item['transaksi_id'];?></td>
                            <td><?php echo $item['transaksi_tgl'];?></td>
                            <td><?php echo $item['pelanggan_nama'];?></td>
                            <td><?php echo $item['transaksi_berat'];?></td>
                            <td><?php echo $item['transaksi_tgl_selesai'];?></td>
                            <td><?php echo "Rp. ".number_format($item['transaksi_harga'],2,',','.');?></td>
                            <td><?php
                                if ($item['transaksi_status']=="0"){
                                    echo "Sedang Diproses";
                                } elseif ($item['transaksi_status']=="1"){
                                    echo "Sedang Dicuci";
                                } elseif ($item['transaksi_status']=="2"){
                                    echo "Selesai";
                                }
                                ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>