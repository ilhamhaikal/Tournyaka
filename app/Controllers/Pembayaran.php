<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\InvoiceModel;
use Google\Service\AlertCenter\User;

class Pembayaran extends BaseController
{
    protected $invoiceModel;
    protected $eventModel;

    public function __construct()
    {
        $this->invoiceModel = new InvoiceModel();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $pembayaran = $this->invoiceModel->where('user_id', User()->id)->findAll();
        $event = $this->eventModel->find($pembayaran[0]['event_id']);
        // dd($event);

        $data = [
            'title' => 'Pembayaran | Tournyaka',
            'pembayaran' => $pembayaran,
            'event' => $event
        ];

        return view('/pages/list_pembayaran', $data);
    }
}
