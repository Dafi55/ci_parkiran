<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class Petugas extends BaseController
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new PetugasModel();
    }

    public function index()
    {
        $data['petugas'] = $this->petugasModel->findAll();
        return view('petugas/index', $data);
    }

    public function create()
    {
        return view('petugas/create');
    }

    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];

        $this->petugasModel->insert($data);
        return redirect()->to('/petugas');
    }

    public function edit($id)
    {
        $data['petugas'] = $this->petugasModel->find($id);
        return view('petugas/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $this->petugasModel->update($id, $data);
        return redirect()->to('/petugas');
    }

    public function delete($id)
    {
        $this->petugasModel->delete($id);
        return redirect()->to('/petugas');
    }
}
