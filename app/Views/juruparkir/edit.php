<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Edit Juru Parkir</h1>
<form action="/juruparkir/update/<?= $juruparkir['id'] ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $juruparkir['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $juruparkir['no_hp'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $juruparkir['alamat'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/juruparkir" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
