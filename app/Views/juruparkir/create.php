<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Juru Parkir</h1>
    <p class="mb-0">Isi form di bawah ini untuk menambahkan data juru parkir baru.</p>
</div>

<!-- Card container for the form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form to add new juru parkir -->
        <form action="/juruparkir/store" method="post">
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="/juruparkir" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
