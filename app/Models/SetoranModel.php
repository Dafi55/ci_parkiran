<?php

namespace App\Models;

use CodeIgniter\Model;

class SetoranModel extends Model
{
    protected $table = 'setoran_parkir';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_petugas',
        'tanggal_setoran',
        'jumlah_setoran',
        'target',
        'keterangan',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}
