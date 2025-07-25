<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Edit Setoran Parkir</h1>
<form action="/setoran/update/<?= $setoran['id'] ?>" method="post">
    <div class="mb-3">
        <label for="id_petugas" class="form-label">Petugas</label>
        <select class="form-control" id="id_petugas" name="id_petugas" required>
            <option value="">-- Pilih Petugas --</option>
            <?php foreach ($petugas as $p): ?>
                <option value="<?= esc($p['id']) ?>" <?= $p['id'] == $setoran['id_petugas'] ? 'selected' : '' ?>><?= esc($p['nama_lengkap']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_setoran" class="form-label">Tanggal Setoran</label>
        <input type="date" class="form-control" id="tanggal_setoran" name="tanggal_setoran" value="<?= esc($setoran['tanggal_setoran']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="jumlah_setoran" class="form-label">Jumlah Setoran</label>
        <input type="number" step="0.01" class="form-control" id="jumlah_setoran" name="jumlah_setoran" value="<?= esc($setoran['jumlah_setoran']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="target" class="form-label">Target</label>
        <input type="number" class="form-control" id="target" name="target" value="<?= esc($setoran['target']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= esc($setoran['keterangan']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/setoran" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
