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

        <!-- Tombol trigger modal tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Artikel</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Foto</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($artikel as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['judul']; ?></td>
                        <td><?= $row['slug']; ?></td>
                        <td>
                            <?php if ($row['foto']): ?>
                                <img src="<?= base_url('./assets/img/uploads/artikel/' . $row['foto']); ?>" width="80">
                            <?php else: ?>
                                <em>Belum ada</em>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                        <td>
                            <!-- Detail Modal -->
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $row['id']; ?>">Detail</button>

                            <!-- Edit Modal -->
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id']; ?>">Edit</button>

                            <!-- Hapus -->
                            <a href="<?= base_url('artikel/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="modalDetail<?= $row['id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Artikel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Judul:</strong> <?= $row['judul']; ?></p>
                                    <p><strong>Slug:</strong> <?= $row['slug']; ?></p>
                                    <p><strong>Konten:</strong> <?= $row['konten']; ?></p>
                                    <p><strong>Foto:</strong><br>
                                        <?php if ($row['foto']): ?>
                                            <img src="<?= base_url('./assets/img/uploads/artikel/' . $row['foto']); ?>" width="150">
                                        <?php else: ?>
                                            <em>Tidak ada foto</em>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?= $row['id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url('artikel/edit/' . $row['id']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Artikel</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Judul</label>
                                            <input type="text" name="judul" class="form-control" value="<?= $row['judul']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Konten</label>
                                            <textarea name="konten" class="form-control"><?= strip_tags($row['konten']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Foto</label><br>
                                            <?php if ($row['foto']): ?>
                                                <img src="<?= base_url('./assets/img/uploads/artikel/' . $row['foto']); ?>" width="100" class="mb-2"><br>
                                            <?php endif; ?>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Artikel -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('artikel/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten</label>
                            <textarea name="konten" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>