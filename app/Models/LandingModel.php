<?php

namespace App\Models;

use CodeIgniter\Model;

class LandingModel extends Model
{
    protected $table = 'landing_page';

    protected $allowedFields = [
        'desc_cover', 'desc_tournyaka', 'desc_event', 'desc_tentang_kami'
    ];
}
