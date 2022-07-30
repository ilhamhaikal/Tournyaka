<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoice';

    protected $primaryKey = 'invoice_id';

    // protected $useAutoIncrement = false;

    protected $allowedFields = [
        'invoice_id', 'order_id', 'token', 'gross_amount', 'payment_type', 'transaction_time', 'bank', 'va_number', 'pdf_url', 'transaction_status', 'user_id', 'event_id'
    ];
}
