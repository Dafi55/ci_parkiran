<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Daftar Setoran Parkir</h1>

<?php 
if (!isset($petugas) || count($petugas) === 0) {
    ?>
<a href="/setoran/create" class="btn btn-primary mb-3 disabled">Tambah Setoran</a>
<?php
} else {
    ?>
<a href="/setoran/create" class="btn btn-primary mb-3">Tambah Setoran</a>

<?php
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Petugas</th>
            <th>Tanggal Setoran</th>
            <th>Jumlah Setoran</th>
            <th>Target</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($setoran) && is_array($setoran)): ?>
            <?php foreach ($setoran as $st): ?>
            <tr>
                <td><?= esc($st['id']) ?></td>
                <td><?= esc($st['id_petugas']) ?></td>
                <td><?= esc($st['tanggal_setoran']) ?></td>
                <td>Rp <?= number_format($st['jumlah_setoran'], 2, ',', '.') ?></td>
                <td>Rp <?= number_format($st['target'], 2, ',', '.') ?></td>
                <td><?= esc($st['keterangan']) ?></td>
                <td>
                    <a href="/setoran/edit/<?= esc($st['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/setoran/delete/<?= esc($st['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Data setoran tidak tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
