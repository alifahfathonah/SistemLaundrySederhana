<?php include "header.php";?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Transaksi</h4>
        </div>
        <div class="card-body">
            <div class="float-lg-right">
                <a href="transaksi.php" class="btn btn-primary">Kembali</a>
            </div>
            <br>
            <br>

            <form action="transaksi_aksi.php" method="post">
                <div class="form-group">
                    <label for=""><b>Nama Pelanggan</b></label>
                    <select class="form-control" name="pelanggan" required>
                        <option value="">- Pilih Pelanggan</option>
                        <?php
                        include "../koneksi.php";
                        $query =  mysqli_query($koneksi, "select * from pelanggan");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item['pelanggan_id'];?>"><?php echo $item['pelanggan_nama'];?></option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for=""><b>Berat</b></label>
                    <input type="number" class="form-control" name="berat" placeholder="Kilogram" required>
                </div>

                <div class="form-group">
                    <label for=""><b>Tanggal Selesai</b></label>
                    <input type="date" class="form-control" name="tgl_selesai" required>
                </div>

                <br>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
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
                <button class="btn btn-primary form-group">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
