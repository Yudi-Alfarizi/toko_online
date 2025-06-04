<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Detail Pesanan #<?= $order['id'] ?></h4>
        </div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($order['created_at'])) ?></p>
            <p><strong>Status:</strong>
                <?php if ($order['status'] === 'pending'): ?>
                    <span class="badge badge-warning">Menunggu Pembayaran</span>
                <?php elseif ($order['status'] === 'paid'): ?>
                    <span class="badge badge-success">Sudah Dibayar</span>
                <?php elseif ($order['status'] === 'shipped'): ?>
                    <span class="badge badge-info">Sudah Dikirim</span>
                <?php endif; ?>
            </p>
            <p><strong>Nama:</strong> <?= esc($order['user_name']) ?></p>
            <p><strong>Email:</strong> <?= esc($order['email']) ?></p>
            <p><strong>No. HP:</strong> <?= esc($order['phone']) ?></p>
            <p><strong>Alamat:</strong><br><?= esc($order['address']) ?></p>

            <h5 class="mt-4">Produk Dipesan:</h5>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($items as $item): ?>
                        <?php
                        $product = $item['product'];
                        $subtotal = $product->price * $item['qty'];
                        $total += $subtotal;
                        $imagePath = $product->featured_image->small ?? null;

                        // Cek apakah sudah URL lengkap
                        $imageUrl = $imagePath && str_starts_with($imagePath, 'http')
                            ? $imagePath
                            : site_url('uploads/' . $imagePath);

                        if (!$imagePath) {
                            $imageUrl = 'https://via.placeholder.com/80';
                        }
                        ?>
                        <tr>
                            <td><img src="<?= $imageUrl ?>" width="80" class="img-thumbnail"></td>
                            <td><?= esc($product->name) ?></td>
                            <td><?= $item['qty'] ?></td>
                            <td>Rp <?= number_format($product->price, 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>Rp <?= number_format($total, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>