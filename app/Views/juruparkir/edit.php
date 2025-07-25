<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Juru Parkir</h1>
    <p class="mb-0">Ubah data juru parkir pada form di bawah ini.</p>
</div>

<!-- Card container for the form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form to edit existing juru parkir -->
        <form action="/juruparkir/update/<?= esc($juruparkir['id']) ?>" method="post">
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($juruparkir['nama']) ?>" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc($juruparkir['no_hp']) ?>" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required><?= esc($juruparkir['alamat']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="/juruparkir" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
