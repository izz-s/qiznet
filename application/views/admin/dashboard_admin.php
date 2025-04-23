<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Selamat datang, <?= $admin_name; ?></h2>
        <div>
            <h5 id="tanggal" class="mb-0"></h5>
            <small id="jam"></small>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="p-4 rounded box-dashboard">Jumlah Produk: <strong><?= $jumlah_produk; ?></strong></div>
        </div>
        <div class="col-md-3">
            <div class="p-4 rounded box-dashboard">Jumlah Artikel: <strong><?= $jumlah_artikel; ?></strong></div>
        </div>
        <div class="col-md-3">
            <div class="p-4 rounded box-dashboard">Jumlah Dokumentasi: <strong><?= $jumlah_dokumentasi; ?></strong></div>
        </div>
        <div class="col-md-3">
            <div class="p-4 rounded box-dashboard">Pesan Kontak: <strong><?= $jumlah_pesan; ?></strong></div>
        </div>
    </div>
</div>

<script>
    function updateDateTime() {
        const now = new Date();
        const optionsTanggal = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const tanggal = now.toLocaleDateString('id-ID', optionsTanggal);
        const jam = now.toLocaleTimeString('id-ID');

        document.getElementById('tanggal').innerText = tanggal;
        document.getElementById('jam').innerText = jam;
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>