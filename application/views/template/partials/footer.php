<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Qiznet</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Jl. H. Saman, RT.9/RW.008, Tugu</p>
                    <p>Kec. Cimanggis, Kota Depok, Jawa Barat</p>
                    <p class="mt-3"><strong>Hubungi Kami:</strong> <span><a href="https://wa.me/6287716180033" target="_blank">+62 877-1618-0033</a></span></p>
                    <p><strong>Email:</strong> <span>cs@qiznet.id</span></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="<?= base_url('index.php#hero'); ?>" class="active">Beranda</a></li>
                    <li><a href="<?= base_url('index.php#about'); ?>" class="active">Tentang Kami</a></li>
                    <li><a href="<?= base_url('index.php#services'); ?>" class="active">Layanan</a></li>
                    <li><a href="<?= base_url('index.php#product'); ?>" class="active">Produk</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Layanan Kami</h4>
                <ul>
                    <li>Internet Super Cepat</li>
                    <li>Gratis Modem Wifi</li>
                    <li>Gratis Biaya Pemasangan</li>
                    <li>Pelayanan Pelanggan 24/7</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Sosial Media</h4>
                <p>Ikuti sosial media kami di bawah</p>
                <div class="social-links d-flex mt-4">
                    <a href="https://twitter.com/qiznet" target="_blank"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://facebook.com/qiznet" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/qiznet" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://linkedin.com/in/qiznet" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Qiznet</strong><span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Dist<a href="https://themewagon.com">ThemeWagon -->
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<script>
    //script client
    $(document).ready(function() {
        $(".clients-carousel").owlCarousel({
            loop: true, // Mengulang carousel
            margin: 30, // Jarak antar item
            autoplay: true, // Aktifkan autoplay
            autoplayTimeout: 2000, // Interval waktu (3 detik)
            autoplayHoverPause: true, // Pause saat hover
            smartSpeed: 1000, // Kecepatan transisi mulus
            responsive: {
                0: {
                    items: 2 // Jumlah item di layar kecil
                },
                768: {
                    items: 4 // Jumlah item di layar sedang
                },
                1200: {
                    items: 6 // Jumlah item di layar besar
                }
            }
        });
    });

    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true, // Slide loop
            margin: 10, // Jarak antar gambar
            nav: true, // Tombol next/prev
            dots: true, // Tampilkan dots navigasi
            autoplay: true, // Auto slide
            autoplayTimeout: 3000, // Delay per slide (ms)
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    //modal artikel
    function showModalArtikel(data) {
        document.getElementById('artikelModalLabel').textContent = data.judul;
        document.getElementById('artikelModalImg').src = data.foto;
        document.getElementById('artikelModalKonten').innerHTML = data.konten; // Konten sudah terformat dengan tag <p>
        document.getElementById('tanggalPost').textContent = data.tanggal;
        document.getElementById('penulisPost').textContent = data.penulis;

        const shareUrl = encodeURIComponent(data.url);
        const shareText = encodeURIComponent(data.judul);

        document.getElementById('shareWA').href = `https://wa.me/?text=${shareText}%20${shareUrl}`;
        document.getElementById('shareFB').href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
        document.getElementById('shareX').href = `https://twitter.com/intent/tweet?text=${shareText}&url=${shareUrl}`;

        const modalEl = document.getElementById('artikelModal');
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
</script>
</body>

</html>