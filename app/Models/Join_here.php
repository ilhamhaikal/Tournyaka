<?php

namespace App\Models;

use CodeIgniter\Model;

class Join_here extends Model
{
    protected $table = 'join_here';

    protected $allowedFields = [
        'Judul', 'konten',
    ];
}
