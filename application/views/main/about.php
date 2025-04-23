<!-- About Section -->
<section id="about" class="about section">
    <div class="container">
        <div class="row gy-4">
            <!-- Bagian Kiri (Teks Profil Perusahaan) -->
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <h3>Tentang Kami</h3>
                <p class="fst-italic"><?= $about->profil; ?></p>


                <h4>Visi & Misi</h4>
                <p><strong>Visi:</strong> <?= $about->visi; ?></p>

                <p><strong>Misi:</strong></p>
                <ul>
                    <?php foreach (explode("\n", $about->misi) as $misi): ?>
                        <li><i class="bi bi-check-circle"></i> <?= trim($misi); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4>Kenapa Harus Kami??</h4>

                <style>
                    .list-container {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 10px;
                    }

                    .list-container li {
                        width: 48%;
                        list-style: none;
                    }
                </style>

                <ul class="list-container">
                    <?php
                    // Array ikon sesuai dengan alasan (bisa disesuaikan)
                    $icon_map = [
                        'Internet Cepat' => 'bi bi-wifi',
                        'Koneksi Stabil' => 'bi bi-bar-chart-fill',
                        'Harga Terjangkau' => 'bi bi-cash-stack',
                        'Layanan 24/7' => 'bi bi-headset'
                    ];

                    foreach (explode("\n", $about->alasan) as $alasan):
                        $alasan = trim($alasan);
                        $icon_class = isset($icon_map[$alasan]) ? $icon_map[$alasan] : 'bi bi-check-circle'; // default icon
                    ?>
                        <li><i class="<?= $icon_class; ?>"></i> <strong><?= $alasan; ?></strong></li>
                    <?php endforeach; ?>
                </ul>


                <a href="<?= base_url('index.php#contact'); ?>" class="read-more">
                    <span>Kontak Kami</span> <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <!-- Bagian Kanan (Gambar Perusahaan) -->
            <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                <?php if (!empty($about->gambar)) : ?>
                    <img src="<?= base_url('assets/img/uploads/profil/' . $about->gambar); ?>" class="img-fluid" alt="Tentang Kami">
                <?php else: ?>
                    <img src="<?= base_url('assets/img/default.jpg'); ?>" class="img-fluid" alt="Tentang Kami">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->