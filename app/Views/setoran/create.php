<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Setoran Parkir</h1>
    <p class="mb-0">Isi form di bawah ini untuk menambahkan data setoran parkir baru.</p>
</div>

<!-- Card container for the form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form to add new setoran -->
        <form action="/setoran/store" method="post">
            <div class="form-group mb-3">
                <label for="id_petugas">Petugas</label>
                <select class="form-control" id="id_petugas" name="id_petugas" required>
                    <option value="">-- Pilih Petugas --</option>
                    <?php foreach ($petugas as $p): ?>
                        <option value="<?= esc($p['id']) ?>"><?= esc($p['nama_lengkap']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tanggal_setoran">Tanggal Setoran</label>
                <input type="date" class="form-control" id="tanggal_setoran" name="tanggal_setoran" required>
            </div>
            <div class="form-group mb-3">
                <label for="jumlah_setoran">Jumlah Setoran</label>
                <input type="number" step="0.01" class="form-control" id="jumlah_setoran" name="jumlah_setoran" required>
            </div>
            <div class="form-group mb-3">
                <label for="target">Target</label>
                <input type="number" class="form-control" id="target" name="target" required>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="/setoran" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
