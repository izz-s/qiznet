<!-- Artikel Section -->
<section id="article" class="features section py-5 bg-white">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Artikel</h2>
        <p>Kumpulan artikel menarik seputar teknologi, informasi, dan tips bermanfaat lainnya.</p>
    </div>

    <div class="container">
        <?php if (!empty($artikel)) : ?>
            <div class="owl-carousel owl-article">
                <?php foreach ($artikel as $row) : ?>
                    <?php
                    $judul = addslashes($row["judul"]);
                    $foto = base_url('./assets/img/uploads/artikel/' . $row["foto"]);
                    $konten = addslashes(preg_replace("/[\r\n]+/", "", $row["konten"]));
                    $tanggal = date("d M Y", strtotime($row["created_at"]));
                    $penulis = $row["penulis"] ?? 'Admin';
                    $kategori = $row["kategori"] ?? 'Umum';
                    $url = base_url("artikel/detail/" . $row["slug"]);
                    ?>
                    <div class="item">
                        <div class="card h-100 shadow-sm d-flex flex-column">
                            <img src="<?= $foto ?>" class="card-img-top img-fluid" alt="<?= $judul ?>" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $judul ?></h5>
                                <p class="card-text"><?= word_limiter(strip_tags($row['konten']), 20); ?></p>
                                <a href="javascript:void(0);"
                                    class="read-more mt-auto"
                                    onclick='showModalArtikel(<?= json_encode(compact("judul", "foto", "konten", "tanggal", "penulis", "kategori", "url")) ?>)'>
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-center">Belum ada artikel yang tersedia.</p>
        <?php endif; ?>

    </div>
</section>

<!-- Modal Artikel -->
<div class="modal fade" id="artikelModal" tabindex="-1" aria-labelledby="artikelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-gradient text-white" style="background: linear-gradient(135deg, #388da8, #62c1be);">
                <h5 class="modal-title" id="artikelModalLabel">Judul Artikel</h5>
                <button type="button" class="btn text-dark fw-bold fs-4" data-bs-dismiss="modal" aria-label="Close" style="background: none; border: none;">
                    &times;
                </button>
            </div>
            <div class="modal-body overflow-auto" style="max-height: 80vh;">
                <img id="artikelModalImg" src="" alt="Gambar Artikel" class="img-fluid mb-3 rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                <div class="text-muted mb-3">
                    <small>
                        <i class="bi bi-calendar-event"></i> <span id="tanggalPost"></span> &nbsp;|&nbsp;
                        <i class="bi bi-person"></i> <span id="penulisPost"></span>
                    </small>
                </div>
                <div id="artikelModalKonten" class="mb-4"></div>
                <div>
                    <span>Bagikan:</span>
                    <a id="shareWA" href="#" target="_blank" class="btn btn-success btn-sm ms-2"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    <a id="shareFB" href="#" target="_blank" class="btn btn-primary btn-sm ms-2"><i class="bi bi-facebook"></i> Facebook</a>
                    <a id="shareX" href="#" target="_blank" class="btn btn-dark btn-sm ms-2"><i class="bi bi-twitter-x"></i> X</a>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    /* style artikel */
    .owl-carousel .card {
        min-height: 400px;
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
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

    .modal-body::-webkit-scrollbar {
        width: 8px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    #artikelModalKonten {
        font-size: 1rem;
        line-height: 1.7;
    }

    .btn-sm i {
        margin-right: 5px;
    }
</style>