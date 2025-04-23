<div class="content">
    <div class="container mt-4">
        <h3 class="mb-4"><?= $title; ?></h3>

        <!-- flash data -->
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('info')) : ?>
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('info'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <!-- TAMPILKAN DATA -->
        <div class="container mt-5">
            <h3>Profil</h3>
            <p><?= $about->profil; ?></p>

            <h3>Visi & Misi</h3>
            <p><strong>Visi:</strong> <?= $about->visi; ?></p>
            <p><strong>Misi:</strong></p>
            <ul>
                <?php foreach (explode("\n", $about->misi) as $misi): ?>
                    <li><?= trim($misi); ?></li>
                <?php endforeach; ?>
            </ul>
            <h4 class="mt-5 mb-3">Kenapa Harus Kami?</h4>
            <ul>
                <?php foreach (explode("\n", $about->alasan) as $alasan): ?>
                    <li><?= trim($alasan); ?></li>
                <?php endforeach; ?>
            </ul>
            <?php if (!empty($about->gambar)): ?>
                <div class="mt-4">
                    <h4 class="mb-3">Gambar Utama</h4>
                    <img src="<?= base_url('assets/img/uploads/profil/' . $about->gambar); ?>"
                        class="rounded shadow"
                        style="width: 100px; height: auto;"
                        alt="Tentang Kami">
                </div>
            <?php endif; ?><br>
        </div>

        <!-- Tombol Edit -->
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditTentang">Edit Informasi</button>
        <!-- MODAL EDIT -->
        <div class="modal fade" id="modalEditTentang" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="<?= base_url('about/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel">Edit Informasi Tentang Kami</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="profil" class="form-label"><strong>Profil Kami</strong></label>
                                <textarea name="profil" id="profil" rows="4" class="form-control"><?= set_value('profil', $about->profil); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="visi" class="form-label"><strong>Visi</strong></label>
                                <textarea name="visi" id="visi" rows="2" class="form-control"><?= set_value('visi', $about->visi); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="misi" class="form-label"><strong>Misi</strong></label>
                                <textarea name="misi" id="misi" rows="4" class="form-control"><?= set_value('misi', $about->misi); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="alasan" class="form-label"><strong>Kenapa Harus Kami?</strong></label>
                                <textarea name="alasan" id="alasan" rows="4" class="form-control"><?= set_value('alasan', $about->alasan); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label"><strong>Upload Gambar Utama</strong></label>
                                <input type="file" class="form-control" name="gambar" id="gambar">
                                <?php if (!empty($about->gambar)) : ?>
                                    <small class="d-block mt-1">Gambar saat ini: <img src="<?= base_url('assets/img/uploads/profil/' . $about->gambar); ?>" width="100"></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?= $about->id; ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>