<?php
include 'header.php';
include "../koneksi.php";
?>
<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px"><b>Selamat Datang Di Laundry Dhaniaffa</b></h4>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Dashboard</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" onclick="location.href='pelanggan.php';" style="cursor: pointer;">
                    <div class="card bg-primary">
                        <div class="card-header text-white">
                            <h1>
                                <i class="fas fa-user text-white"></i>
                                <span class="float-lg-right text-white">
                                <?php
                                $pelanggan = mysqli_query($koneksi, "select * from pelanggan");
                                echo mysqli_num_rows($pelanggan);
                                ?>
                            </span>
                            </h1>
                            <br>
                            <b>Jumlah Pelanggan</b>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" onclick="location.href='transaksi.php';" style="cursor: pointer;">
                    <div class="card bg-warning">
                        <div class="card-header">
                            <h1>
                                <i class="fas fa-spinner"></i>
                                <span class="float-lg-right">
                                    <?php
                                    $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='0'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            <br>
                            <b>Cucian Yang Diproses</b>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" onclick="location.href='transaksi.php';" style="cursor: pointer;">
                    <div class="card" style="background: lightskyblue">
                        <div class="card-header">
                            <h1>
                                <i class="fas fa-tshirt"></i>
                                <span class="float-lg-right">
                                    <?php
                                    $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='1'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            <br>
                            <b>Cucian Yang Sedang Dicuci</b>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" onclick="location.href='transaksi.php';" style="cursor: pointer;">
                    <div class="card" style="background: lightgreen">
                        <div class="card-header">
                            <h1>
                                <i class="far fa-check-circle"></i>
                                <span class="float-lg-right">
                                    <?php
                                    $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='2'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            <br>
                            <b>Cucian Yang Sudah Selesai</b>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <div class="card">
        <div class="card-header">
            <h4>Riwayat Transaksi Terkini</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td width="1%">No</td>
                    <td>Invoice</td>
                    <td>Tanggal</td>
                    <td>Pelanggan</td>
                    <td>Berat</td>
                    <td>Tgl. Selesai</td>
                    <td>Harga</td>
                    <td>Status</td>
                </tr>
                <?php
                $data= mysqli_query($koneksi, "select * from transaksi,pelanggan where transaksi_pelanggan=pelanggan_id order by transaksi_id desc  limit 5");
                $hasil = mysqli_fetch_all($data, MYSQLI_ASSOC);
                $count = 1;
                foreach ($hasil as $item){
                ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo "INVOICE-".$item['transaksi_id'];?></td>
                    <td><?php echo $item['transaksi_tgl'];?></td>
                    <td><?php echo $item['pelanggan_nama'];?></td>
                    <td><?php echo $item['transaksi_berat'];?></td>
                    <td><?php echo $item['transaksi_tgl_selesai'];?></td>
                    <td><?php echo $item['transaksi_harga'];?></td>
                    <td><?php
                        if ($item['transaksi_status']=="0"){
                            echo "Sedang Diproses";
                        }elseif ($item['transaksi_status']=="1"){
                            echo "Sedang Dicuci";
                        }elseif ($item['transaksi_status']=="2"){
                            echo "Selesai";
                        }
                        ?></td>
                </tr>
                <?php
                 $count++;
                }
                 ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
