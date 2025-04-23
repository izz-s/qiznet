<div class="content">
    <section class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-4"><?= $title; ?></h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Produk</button>
        </div>

        <!-- flashdata success, error, dan info -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success flash-message" role="alert">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger flash-message" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-secondary flash-message" role="alert">
                <?= $this->session->flashdata('info'); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($produk as $p): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($p->foto): ?>
                                <img src="<?= base_url('assets/img/uploads/produk/' . $p->foto); ?>" alt="Foto Produk" class="img-fluid mb-3 d-block mx-auto" style="max-height: 150px;">
                            <?php endif; ?>
                            <h5 class="card-title">
                                <?= $p->nama_paket; ?>
                                <?= $p->populer ? '<span class="badge bg-warning text-dark">Populer</span>' : ''; ?>
                            </h5>
                            <p class="card-text"><strong>Kecepatan:</strong> <?= $p->kecepatan; ?></p>
                            <p class="card-text"><?= $p->deskripsi; ?></p>
                            <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($p->harga, 0, ',', '.'); ?></p>
                            <p class="card-text"><strong>Fasilitas:</strong><br>
                            <ul>
                                <?php foreach (explode("\n", $p->fasilitas) as $f): ?>
                                    <li><?= $f; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            </p>
                            <a href="<?= $p->link_pesan; ?>" target="_blank" class="btn btn-sm btn-success mb-2">Link Pesan</a><br>

                            <!-- Tombol Edit dan Hapus -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $p->id; ?>">Edit</button>
                            <a href="<?= base_url('produk/hapus/' . $p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?= $p->id; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= base_url('produk/update/' . $p->id); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label>Nama Paket</label>
                                        <input type="text" name="nama_produk" class="form-control" value="<?= $p->nama_paket; ?>" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Kecepatan</label>
                                        <input type="text" name="kecepatan" class="form-control" value="<?= $p->kecepatan; ?>" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control"><?= $p->deskripsi; ?></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control format-rupiah" value="<?= number_format($p->harga, 0, ',', '.'); ?>" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Fasilitas</label>
                                        <textarea name="fasilitas" class="form-control"><?= $p->fasilitas; ?></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label>Link Pesan</label>
                                        <input type="text" name="link_pesan" class="form-control" value="<?= $p->link_pesan; ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label>Ganti Foto Produk</label>
                                        <input type="file" name="foto" class="form-control">
                                        <?php if ($p->foto): ?>
                                            <small class="text-muted">Foto saat ini: <?= $p->foto; ?></small><br>
                                            <img src="<?= base_url('assets/img/uploads/produk/' . $p->foto); ?>" alt="Foto Produk" style="width: 100px;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-2 form-check">
                                        <input type="checkbox" name="populer" class="form-check-input" <?= $p->populer ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Tandai sebagai Populer</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('produk/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Kecepatan</label>
                        <input type="text" name="kecepatan" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label>Harga</label>
                        <input type="text" name="harga" id="hargaTambah" class="form-control format-rupiah" required>
                    </div>
                    <div class="mb-2">
                        <label>Fasilitas</label>
                        <textarea name="fasilitas" class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label>Link Pesan</label>
                        <input type="text" name="link_pesan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Produk</label>
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" name="populer" class="form-check-input">
                        <label class="form-check-label">Tandai sebagai Populer</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- js untuk currency rupiah -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rupiahFields = document.querySelectorAll('.format-rupiah');

        rupiahFields.forEach(field => {
            field.addEventListener('input', function(e) {
                let angka = this.value.replace(/[^,\d]/g, '').toString();
                let split = angka.split(',');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                this.value = 'Rp ' + rupiah;
            });
        });
    });
</script>

<!-- js untuk flashdata -->
<script>
    // Auto close flash message after 3 seconds
    setTimeout(function() {
        const flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(el => {
            el.style.transition = "opacity 0.5s ease";
            el.style.opacity = 0;
            setTimeout(() => el.remove(), 500); // remove after fade out
        });
    }, 3000); // 3 seconds
</script>