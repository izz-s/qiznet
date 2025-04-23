<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 text-white">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link text-white <?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
                    Beranda
                </a>
            </li>
            <li>
                <a href="<?= base_url('about/index'); ?>" class="nav-link text-white <?= $this->uri->segment(1) == 'about' ? 'active' : ''; ?>">
                    Profil
                </a>
            </li>
            <li>
                <a href="<?= base_url('produk/admin'); ?>" class="nav-link text-white <?= $this->uri->segment(1) == 'produk' ? 'active' : ''; ?>">
                    Produk
                </a>
            </li>
            <li>
                <a href="<?= base_url('dokumentasi/admin'); ?>" class="nav-link text-white <?= $this->uri->segment(1) == 'dokumentasi' ? 'active' : ''; ?>">
                    Dokumentasi
                </a>
            </li>
            <li>
                <a href="<?= base_url('artikel/admin'); ?>" class="nav-link text-white <?= $this->uri->segment(1) == 'artikel' ? 'active' : ''; ?>">
                    Artikel
                </a>
            </li>
            <li>
                <a href="<?= base_url('contact/contact_messages'); ?>" class="nav-link text-white <?= $this->uri->segment(1) == 'contact' ? 'active' : ''; ?>">
                    Pesan Kontak
                </a>
            </li>
        </ul>
        <hr>
        <a href="<?= base_url('admin/logout'); ?>" class="btn btn-light text-danger w-100">Logout</a>
    </div>
</div>
<style>
    /* Sidebar Styling */
    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #388da8;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 10;
    }

    /* Content area styling */
    .content {
        margin-left: 250px;
        /* Make room for the sidebar */
        padding: 20px;
    }

    /* Adjust layout on mobile devices */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            /* Sidebar takes full width on mobile */
            height: auto;
            position: relative;
        }

        .content {
            margin-left: 0;
            /* No need for margin on mobile */
        }
    }
</style>