<?php

namespace App\Controllers;

use App\Models\DestinasiModel;

class Destinasi extends BaseController
{
    protected $destinasiModel;
    public function __construct()
    {
        $this->destinasiModel = new DestinasiModel();
    }

    public function index()
    {
        $destinasi = $this->destinasiModel->findAll();

        $data = [
            'title' => 'Destinasi | Tournyaka',
            'destinasi' => $destinasi
        ];

        return view('/pages/destinasi', $data);
    }
}
