<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Edit Petugas</h1>
<form action="/petugas/update/<?= $petugas['id'] ?>" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= esc($petugas['username']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= esc($petugas['nama_lengkap']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/petugas" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
