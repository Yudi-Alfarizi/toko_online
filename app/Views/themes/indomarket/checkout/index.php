<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5 mb-5">
    <h2>Checkout Produk</h2>

    <div class="card p-4 shadow-sm">
        <div class="row">
            <div class="col-md-4">
                <?php if (!empty($product->featured_image)): ?>
                    <img src="<?= esc($product->featured_image->medium) ?>" alt="<?= esc($product->name) ?>" class="img-fluid">
                <?php else: ?>
                    <img src="https://via.placeholder.com/300x300?text=No+Image" alt="No Image" class="img-fluid">
                <?php endif ?>


            </div>
            <div class="col-md-8">
                <h4><?= esc($product->name) ?></h4>
                <p>Harga: <strong>Rp <?= number_format($product->lowest_price ?? $product->price) ?></strong></p>
                <p>Stok tersedia: <strong><?= $product->qty ?? 0 ?></strong></p>

                <form action="<?= site_url('checkout') ?>" method="post">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" placeholder="Alamat lengkap" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Lanjut Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>