<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event';

    protected $allowedFields = [
        'nm_event', 'desc_event', 'img_event', 'date_event', 'terlaksana', 'harga_event', 'harga_diskon', 'time_event'
    ];
}
