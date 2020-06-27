<?php include "header.php"; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Filter Laporan</h4>
        </div>
        <div class="card-boy">
            <form action="laporan.php" method="get" class="form-group">
                <table class="table table-bordered table-striped ">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="date" name="tgl_dari" class="form-control" </td>
                        <td><input type="date" name="tgl_sampai" class="form-control"></td>
                        <td><input type="submit" class="btn btn-primary" value="Filter"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br>
    <br>
    <?php
    if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai']; ?>
        <div class="card">
            <div class="card-header">
                <h4>Data Laporan Laundry Dari <b><?php echo $dari;?></b> Sampai <b><?php echo $sampai;?></b></h4>
            </div>
            <div class="card-body">
                <a href="cetak_print.php?dari=<?php echo $dari;?>&sampai=<?php echo $sampai;?>" target="_blank" class="btn btn-primary">CETAK</a>
                <br>
                <br>
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

<?php include "footer.php"; ?>
