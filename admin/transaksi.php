<?php include 'header.php';?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="card-body">
            <a href="tambah_transaksi.php" class="btn btn-sm btn-info float-lg-right">Transaksi baru</a>
            <br>
            <br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tgl Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Berat</th>
                    <th>Tgl Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="20%">Opsi</th>
                </tr>
                <?php

                include '../koneksi.php';
                $query = mysqli_query($koneksi, "select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id order by transaksi_id desc");
                $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                $counter = 1;
                foreach ($hasil as $item){?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo "INVOICE-".$item['transaksi_id'];?></td>
                    <td><?php echo $item['transaksi_tgl'];?></td>
                    <td><?php echo $item['pelanggan_nama'];?></td>
                    <td><?php echo $item['transaksi_berat']." Kg";?></td>
                    <td><?php echo $item['transaksi_tgl_selesai'];?></td>
                    <td><?php echo "Rp. ".$item['transaksi_harga'];?></td>
                    <td>
                        <?php
                        if ($item['transaksi_status'] == "0"){
                            echo "<div class='badge badge-warning'>Sedang Diproses</div>";
                        }elseif ($item['transaksi_status']=="1"){
                            echo "<div class='badge badge-info'>Sedang Dicuci</div>";
                        }elseif ($item['transaksi_status']=="2"){
                            echo "<div class='badge badge-success'>Selesai</div>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">Edit</a>
                        <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Ingin Membatalkan Transaksi Ini?')">Batalkan</a>
                    </td>
                    <?php $counter++; ?>
                </tr>
                <?php }  ?>
            </table>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
