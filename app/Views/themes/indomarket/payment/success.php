<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5 text-center">
    <h2 class="text-success">Pembayaran Berhasil 🎉</h2>
    <p>Terima kasih, <strong><?= esc($order['user_name']) ?></strong>.</p>
    <p>Pesanan Anda (Order ID: <?= esc($order['id']) ?>) telah berhasil dibayar.</p>
    <a href="<?= site_url('/') ?>" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>

<?= $this->endSection() ?>