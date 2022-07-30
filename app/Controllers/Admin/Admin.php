<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Tournyaka',
            'heading' => 'Dashboard'
        ];
        return view('/admin/pages/dashboard', $data);
    }
}
