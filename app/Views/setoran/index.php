<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Setoran Parkir</h1>
    <?php if (!isset($petugas) || count($petugas) === 0): ?>
        <a href="/setoran/create" class="btn btn-primary mb-3 disabled" tabindex="-1" aria-disabled="true">Tambah Setoran</a>
    <?php else: ?>
        <a href="/setoran/create" class="btn btn-primary mb-3">Tambah Setoran</a>
    <?php endif; ?>
</div>

<!-- Card container for the table -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Setoran Parkir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Table displaying setoran data -->
            <table class="table table-bordered" width="100%" cellspacing="0">
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
                    <?php if (!empty($setoran) && is_array($setoran)): ?>
                        <?php foreach ($setoran as $st): ?>
                            <tr>
                                <td><?= esc($st['id']) ?></td>
                                <td><?= esc($st['id_petugas']) ?></td>
                                <td><?= esc($st['tanggal_setoran']) ?></td>
                                <td>Rp <?= number_format($st['jumlah_setoran'], 2, ',', '.') ?></td>
                                <td>Rp <?= number_format($st['target'], 2, ',', '.') ?></td>
                                <td><?= esc($st['keterangan']) ?></td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="/setoran/edit/<?= esc($st['id']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete button with confirmation -->
                                    <a href="/setoran/delete/<?= esc($st['id']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Data setoran tidak tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
