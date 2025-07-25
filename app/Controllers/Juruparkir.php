<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Juruparkir extends BaseController
{
    public function index()
    {
        return view('juruparkir');
        
    }
}
