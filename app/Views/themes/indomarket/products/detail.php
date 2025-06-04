<?= $this->extend('themes/' . $currentTheme . '/layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5 mb-5">
    <h2 class="mb-4"><?= esc($product['name']) ?></h2>
    <div class="row gx-5">
        <div class="col-md-6">

            <?php if (!empty($images)): ?>
                <!-- Gambar Utama -->
                <div class="mb-3">
                    <img id="mainProductImage" src="<?= esc($images[0]->medium) ?>" alt="<?= esc($product['name']) ?>"
                        class="img-fluid rounded shadow-sm" style="max-height: 400px; width: 100%; object-fit: contain;">
                </div>

                <!-- Thumbnail -->
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <?php foreach ($images as $index => $img): ?>
                        <img src="<?= esc($img->medium) ?>"
                            class="img-thumbnail thumbnail-product <?= ($index === 0) ? 'selected' : '' ?>"
                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                            data-index="<?= $index ?>"
                            alt="Thumbnail <?= $index + 1 ?>">
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <img src="https://via.placeholder.com/400x400?text=No+Image" alt="No Image"
                    class="img-fluid rounded shadow-sm" />
            <?php endif; ?>

        </div>

        <div class="col-md-6 d-flex flex-column">
            <h4 class="text-danger fw-bold mb-3">Rp <?= number_format($product['lowest_price'] ?? $product['price']) ?></h4>
            <p class="lead"><?= esc($product['short_description']) ?></p>

            <?php if (!empty($product['attributes'])): ?>
                <div class="mb-4">
                    <?php foreach ($product['attributes'] as $attribute): ?>
                        <div class="mb-2">
                            <label class="form-label fw-semibold"><?= esc($attribute['name']) ?>:</label><br>
                            <?php foreach ($attribute['options'] as $option): ?>
                                <span class="badge bg-secondary me-1 mb-1"><?= esc($option['text_value']) ?></span>
                            <?php endforeach ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif; ?>

            <hr>

            <h5 class="mb-3">Spesifikasi</h5>
            <div class="mb-4" style="white-space: pre-wrap;"><?= esc($product['description']) ?></div>

            <?php if (!empty($product['variants'])): ?>
                <form action="<?= site_url('checkout') ?>" method="get" class="mt-auto">
                    <div class="mb-3">
                        <label for="variant_id" class="form-label fw-semibold">Pilih Varian:</label>
                        <select name="product_id" id="variant_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Varian --</option>
                            <?php foreach ($product['variants'] as $variant): ?>
                                <option value="<?= $variant->id ?>">
                                    <?= esc($variant->name) ?> - Rp <?= number_format($variant->price, 0, ',', '.') ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Beli Sekarang</button>
                </form>
            <?php else: ?>
                <form action="<?= site_url('checkout') ?>" method="get" class="mt-auto">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Beli Sekarang</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('mainProductImage');
        const thumbnails = document.querySelectorAll('.thumbnail-product');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                // Ganti src gambar utama
                mainImage.src = thumb.src;

                // Update class selected untuk border highlight
                thumbnails.forEach(t => t.classList.remove('selected'));
                thumb.classList.add('selected');
            });
        });
    });
</script>

<?= $this->endSection() ?>