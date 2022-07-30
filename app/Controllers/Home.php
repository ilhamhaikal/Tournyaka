<?php

namespace App\Controllers;

use App\Models\DestinasiModel;
use App\Models\LandingModel;

class Home extends BaseController
{
    protected $destinasiModel;
    protected $landingModel;
    public function __construct()
    {
        $this->destinasiModel = new DestinasiModel();
        $this->landingModel = new landingModel();
    }

    public function index()
    {
        $destinasi = $this->destinasiModel->findAll();
        $landing = $this->landingModel->first();

        $data = [
            'title' => 'Home | Tournyaka',
            'destinasi' => $destinasi,
            'landing' => $landing
        ];

        return view('/pages/dashboard', $data);
    }

    public function tentang_kami()
    {
        $landing = $this->landingModel->first();
        $data = [
            'title' => 'Tentang Kami | Tournyaka',
            'landing' => $landing
        ];
        return view('/pages/tentang_kami', $data);
    }

    public function pangandaran_trivia()
    {
        $data = [
            'title' => 'Pangandaran’s Trivia | Tournyaka'
        ];
        return view('/pages/pangandaran_trivia', $data);
    }

    public function berangkat()
    {
        $data = [
            'title' => 'Pangandaran | Tournyaka'
        ];
        return view('/pages/berangkat', $data);
    }

    public function get_to_know()
    {
        $data = [
            'title' => 'Get To Know | Tournyaka'
        ];
        return view('/pages/get_to_know', $data);
    }

    public function events_terlaksana()
    {
        $data = [
            'title' => 'Events Terlaksana | Tournyaka'
        ];
        return view('/pages/events_terlaksana', $data);
    }

    // public function wuop()
    // {
    //     $data = [
    //         'title' => 'WUOP | Tournyaka'
    //     ];
    //     return view('/pages/wuop', $data);
    // }

    // public function kuliner()
    // {
    //     $data = [
    //         'title' => 'Kuliner | Tournyaka'
    //     ];
    //     return view('/pages/kuliner', $data);
    // }

    // public function budaya()
    // {
    //     $data = [
    //         'title' => 'Budaya | Tournyaka'
    //     ];
    //     return view('/pages/budaya', $data);
    // }

    // public function hidden_gems()
    // {
    //     $data = [
    //         'title' => 'Hidden Gems | Tournyaka'
    //     ];
    //     return view('/pages/hidden_gems', $data);
    // }
}
