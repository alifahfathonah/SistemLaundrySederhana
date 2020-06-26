<?php include 'header.php';?>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h4>Ganti Password</h4></div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == 'berhasil') {
                            echo "<div class=\"form-group text-center\"><span class=\"alert alert-success\">Password Berhasil Di Update</span></div>";
                        }
                    }
                    ?>
                    <form action="setting/password.php" method="post">
                        <div class="form-group">
                            <label for="">Ganti Password : </label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password baru anda!">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
