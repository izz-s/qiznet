<div class="content">
    <div class="container mt-4">
        <h3 class="mb-4"><?= $title; ?></h3>

        <?php
        $no = count($messages);
        ?>

        <?php if (!empty($messages)) : ?>

            <!-- Success and error messages -->
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

            <table class="table table-bordered">
                <thead>
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <tr style="text-align: center;">
                            <td><?= $no--; ?></td>
                            <td><?= $message->name; ?></td>
                            <td><?= $message->email; ?></td>
                            <td><?= $message->subject; ?></td>
                            <td><?= $message->message; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($message->created_at)); ?></td>
                            <td>
                                <?php if ($message->is_replied == 1): ?>
                                    <span class="badge bg-success">Sudah Dibalas</span>
                                <?php else: ?>
                                    <span class="badge bg-warning">Belum Dibalas</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Tombol hapus -->
                                <a href="<?= site_url('contact/delete_message/' . $message->id); ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">Hapus</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal<?= $message->id; ?>">
                                    Balas
                                </button>

                                <!-- Modal Balas -->
                                <div class="modal fade" id="replyModal<?= $message->id; ?>" tabindex="-1" aria-labelledby="replyModalLabel<?= $message->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="<?= base_url('contact/send_reply/' . $message->id); ?>" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="replyModalLabel<?= $message->id; ?>">Balas Pesan dari <?= $message->name; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="email" value="<?= $message->email; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Subjek</label>
                                                        <input type="text" class="form-control" name="subject" value="Re: <?= $message->subject; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Isi Balasan</label>
                                                        <textarea class="form-control" name="reply" rows="5" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Tidak ada pesan.</p>
        <?php endif; ?>
    </div>
</div>