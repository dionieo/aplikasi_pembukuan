<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'php/koneksi.php';
include 'php/function.php';
$laba_rugi = getLaporanLabaRugi();
$neraca = getNeraca();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Aplikasi Pembukuan</a>
            <div class="d-flex">
                <a href="index.php" class="btn btn-outline-light">Dashboard</a>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Laporan Laba Rugi</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th>Pendapatan</th>
                                <td>Rp <?= number_format($laba_rugi['pendapatan']) ?></td>
                            </tr>
                            <tr>
                                <th>Beban</th>
                                <td>Rp <?= number_format($laba_rugi['beban']) ?></td>
                            </tr>
                            <tr class="table-info">
                                <th>Laba/Rugi Bersih</th>
                                <td><strong>Rp <?= number_format($laba_rugi['pendapatan'] - $laba_rugi['beban']) ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Neraca</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th>Aset</th>
                                <td>Rp <?= number_format($neraca['aset']) ?></td>
                            </tr>
                            <tr>
                                <th>Liabilitas</th>
                                <td>Rp <?= number_format($neraca['liabilitas']) ?></td>
                            </tr>
                            <tr>
                                <th>Modal</th>
                                <td>Rp <?= number_format($neraca['modal']) ?></td>
                            </tr>
                        </table>
                        <button onclick="window.print()" class="btn btn-outline-primary">
                            Print
                        </button>
                        <a href="export-jurnal.php" class="btn btn-outline-success">
                            Export Excel
                        </a>
                    </div>
                </div>
                <div class="text-center">
                    <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>