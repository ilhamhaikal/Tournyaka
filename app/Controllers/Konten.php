<?php

namespace App\Controllers;

use App\Models\LandingModel;

class Konten extends BaseController
{
    protected $landingModel;
    public function __construct()
    {
        $this->landingModel = new LandingModel();
    }

    public function update()
    {
        $id = $this->request->getPost('konten_id');
        if ($id == '1') {
            $data = [
                'id' => 1,
                'desc_cover' => $this->request->getPost('konten')
            ];
        } elseif ($id == '2') {
            $data = [
                'id' => 1,
                'desc_tournyaka' => $this->request->getPost('konten')
            ];
        } elseif ($id == '3') {
            $data = [
                'id' => 1,
                'desc_event' => $this->request->getPost('konten')
            ];
        }

        $this->landingModel->save($data);
        return redirect()->back();
    }
}
