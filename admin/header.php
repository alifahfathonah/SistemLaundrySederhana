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
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="glyphicon glyphicon-home"></i>Beranda</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="pelanggan.php">Pelanggan</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="transaksi.php">Transaksi</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="laporan.php">Laporan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pengaturan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="harga.php">Pengaturan Harga</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="GantiPassword.php">Ganti Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="setting/logout.php">Keluar</a>
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
