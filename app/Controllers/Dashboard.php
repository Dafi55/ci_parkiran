<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SetoranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $setoranModel = new SetoranModel();

        $builder = $setoranModel->builder();

        // Query to get total pendapatan grouped by week (year-week)
        $builder->select("YEAR(tanggal_setoran) as year, WEEK(tanggal_setoran, 1) as week, SUM(jumlah_setoran) as total_pendapatan");
        $builder->groupBy(['year', 'week']);
        $builder->orderBy('year', 'DESC');
        $builder->orderBy('week', 'DESC');

        $query = $builder->get();
        $data['weekly_pendapatan'] = $query->getResultArray();

        return view('dashboard/index', $data);
    }
}
