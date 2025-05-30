<?= $this->extend('themes/' . $currentTheme . '/layout') ?>

<?= $this->section('content') ?>
<!------------------------------------------
    SLIDER
    ------------------------------------------->
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
                                    <?php if (empty($category['parent_id'])): // hanya tampilkan kategori tanpa parent 
                                    ?>
                                        <li>
                                            <a href="<?= site_url('products?category=' . $category['slug']) ?>"><?= esc($category['name']) ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                </div>
                <div class="col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner shadow-sm rounded">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/img/slides/slide1.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Mountains, Nature Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/img/slides/slide2.jpg" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Freedom, Sea Collection</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/img/slides/slide3.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Living the Dream, Lost Island</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slider -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-info mr-4">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="media-body">
                        <h5>Fast Shipping</h5>
                        <p class="text-muted">
                            All you have to do is to bring your passion. We take care of the rest.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-purple mr-4">
                        <i class="fa fa-credit-card-alt"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment</h5>
                        <p class="text-muted">
                            All you have to do is to bring your passion. We take care of the rest.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Return</h5>
                        <p class="text-muted">
                            All you have to do is to bring your passion. We take care of the rest.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services -->
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
            <div class="row"> <!-- ✅ Grid wrapper -->
                <?php foreach ($trendingItems as $item): ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?= site_url('products/' . $item->slug) ?>">
                                    <?php if (!empty($item->image)): ?>
                                        <img src="<?= base_url('uploads/' . $item->image) ?>"
                                            class="img-fluid"
                                            style="width: 100%; height: 300px; object-fit: cover;"
                                            loading="lazy"
                                            alt="<?= esc($item->name) ?>" />
                                    <?php else: ?>
                                        <img src="<?= base_url('themes/' . $currentTheme . '/assets/img/no-image.png') ?>"
                                            class="img-fluid"
                                            style="width: 100%; height: 200px; object-fit: cover;"
                                            alt="No image available" />
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="product-content">
                                <h3>
                                    <a href="<?= site_url('products/' . $item->slug) ?>">
                                        <?= esc($item->name) ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp <?= number_format($item->real_price ?? $item->price, 0, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <!-- ✅ End Grid -->
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Tidak ada produk trending saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- <section class="mobile-apps pt-5 pb-3 border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Download apps</h3>
                <p>Get an amazing app to make Your life easy</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#"><img src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/img/appstore.png" height="40"></a>
                <a href="#"><img src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/img/appstore.png" height="40"></a>
            </div>
        </div>
    </div>
</section> -->
<?= $this->endSection() ?>