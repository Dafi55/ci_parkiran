<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Daftar Petugas</h1>
<a href="/petugas/create" class="btn btn-primary mb-3">Tambah Petugas</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($petugas) && is_array($petugas)): ?>
            <?php foreach ($petugas as $p): ?>
            <tr>
                <td><?= esc($p['id']) ?></td>
                <td><?= esc($p['username']) ?></td>
                <td><?= esc($p['nama_lengkap']) ?></td>
                <td>
                    <a href="/petugas/edit/<?= esc($p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/petugas/delete/<?= esc($p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Data petugas tidak tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
