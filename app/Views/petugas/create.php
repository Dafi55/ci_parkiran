<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Petugas</h1>
    <p class="mb-0">Isi form di bawah ini untuk menambahkan data petugas baru.</p>
</div>

<!-- Card container for the form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form to add new petugas -->
        <form action="/petugas/store" method="post">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="form-group mb-3">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="/petugas" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
