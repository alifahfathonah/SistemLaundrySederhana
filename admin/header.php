<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman admin</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/50b8e9bc0f.js" crossorigin="anonymous"></script>

</head>
<body style="background: #f0f0f0">
<?php
session_start();
if ($_SESSION['status']!="status"){
    header('../index.php?pesan=not-login');
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="index.php">Laundry</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="nav navbar-nav collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-house-user mr-1"></i>Beranda</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="pelanggan.php"><i class="fas fa-male mr-1"></i>Pelanggan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="transaksi.php"><i class="fas fa-comment-dollar mr-1"></i>Transaksi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="laporan.php"><i class="fas fa-file-alt mr-1"></i>Laporan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog mr-1"></i>
                    Pengaturan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="harga.php"><i class="fas fa-dollar-sign mr-1"></i>Pengaturan Harga</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="GantiPassword.php"><i class="fas fa-unlock-alt mr-1"></i>Ganti Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="setting/logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Keluar</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <label>Hai, <?php echo $_SESSION['username'];?></label>
        </form>
    </div>
</nav>
<br>
<br>
