<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Laundry - Invoice</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <script type="text/javascript" src="../../assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0"
<?php
session_start();
if ($_SESSION['status']!="login"){
    header("location:../../index.php?pesan=not-login");
}
include "../../koneksi.php";
?>
<div class="container mt-5">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi, "select * from transaksi, pelanggan where transaksi_id='$id' and transaksi_pelanggan=pelanggan_id");
                $result = mysqli_fetch_all($transaksi, MYSQLI_ASSOC);
                foreach ($result as $item){ ?>
                    <center><h2>LAUNDRY <b>DHANIAFFA</b></h2></center>
                    <br>
                    <br>
                    <table class="table">
                        <tr>
                            <th width="20%">No. Invoice</th>
                            <th>:</th>
                            <td width="80%">INVOICE-<?php echo $item['transaksi_id'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tanggal Laundry</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['transaksi_tgl'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Pelanggan</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['pelanggan_nama'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">No. telepon</th>
                            <th>:</th>
                            <td width="80%"><?php echo "0".$item['pelanggan_hp'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat Pelanggan</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['pelanggan_alamat'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Berat Cucian</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['transaksi_berat']." Kg";?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Pelanggan</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['pelanggan_nama'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tanggal Selesai</th>
                            <th>:</th>
                            <td width="80%"><?php echo $item['transaksi_tgl_selesai'];?></td>
                        </tr>
                        <tr>
                            <th width="20%">Status</th>
                            <th>:</th>
                            <td width="80%"><?php
                                if ($item['transaksi_status']=="0"){
                                    echo "Belum Dicuci";
                                } elseif ($item['transaksi_status']=="1"){
                                    echo "Sedang Dicuci";
                                } elseif ($item['transaksi_status']=="2"){
                                    echo "Selesai";
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Total Harga</th>
                            <th>:</th>
                            <td width="80%"><?php echo "Rp ".number_format($item['transaksi_harga'], 2,",",".");?></td>
                        </tr>
                    </table>
                    <br>

                    <h4 class="text-center">Daftar Cucian</h4>
                    <div class="dropdown-divider"></div>
                    <table class="table table-striped table-bordered text-center">
                        <br>
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="20%">Jumlah</th>
                        </tr>
                        <?php
                        $id = $item['transaksi_id'];
                        $pakaian = mysqli_query($koneksi, "select * from pakaian where pakaian_transaksi='$id'");
                        $hasil = mysqli_fetch_all($pakaian, MYSQLI_ASSOC);
                        foreach ($hasil as $list){
                            ?>
                            <tr>
                                <td><?php echo $list['pakaian_jenis'];?></td>
                                <td><?php echo $list['pakaian_jumlah'];?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <br>
                    <p class="text-sm-center"><i>*TERIMA KASIH TELAH MEMPERCAYAKAN CUCIAN ANDA PADA KAMI*</i></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>