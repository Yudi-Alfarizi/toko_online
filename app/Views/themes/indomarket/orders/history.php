<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h3>Riwayat Pesanan Anda</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($orders)): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= esc($order['id']) ?></td>
                        <td><?= esc($order['created_at']) ?></td>
                        <td>
                            <?php if ($order['status'] === 'pending'): ?>
                                <span class="badge badge-warning">Belum Dibayar</span>
                            <?php elseif ($order['status'] === 'paid'): ?>
                                <span class="badge badge-success">Sudah Dibayar</span>
                            <?php else: ?>
                                <span class="badge badge-secondary"><?= esc($order['status']) ?></span>
                            <?php endif ?>
                        </td>
                        <td><?= esc($order['address']) ?></td>
                        <td>
                            <a href="<?= site_url('orders/' . $order['id']) ?>" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>

    </table>
</div>

<?= $this->endSection() ?>