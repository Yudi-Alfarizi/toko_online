<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<section class="slider-section pt-4 pb-4">
    <div class="container">
        <div class="slider-inner">
            <div class="row">
                <div class="col-md-3">
                    <?php if (!empty($categories)): ?>
                        <nav class="nav-category">
                            <h2>Categories</h2>
                            <ul class="menu-category">
                                <?php foreach ($categories as $category): ?>
                                    <?php if (empty($category['parent_id'])): ?>
                                        <li>
                                            <a href="<?= site_url('products?category=' . $category['slug']) ?>">
                                                <?= esc($category['name']) ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>

                <div class="col-md-9">
                    <!-- Carousel -->
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner shadow-sm rounded">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= base_url('themes/' . $currentTheme . '/assets/img/slides/slide1.jpg') ?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Mountains, Nature Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url('themes/' . $currentTheme . '/assets/img/slides/slide2.jpg') ?>" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Freedom, Sea Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url('themes/' . $currentTheme . '/assets/img/slides/slide3.jpg') ?>" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Living the Dream, Lost Island</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Carousel -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trending Items -->
<section class="products-grids trending pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Items</h2>
                </div>
            </div>
        </div>

        <?php if (!empty($trendingItems)): ?>
            <div class="row">
                <?php foreach ($trendingItems as $item): ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <a href="<?= site_url('produk/' . $item->slug) ?>"
                            class="single-product text-decoration-none text-dark d-block h-100"
                            style="border: 1px solid #ddd; border-radius: 6px; overflow: hidden; transition: box-shadow 0.3s;">
                            <div class="product-img" style="overflow: hidden;">
                                <?php if (!empty($item->image)): ?>
                                    <img src="<?= base_url('uploads/' . $item->image) ?>"
                                        class="img-fluid"
                                        style="width: 100%; height: 300px; object-fit: cover; transition: transform 0.3s;"
                                        loading="lazy"
                                        alt="<?= esc($item->name) ?>" />
                                <?php else: ?>
                                    <img src="<?= base_url('themes/' . $currentTheme . '/assets/img/no-image.png') ?>"
                                        class="img-fluid"
                                        style="width: 100%; height: 300px; object-fit: cover;"
                                        alt="No image available" />
                                <?php endif; ?>
                            </div>
                            <div class="product-content p-3">
                                <h3 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                                    <?= esc($item->name) ?>
                                </h3>
                                <div class="product-price fw-bold text-primary">
                                    Rp <?= number_format($item->real_price ?? $item->price, 0, ',', '.') ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Tidak ada produk trending saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .single-product:hover {
        box-shadow: 0 10px 20px rgb(0 0 0 / 0.15);
    }

    .single-product:hover img {
        transform: scale(1.05);
    }
</style>

<?= $this->endSection() ?>