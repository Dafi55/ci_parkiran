<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Dashboard Pendapatan Mingguan</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tahun</th>
            <th>Minggu Ke-</th>
            <th>Total Pendapatan (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($weekly_pendapatan) && is_array($weekly_pendapatan)): ?>
            <?php foreach ($weekly_pendapatan as $row): ?>
                <tr>
                    <td><?= esc($row['year']) ?></td>
                    <?php if ($row['week'] == 0) {
                        echo '<td> 1 </td>';
                    } else {
                        echo '<td>' . $row['week'] . '</td>';
                    } ?>
                    <td>Rp <?= number_format($row['total_pendapatan'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Data pendapatan tidak tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>