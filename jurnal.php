<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'php/koneksi.php';
include 'php/function.php';

$jurnal = getJurnalUmum(); // hanya data milik user yang login
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jurnal Umum</title>
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
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Jurnal Umum - <?= htmlspecialchars($_SESSION['username']) ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Akun</th>
                                        <th class="text-end">Debit</th>
                                        <th class="text-end">Kredit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($jurnal) > 0): ?>
                                        <?php foreach ($jurnal as $row): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['date']) ?></td>
                                                <td><?= htmlspecialchars($row['description']) ?></td>
                                                <td><?= htmlspecialchars($row['account_code']) ?> - <?= htmlspecialchars($row['account_name']) ?></td>
                                                <td class="text-end"><?= ($row['type'] === 'debit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                                <td class="text-end"><?= ($row['type'] === 'kredit') ? 'Rp ' . number_format($row['amount']) : '-' ?></td>
                                                <td><a href="hapus-transaksi.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada transaksi.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <button onclick="window.print()" class="btn btn-outline-primary">
                            Print
                            </button>
                            <a href="export-jurnal.php" class="btn btn-outline-success">
                                Export Excel
                            </a>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
