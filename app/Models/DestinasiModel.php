<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
    protected $table = 'destinasi';

    protected $allowedFields = [
        'nm_destinasi', 'desc_destinasi', 'img_destinasi'
    ];
}
