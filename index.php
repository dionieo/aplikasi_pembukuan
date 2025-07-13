<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><img width="100px" src="./img/icon.png" alt=""></a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
    <div class="container-main">
        <div class="welcome">
            Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>!
        </div>
        <div class="menu">
            <a href="input-transaksi.php" class="tile tile1">
                <span class="icon">💸</span>
                Input Transaksi
            </a>
            <a href="laporan.php" class="tile tile2">
                <span class="icon">📊</span>
                Laporan Keuangan
            </a>
            <a href="jurnal.php" class="tile tile3">
                <span class="icon">📒</span>
                Jurnal Umum
            </a>
        </div>
        <div class="menus">
            <a href="neraca-detail.php" class="tiled tile4">
                <span class="icon">🧾</span>
                Neraca
            </a>
            <a href="buku-besar.php" class="tiled tile5">
                <span class="icon">📚</span>
                Buku Besar
            </a>
        </div>
    </div>
</body>
</html>
