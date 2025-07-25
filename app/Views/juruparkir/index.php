<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Daftar Juru Parkir</h1>
<a href="/juruparkir/create" class="btn btn-primary mb-3">Tambah Juru Parkir</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($juruparkir as $jp): ?>
        <tr>
            <td><?= $jp['id'] ?></td>
            <td><?= $jp['nama'] ?></td>
            <td><?= $jp['no_hp'] ?></td>
            <td><?= $jp['alamat'] ?></td>
            <td>
                <a href="/juruparkir/edit/<?= $jp['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/juruparkir/delete/<?= $jp['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
