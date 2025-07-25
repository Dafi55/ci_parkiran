<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Petugas</h1>
    <p class="mb-0">Ubah data petugas pada form di bawah ini.</p>
</div>

<!-- Card container for the form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form to edit existing petugas -->
        <form action="/petugas/update/<?= esc($petugas['id']) ?>" method="post">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc($petugas['username']) ?>" placeholder="Masukkan username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password (kosongkan jika tidak diubah)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru jika ingin mengubah">
            </div>
            <div class="form-group mb-3">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= esc($petugas['nama_lengkap']) ?>" placeholder="Masukkan nama lengkap" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="/petugas" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
