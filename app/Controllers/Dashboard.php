<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SetoranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $setoranModel = new SetoranModel();
        $juruparkirModel = new \App\Models\JuruparkirModel();
        $petugasModel = new \App\Models\PetugasModel();

        $builder = $setoranModel->builder();

        // Query to get total pendapatan grouped by week (year-week)
        $builder->select("YEAR(tanggal_setoran) as year, WEEK(tanggal_setoran, 1) as week, SUM(jumlah_setoran) as total_pendapatan");
        $builder->groupBy(['year', 'week']);
        $builder->orderBy('year', 'DESC');
        $builder->orderBy('week', 'DESC');

        $query = $builder->get();
        $data['weekly_pendapatan'] = $query->getResultArray();

        // Calculate total pendapatan (sum of all jumlah_setoran)
        $totalPendapatan = $setoranModel->selectSum('jumlah_setoran')->first();
        $data['total_pendapatan'] = $totalPendapatan['jumlah_setoran'] ?? 0;

        // Calculate total users (sum of juru parkir and petugas)
        $totalJuruparkir = $juruparkirModel->countAllResults();
        $totalPetugas = $petugasModel->countAllResults();
        $data['total_users'] = $totalJuruparkir + $totalPetugas;

        // Get recent activities - latest 5 setoran_parkir with juru_parkir name
        $builderRecent = $setoranModel->builder();
        $builderRecent->select('setoran_parkir.tanggal_setoran, setoran_parkir.jumlah_setoran, juru_parkir.nama');
        $builderRecent->join('juru_parkir', 'setoran_parkir.id = juru_parkir.id');
        $builderRecent->orderBy('setoran_parkir.tanggal_setoran', 'DESC');
        $builderRecent->limit(5);
        $data['recent_activities'] = $builderRecent->get()->getResultArray();

        return view('dashboard/index', $data);
    }
}