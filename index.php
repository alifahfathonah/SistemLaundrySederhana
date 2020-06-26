<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In - Laundry</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0">
<br>
<br>
<br>
<br>

<center><h2>Sistem Informasi Laundry</h2></center>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-transparent text-primary">
                    <h3 >Login Admin</h3>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['pesan'])){
                        if ($_GET['pesan']=='salah'){
                            echo "<div class=\"form-group text-center\"><span class=\"alert alert-danger\">Username atau Password yang anda masukkan salah</span></div>";
                        } elseif ($_GET['pesan'] == 'not-login'){
                            echo "<div class=\"form-group text-center\"><span class=\"alert alert-danger\">Anda harus log-in terlebih dahulu</span></div>
";
                        } elseif ($_GET['pesan'] == 'logout'){
                            echo "<div class=\"form-group text-center\"><span class=\"alert alert-warning\">Anda Berhasil Logout</span></div>";
                        }
                    }
                    ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="" class="">Username :</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="">Password :</label>
                            <input type="password" class="form-control" name="password">
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
</div>
</body>
</html>