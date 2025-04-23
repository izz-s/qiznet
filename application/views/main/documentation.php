<!-- Dokumentasi Kegiatan Perusahaan -->
<section id="documentation" class="features section" style="padding: 60px 0; background-color: #fff;">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5">
            <h2>Galeri Dokumentasi Kegiatan Perusahaan</h2>
            <p>Berbagai kegiatan dan acara yang telah dilakukan oleh perusahaan untuk mendukung pertumbuhan dan pengembangan.</p>
        </div>

        <?php if (empty($dokumentasi_group)) : ?>
            <p class="text-center">Belum ada dokumentasi tersedia.</p>
        <?php else : ?>

            <div class="owl-carousel owl-dokumentasi">
                <?php foreach ($dokumentasi_group as $i => $group) : ?>
                    <div class="card" data-bs-toggle="modal" data-bs-target="#modalDok<?= $i; ?>">
                        <div class="card-img-container">
                            <img src="<?= base_url(!empty($group->image) ? $group->image : 'assets/img/noimage.png'); ?>" class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $group->judul; ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- modal detail view galeri dokumentasi -->
            <?php foreach ($dokumentasi_group as $i => $group) : ?>
                <?php $images = $this->Dokumentasi_model->get_images_by_dokumentasi($group->id); ?>
                <div class="modal fade" id="modalDok<?= $i; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?= $group->judul; ?></h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Admin | <?= date('d-m-Y H:i:s', strtotime($group->created_at)); ?></h6><br>
                                <p class="mb-3"><?= nl2br($group->deskripsi); ?></p> <!-- tampilkan deskripsi -->
                                <div class="row">
                                    <?php foreach ($images as $img) : ?>
                                        <div class="col-md-4 mb-3">
                                            <img src="<?= base_url($img->image); ?>" class="img-fluid rounded" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Like -->
                                <form action="<?= base_url('dokumentasi/like/' . $group->id); ?>" method="post">
                                    <button class="btn btn-sm btn-outline-primary mb-3 tombol-like" data-id="<?= $group->id; ?>">
                                        ❤️ Suka (<span class="like-count-<?= $group->id; ?>">
                                            <?= $this->db->where('dokumentasi_id', $group->id)->count_all_results('likes'); ?>
                                        </span>)
                                    </button>
                                </form>

                                <!-- Komentar -->
                                <h6>Komentar</h6>
                                <?php
                                $komentar = $this->db->where('dokumentasi_id', $group->id)->order_by('created_at', 'DESC')->get('komentar')->result();
                                ?>
                                <div class="mb-3">
                                    <?php foreach ($komentar as $komen) : ?>
                                        <div class="border p-2 rounded mb-2">
                                            <strong><?= $komen->nama; ?></strong><br>
                                            <small><i><?= date('d-m-Y H:i', strtotime($komen->created_at)); ?></i></small>
                                            <p class="mb-0"><?= nl2br(htmlspecialchars($komen->isi_komentar)); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Form Komentar -->
                                <form action="<?= base_url('home/kirim_komentar'); ?>" method="post">
                                    <input type="hidden" name="dokumentasi_id" value="<?= $group->id; ?>">
                                    <input type="hidden" name="modal_index" value="<?= $i; ?>">
                                    <div class="mb-2">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                                    </div>
                                    <div class="mb-2">
                                        <textarea name="isi_komentar" class="form-control" rows="2" placeholder="Tulis komentar..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<style>
    .card {
        height: 400px;
        /* tambah tinggi total kartu */
        max-width: 300px;
        display: flex;
        flex-direction: column;
    }

    .card img.card-img-top {
        height: 280px;
        /* sesuaikan juga */
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 240px;
        /* dulunya 180px */
        width: 100%;
        background-color: rgba(0, 0, 0, 0);
        transition: background-color 0.3s ease;
        z-index: 1;
    }

    .card-img-container {
        overflow: hidden;
        height: 280px;
        /* dari 240px jadi 280px */
        width: 100%;
    }

    /* Efek zoom saat hover */
    .card:hover img.card-img-top {
        transform: scale(1.1);
    }

    .card-body {
        padding: 12px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-grow: 1;
        background-color: #fff;
    }

    .card-title {
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .owl-carousel .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
        pointer-events: none;
    }

    .owl-carousel .owl-nav button {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 24px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: none;
        pointer-events: auto;
        transition: 0.3s ease;
    }

    .owl-carousel .owl-nav button:hover {
        background-color: #388da8;
    }
</style>

<script>
    $(document).ready(function() {
        $('.tombol-like').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('dokumentasi/like/'); ?>' + id,
                type: 'POST',
                success: function() {
                    // Setelah like berhasil, update jumlah suka
                    let countSpan = $('.like-count-' + id);
                    let currentCount = parseInt(countSpan.text());
                    countSpan.text(currentCount + 1);
                },
                error: function() {
                    alert('Gagal menyukai. Coba lagi.');
                }
            });
        });
    });
</script>