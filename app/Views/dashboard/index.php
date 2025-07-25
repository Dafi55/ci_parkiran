<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Pendapatan Mingguan</h1>
    <p class="mb-0">Ringkasan pendapatan dan pengguna parkir.</p>
</div>

<!-- Summary Cards -->
<div class="row">

    <!-- Total Pendapatan Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pendapatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp <?= isset($total_pendapatan) ? number_format($total_pendapatan, 2, ',', '.') : '0,00' ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total User Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= isset($total_users) ? esc($total_users) : '0' ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Minggu Ke- Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Minggu Ke-</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            if (isset($weekly_pendapatan) && count($weekly_pendapatan) > 0) {
                                echo esc($weekly_pendapatan[0]['week'] == 0 ? 1 : $weekly_pendapatan[0]['week']);
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tahun Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tahun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            if (isset($weekly_pendapatan) && count($weekly_pendapatan) > 0) {
                                echo esc($weekly_pendapatan[0]['year']);
                            } else {
                                echo '0';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Attractive Content Below Summary Cards -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="card-title font-weight-bold text-primary mb-2">Selamat datang di dashboard Parkiran</h4>
                    <p class="card-text mb-1">Gunakan menu di sebelah kiri untuk mengelola data Juru Parkir, Petugas, dan Setoran.</p>
                    <p class="card-text mb-3">Pantau pendapatan mingguan dan jumlah pengguna secara real-time di sini.</p>
                </div>
                <div>
                    
                </div>
                <div>
                    <a href="/setoran" class="btn btn-primary btn-lg shadow-sm">Lihat Data Setoran</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
    </div>
    <div class="card-body">
        <?php if (isset($recent_activities) && count($recent_activities) > 0): ?>
            <ul class="list-group">
                <?php foreach ($recent_activities as $activity): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?= esc($activity['nama']) ?></strong> melakukan setoran sebesar
                            <span class="text-primary">Rp <?= number_format($activity['jumlah_setoran'], 2, ',', '.') ?></span>
                        </div>
                        <small class="text-muted"><?= date('d M Y', strtotime($activity['tanggal_setoran'])) ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-center text-muted">Tidak ada aktivitas terbaru.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
