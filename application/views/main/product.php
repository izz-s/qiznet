<section id="product" class="pricing section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Produk</h2>
    </div>

    <div class="container">
        <div class="owl-carousel owl-produk">
            <?php foreach ($produk as $p): ?>
                <div class="item">
                    <div class="pricing-item <?= $p->populer ? 'featured' : ''; ?>">
                        <!-- <span class="badge badge-paket"><?= $p->nama_paket; ?></span> -->
                        <?php if ($p->populer): ?>
                            <span class="badge bg-warning text-dark badge-populer">Populer</span>
                        <?php endif; ?>
                        <img src="<?= base_url('assets/img/uploads/produk/' . $p->foto); ?>" alt="<?= $p->nama_paket; ?>" class="img-fluid">
                        <p class="description"><?= $p->deskripsi; ?></p>
                        <h4 style="font-size: 30px;">Rp <?= number_format($p->harga, 0, ',', '.'); ?><span> /bulan</span></h4>
                        <a href="<?= $p->link_pesan; ?>" class="cta-btn" target="_blank">Beli Sekarang</a>

                        <ul>
                            <?php foreach (explode("\n", $p->fasilitas) as $fasilitas): ?>
                                <li><i class="bi bi-check"></i> <span><?= $fasilitas; ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .pricing-item {
        position: relative;
    }

    .badge-populer {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    /* Styling untuk nama paket */
    .badge-paket {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #4CAF50;
        /* Bisa sesuaikan dengan warna yang diinginkan */
        color: white;
        padding: 5px 10px;
        font-weight: bold;
        border-radius: 5px;
    }

    .owl-carousel .item {
        transition: transform 0.3s ease;
    }

    .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
    }

    .owl-nav .owl-prev,
    .owl-nav .owl-next {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px;
        border-radius: 50%;
    }
</style>

<script>
    //panah geser
    $(".owl-produk").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            }
        }
    });
</script>