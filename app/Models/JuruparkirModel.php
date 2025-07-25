<?php

namespace App\Models;

use CodeIgniter\Model;

class JuruparkirModel extends Model
{
    protected $table = 'juru_parkir';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'no_hp',
        'alamat',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}
