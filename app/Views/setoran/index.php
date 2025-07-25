<?= $this->extend('layout/main') ?>
<?php $this->section('content') ?>

<div class="card">
    <div class="card-header text-center">Data Mahasiswa</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>aksi</th>
                </tr>
            </thead>
    </div>
    <?php $this->endsection() ?>