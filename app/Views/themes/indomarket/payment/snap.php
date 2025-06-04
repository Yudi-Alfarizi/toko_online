<?= $this->extend('themes/' . $currentTheme . '/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Bayar Pesanan</h2>
    <p>Order ID: <?= $order['id'] ?></p>

    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $clientKey ?>"></script>
<script>
    const orderId = <?= json_encode($order['id']) ?>;
    document.getElementById('pay-button').addEventListener('click', function() {
        snap.pay('<?= $snapToken ?>', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                window.location.href = '/payment/success/' + orderId;
            },
            onPending: function(result) {
                alert("Menunggu pembayaran.");
            },
            onError: function(result) {
                alert("Pembayaran gagal.");
            }
        });
    });
</script>


<?= $this->endSection() ?>