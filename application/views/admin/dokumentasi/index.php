<div class="content">
    <div class="container mt-4">
        <h3 class="mb-4"><?= $title; ?></h3>

        <!-- flashdata success, error, dan info -->
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

        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="bi bi-plus"></i> Tambah Dokumentasi
        </button>

        <!-- Modal Upload -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('dokumentasi/tambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Dokumentasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tambah Gambar</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Jumlah Gambar</th> <!-- Kolom Jumlah Gambar -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php $no = 1; ?>
                <?php foreach ($dokumentasi as $dok) : ?>
                    <?php if (!empty($dok->image)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= base_url($dok->image); ?>" width="120" alt="Gambar dokumentasi">
                            </td>
                            <td><?= $dok->judul; ?></td>
                            <td><?= date('d-m-Y', strtotime($dok->created_at)); ?></td>
                            <td>
                                <?= count($dok->images); ?>
                            </td>
                            <td>
                                <a href="<?= base_url('dokumentasi/hapus_gambar_bulk/' . $dok->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus semua gambar?')">Hapus Semua Gambar</a>

                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?= $dok->id; ?>">
                                    Detail
                                </button>

                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $dok->id; ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- modal detail -->
<?php foreach ($dokumentasi as $dok) : ?>
    <div class="modal fade" id="detailModal<?= $dok->id; ?>" tabindex="-1" aria-labelledby="detailModalLabel<?= $dok->id; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Dokumentasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Judul:</strong> <?= $dok->judul; ?></p>
                    <p><strong>Deskripsi:</strong> <?= $dok->deskripsi; ?></p>
                    <p><strong>Tanggal:</strong> <?= date('d-m-Y H:i', strtotime($dok->created_at)); ?></p>

                    <div class="row">
                        <?php if (!empty($dok->images)) : ?>
                            <?php foreach ($dok->images as $img) : ?>
                                <div class="col-md-4 mb-3">
                                    <img src="<?= base_url($img->image); ?>" class="img-fluid rounded" alt="gambar dokumentasi">
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-muted">Belum ada gambar</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- Modal Edit -->
<?php foreach ($dokumentasi as $dok) : ?>
    <div class="modal fade" id="editModal<?= $dok->id; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $dok->id; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('dokumentasi/edit/' . $dok->id); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Dokumentasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $dok->judul; ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required><?= $dok->deskripsi; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Gambar Saat Ini</label>
                            <div class="row">
                                <?php foreach ($dok->images as $img) : ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="card h-100 text-center">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <img src="<?= base_url($img->image); ?>" class="img-fluid mb-2" style="max-height: 150px; object-fit: contain;">
                                                <a href="<?= base_url('dokumentasi/hapus_gambar/' . $img->id); ?>" class="btn btn-sm btn-danger mt-auto" onclick="return confirm('Yakin hapus gambar ini?')">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tambah Gambar Baru (Opsional)</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>