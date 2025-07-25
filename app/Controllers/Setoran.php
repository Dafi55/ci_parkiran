<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SetoranModel;

class Setoran extends BaseController
{
    protected $setoranModel;

    public function __construct()
    {
        $this->setoranModel = new SetoranModel();
    }

    public function index()
    {
        log_message('debug', 'Setoran::index method called');
        $setoran = $this->setoranModel->findAll();

        $petugasModel = new \App\Models\PetugasModel();
        $petugas = $petugasModel->findAll();

        return view('setoran/index', ['setoran' => $setoran, 'petugas' => $petugas]);
    }

    public function create()
    {
        $petugasModel = new \App\Models\PetugasModel();
        $data['petugas'] = $petugasModel->findAll();
        return view('setoran/create', $data);
    }

    public function store()
    {
        $data = [
            'id_petugas' => $this->request->getPost('id_petugas'),
            'tanggal_setoran' => $this->request->getPost('tanggal_setoran'),
            'jumlah_setoran' => $this->request->getPost('jumlah_setoran'),
            'target' => $this->request->getPost('target'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->setoranModel->insert($data);
        return redirect()->to('/setoran');
    }

    public function edit($id)
    {
        $petugasModel = new \App\Models\PetugasModel();
        $data['petugas'] = $petugasModel->findAll();
        $data['setoran'] = $this->setoranModel->find($id);
        return view('setoran/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_petugas' => $this->request->getPost('id_petugas'),
            'tanggal_setoran' => $this->request->getPost('tanggal_setoran'),
            'jumlah_setoran' => $this->request->getPost('jumlah_setoran'),
            'target' => $this->request->getPost('target'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->setoranModel->update($id, $data);
        return redirect()->to('/setoran');
    }

    public function delete($id)
    {
        $this->setoranModel->delete($id);
        return redirect()->to('/setoran');
    }
}
