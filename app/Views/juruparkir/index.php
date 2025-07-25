<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Juru Parkir</h1>
    <a href="/juruparkir/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Juru Parkir
    </a>
</div>

<!-- Card container for the table -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Juru Parkir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Table displaying juru parkir data -->
            <table class="table table-bordered" width="100%" cellspacing="0">
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
                    <?php if (!empty($juruparkir) && is_array($juruparkir)): ?>
                        <?php foreach ($juruparkir as $jp): ?>
                            <tr>
                                <td><?= esc($jp['id']) ?></td>
                                <td><?= esc($jp['nama']) ?></td>
                                <td><?= esc($jp['no_hp']) ?></td>
                                <td><?= esc($jp['alamat']) ?></td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="/juruparkir/edit/<?= esc($jp['id']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete button with confirmation -->
                                    <a href="/juruparkir/delete/<?= esc($jp['id']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data juru parkir.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
