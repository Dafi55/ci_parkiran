<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Petugas</h1>
    <a href="/petugas/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Petugas
    </a>
</div>

<!-- Card container for the table -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Table displaying petugas data -->
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($petugas) && is_array($petugas)): ?>
                        <?php foreach ($petugas as $p): ?>
                            <tr>
                                <td><?= esc($p['id']) ?></td>
                                <td><?= esc($p['username']) ?></td>
                                <td><?= esc($p['nama_lengkap']) ?></td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="/petugas/edit/<?= esc($p['id']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete button with confirmation -->
                                    <a href="/petugas/delete/<?= esc($p['id']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Data petugas tidak tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
