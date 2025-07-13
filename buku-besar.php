<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'php/koneksi.php';
include 'php/function.php';

$buku_besar = getBukuBesar(); // sudah dikelompokkan per akun
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Besar</title>
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
        <h2 class="mb-4 text-center">Buku Besar - <?= htmlspecialchars($_SESSION['username']) ?></h2>
        <?php if (count($buku_besar) > 0): ?>
            <?php foreach ($buku_besar as $akun => $transaksi): ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><?= htmlspecialchars($akun) ?></h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th class="text-end">Debit</th>
                                        <th class="text-end">Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['date']) ?></td>
                                            <td><?= htmlspecialchars($row['description']) ?></td>
                                            <td class="text-end"><?= ($row['type'] === 'debit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                            <td class="text-end"><?= ($row['type'] === 'kredit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">Tidak ada data buku besar.</div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'php/koneksi.php';
include 'php/function.php';

$buku_besar = getBukuBesar(); // sudah dikelompokkan per akun
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Besar</title>
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
        <h2 class="mb-4 text-center">Buku Besar - <?= htmlspecialchars($_SESSION['username']) ?></h2>
        <?php if (count($buku_besar) > 0): ?>
            <?php foreach ($buku_besar as $akun => $transaksi): ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><?= htmlspecialchars($akun) ?></h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th class="text-end">Debit</th>
                                        <th class="text-end">Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['date']) ?></td>
                                            <td><?= htmlspecialchars($row['description']) ?></td>
                                            <td class="text-end"><?= ($row['type'] === 'debit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                            <td class="text-end"><?= ($row['type'] === 'kredit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">Tidak ada data buku besar.</div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
