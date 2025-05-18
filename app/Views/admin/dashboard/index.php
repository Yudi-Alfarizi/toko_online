<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<!-- Header -->
<div class="content-header bg-white py-3 shadow-sm mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h2 class="text-dark mb-0">📊 Dashboard Admin</h2>
    </div>
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">

        <!-- Info Boxes dengan tema elektronik -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card bg-gradient-primary text-white shadow-sm rounded-4 h-100 border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1">215</h3>
                            <p class="mb-0 opacity-75 fw-semibold">Laptop Terjual</p>
                        </div>
                        <i class="fas fa-laptop-code fa-2x opacity-85"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-gradient-info text-white shadow-sm rounded-4 h-100 border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1">480</h3>
                            <p class="mb-0 opacity-75 fw-semibold">Smartphone Terjual</p>
                        </div>
                        <i class="fas fa-mobile-alt fa-2x opacity-85"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-gradient-warning text-dark shadow-sm rounded-4 h-100 border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1">120</h3>
                            <p class="mb-0 opacity-75 fw-semibold">Tablet Terjual</p>
                        </div>
                        <i class="fas fa-tablet-alt fa-2x opacity-85"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-gradient-secondary text-white shadow-sm rounded-4 h-100 border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold mb-1">875</h3>
                            <p class="mb-0 opacity-75 fw-semibold">Aksesoris Terjual</p>
                        </div>
                        <i class="fas fa-headphones-alt fa-2x opacity-85"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Ringkasan tanpa grafik -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase">Pendapatan Bulanan</h6>
                        <h3 class="fw-bold mb-3">Rp 78.500.000</h3>
                        <div class="progress" style="height: 7px; border-radius: 10px;">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 87%; border-radius: 10px;"
                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">87% dari target Rp 90.000.000</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase">Produk Terjual</h6>
                        <h3 class="fw-bold mb-3">1.790</h3>
                        <div class="progress" style="height: 7px; border-radius: 10px;">
                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 74%; border-radius: 10px;"
                                aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">74% stok terjual</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase">Order Baru</h6>
                        <h3 class="fw-bold mb-3">195</h3>
                        <div class="progress" style="height: 7px; border-radius: 10px;">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 62%; border-radius: 10px;"
                                aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">62% dari order target</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase">Pengunjung Unik</h6>
                        <h3 class="fw-bold mb-3">1.430</h3>
                        <div class="progress" style="height: 7px; border-radius: 10px;">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 59%; border-radius: 10px;"
                                aria-valuenow="59" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">59% dari target pengunjung</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-header bg-dark text-white border-bottom-0">
                        <h5 class="mb-0 fw-semibold"><i class="fas fa-bolt me-2"></i> Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0" style="line-height: 1.6; font-size: 1rem;">
                            <li>• User baru mendaftar 3 menit yang lalu</li>
                            <li>• Order #456 untuk HP baru dibuat</li>
                            <li>• Pembayaran berhasil untuk pesanan #457</li>
                            <li>• Produk "Wireless Earbuds" berhasil ditambahkan</li>
                            <li>• Stok "Laptop Gaming" berkurang</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>