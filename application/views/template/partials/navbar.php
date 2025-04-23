<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.php#hero" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename">Qiznet</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= base_url('index.php#hero'); ?>" class="active">Beranda</a></li>
                <li><a href="<?= base_url('index.php#about'); ?>">Tentang Kami</a></li>
                <li><a href="<?= base_url('index.php#services'); ?>">Layanan</a></li>
                <li><a href="<?= base_url('index.php#product'); ?>">Produk</a></li>
                <li><a href="<?= base_url('index.php#article'); ?>">Artikel</a></li>

                <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <!-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>z
                        </li> -->
                        <!-- <li><a href="<?= base_url('index.php#testimonials'); ?>"><?= $this->lang->line('testimonials'); ?></a></li> -->
                        <li><a href="<?= base_url('index.php#documentation'); ?>">Galeri</a></li>
                        <li><a href="<?= base_url('index.php#faq'); ?>">Pertanyaan yang Sering Ditanyakan</a></li>
                    </ul>
                </li>
                <li><a class="btn-contact" href="<?= base_url('index.php#contact'); ?>">Kontak Kami</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>