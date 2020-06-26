<?php include 'header.php';?>
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ganti Harga</h4>
            </div>
            <div class="card-body">
                <?php
                include '../koneksi.php';
                $query = mysqli_query($koneksi, "select * from harga");
                $hasil = mysqli_fetch_all($query);
                foreach ($hasil as $item){
                ?>
                <div class="form-group">
                    <label for=""><b>Harga Saat Ini (Dalam Kilogram): </b></label>
                    <input type="text" class="form-control" value="<?php echo "Rp. ".$item[0];?>" readonly>
                </div>
                <?php } ?>
                <form action="setting/edit_harga.php" method="post">
                    <div class="form-group">
                        <label for=""><b>Masukan Harga Baru: </b></label>
                        <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Baru!" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Tambah" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
