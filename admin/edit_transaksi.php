<?php include 'header.php';?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit Transaksi</h4>
        </div>
        <div class="card-body">
            <div class="float-lg-right">
                <a href="transaksi.php" class="btn btn-primary">Kembali</a>
            </div>
            <br>
            <br>
            <?php
                include "../koneksi.php";
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi, "select * from transaksi where transaksi_id='$id'");
                $hasil = mysqli_fetch_all($transaksi, MYSQLI_ASSOC);
                foreach ($hasil as $item){
                ?>

            <form action="setting/edit_transaksi_aksi.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id_edit" value="<?php echo $item['transaksi_id'];?>">
                    <label for=""><b>Nama Pelanggan</b></label>
                    <select class="form-control" name="pelanggan" required>
                        <option value="">- Pilih Pelanggan</option>
                        <?php
                        $data = mysqli_query($koneksi, "select * from pelanggan");
                        $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
                        foreach ($result as $pelanggan){ ?>
                        <option <?php if ($pelanggan['pelanggan_id']==$item['transaksi_pelanggan']){
                            echo "selected";
                        }?> value="<?php echo $pelanggan['pelanggan_id'];?>"><?php echo $pelanggan['pelanggan_nama'];?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for=""><b>Berat</b></label>
                    <input type="number" class="form-control" name="berat" placeholder="Kilogram" value="<?php echo $item['transaksi_berat'];?>" required>
                </div>

                <div class="form-group">
                    <label for=""><b>Tanggal Selesai</b></label>
                    <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $item['transaksi_tgl_selesai'];?>" required>
                </div>

                <br>
                <div class="dropdown-divider"></div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                    <?php
                    $id_transaksi = $item['transaksi_id'];
                    $pakaian = mysqli_query($koneksi, "select * from pakaian where pakaian_transaksi='$id_transaksi'");
                    $hasilPakaian = mysqli_fetch_all($pakaian, MYSQLI_ASSOC);

                    foreach ($hasilPakaian as $pakaianHasil){ ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $pakaianHasil['pakaian_jenis'] ?>"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $pakaianHasil['pakaian_jumlah'] ?>"></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                </table>
                <div class="dropdown-divider"></div>
                <div class="form-group alert alert-info">
                    <label for=""><b>Status</b></label>
                    <select name="status" id="" class="form-control alert alert-info bg-white h-25" required>
                        <option  <?php if ($item['transaksi_status']=="0"){
                            echo "selected";
                        }?> value="0">SEDANG DI PROSES</option>

                        <option <?php if ($item['transaksi_status']=="1"){
                            echo "selected";
                        }?> value="1">SEDANG DICUCI</option>

                        <option <?php if ($item['transaksi_status']=="2"){
                            echo "selected";
                        }?> value="2">SELESAI</option>
                    </select>
                </div>
                <button class="btn btn-primary form-group">Perbarui Transaksi</button>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
