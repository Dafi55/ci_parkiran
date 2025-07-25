<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('setoran/index');
    }
    public function main(): string
    {
        return view('layout/main');
    }
}
