<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JuruparkirModel;
use CodeIgniter\HTTP\ResponseInterface;

class Juruparkir extends BaseController
{
    protected $juruparkirModel;

    public function __construct()
    {
        $this->juruparkirModel = new JuruparkirModel();
    }

    public function index()
    {
        $data['juruparkir'] = $this->juruparkirModel->findAll();
        return view('juruparkir/index', $data);
    }

    public function create()
    {
        return view('juruparkir/create');
    }

    public function store()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->juruparkirModel->insert($data);
        return redirect()->to('/juruparkir');
    }

    public function edit($id)
    {
        $data['juruparkir'] = $this->juruparkirModel->find($id);
        return view('juruparkir/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->juruparkirModel->update($id, $data);
        return redirect()->to('/juruparkir');
    }

    public function delete($id)
    {
        $this->juruparkirModel->delete($id);
        return redirect()->to('/juruparkir');
    }
}
