<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\LandingModel;
use App\Models\InvoiceModel;
use Google\Service\AlertCenter\User;

class Event extends BaseController
{
    protected $eventModel;
    protected $landingModel;
    protected $invoiceModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->landingModel = new LandingModel();
        $this->invoiceModel = new InvoiceModel();
        // include librarie midtrans
        require_once APPPATH . '..\vendor\midtrans\midtrans-php\Midtrans.php';
    }

    public function events_berlangsung()
    {
        $event = $this->eventModel->where('terlaksana', 0)->findAll();
        $landing = $this->landingModel->first();

        // Send Email
        // $email = \Config\Services::email();

        // $email->setFrom($email->fromEmail, $email->fromName);
        // $email->setTo(User()->email);

        // $url = base_url('/join_here/' . $event[0]['nm_event']);
        // $url_link = '/join_here/' . $event[0]['nm_event'];
        // $link = anchor($url_link, $url);
        // $email->setSubject($event[0]['nm_event']);
        // $email->setMessage('Testing the email class. ' . $link);

        // if (!$email->send()) {
        //     echo $email->printDebugger();
        // }

        $data = [
            'title' => 'Events Berlangsung | Tournyaka',
            'events' => $event,
            'landing' => $landing
        ];
        return view('/pages/events_berlangsung', $data);
    }

    public function pembayaran()
    {
        if ($this->request->isAJAX()) {
            // get id
            $id = $this->request->getVar('id');

            if (logged_in()) {
                // get data event berdasarkan id
                $event = $this->eventModel->find($id);

                // generate kode transaksi
                $order_id = random_string('numeric', 6);

                // detail pembayaran
                $transaction_details = array(
                    'order_id' => $order_id,
                    'gross_amount' => $event['harga_diskon'],
                );

                // detail event
                $item_details = array(
                    'id' => $id,
                    'price' => $event['harga_diskon'],
                    'quantity' => 1,
                    'name' => $event['nm_event']
                );

                $event_details = array($item_details);

                $name = explode(" ", user()->fullname);
                // detail customer
                $customer_details = array(
                    'first_name'    => $name[0],
                    'last_name'     => $name[1],
                    'email'         => User()->email
                );

                // Fill transaction details
                $transaction = array(
                    'transaction_details' => $transaction_details,
                    'customer_details' => $customer_details,
                    'item_details' => $event_details,
                );

                // get snapToken
                $snapToken = \Midtrans\Snap::getSnapToken($transaction);

                // Inisialisasi Validation
                $validation =  \Config\Services::validation();

                // cek user_id dan event_id pada invoice
                $invoice = $this->invoiceModel->where(['user_id' => user()->id, 'event_id' => $id])->first();

                if ($invoice != null) {
                    if ($validation->check($snapToken, 'is_unique[invoice.token]')) {
                        $snapToken = $invoice['token'];
                    }
                }

                // get client key
                $client_key = \Midtrans\Config::$clientKey;

                $data = [
                    'client_key' => $client_key,
                    'snapToken' => $snapToken,
                    'id_event' => $id
                ];
            } else {
                $data = [];
            }

            $msg = [
                'data' => view('/pages/pembayaran', $data)
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function proses()
    {
        if ($this->request->isAJAX()) {
            // get Data Result
            $result = $this->request->getPost('result');

            $event_id = $this->request->getPost('id_event');

            $statuss = '';

            // cek user_id dan event_id pada invoice
            $invoice = $this->invoiceModel->where(['user_id' => user()->id, 'event_id' => $event_id])->first();

            if ($invoice == null) {
                // set id
                $date = date("Ymd");
                $kode = $date . $result['order_id'];
                // insert data
                $this->invoiceModel->insert([
                    'invoice_id' => $kode,
                    'order_id' => $result['order_id'],
                    'token' => $this->request->getPost('token'),
                    'gross_amount' => $result['gross_amount'],
                    'payment_type' => $result['payment_type'],
                    'transaction_time' => $result['transaction_time'],
                    'bank' => $result['va_numbers'][0]['bank'],
                    'va_number' => $result['va_numbers'][0]['va_number'],
                    'pdf_url' => $result['pdf_url'],
                    'transaction_status' => $this->request->getPost('status'),
                    'user_id' => User()->id,
                    'event_id' => $event_id,
                ]);
            } else {
                try {
                    $statuss = \Midtrans\Transaction::status($invoice['order_id']);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                    die();
                }
                if ($statuss->status_code == "200") {
                    $statuss = $statuss->status_code;
                }
            }

            // response
            $msg = [
                'data' => $statuss
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function finish()
    {
        if ($this->request->isAJAX()) {
            $event_id = $this->request->getPost('id_event');

            // cek user_id dan event_id pada invoice
            $invoice = $this->invoiceModel->where(['user_id' => user()->id, 'event_id' => $event_id])->first();

            $statuss = '';
            if (!$invoice == null) {
                try {
                    $statuss = \Midtrans\Transaction::status($invoice['order_id']);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                    die();
                }
                if ($statuss->status_code == "200") {

                    $data = ['transaction_status' => 'success'];
                    $this->invoiceModel->update($invoice['invoice_id'], $data);
                    $statuss = $statuss->status_code;
                }
            }
            // get data event berdasarkan id
            $event = $this->eventModel->find($event_id);

            // // Send Email
            // $email = \Config\Services::email();

            // // $email->setFrom($email->fromEmail, $email->fromName);
            // // $email->setTo(User()->email);
            // $email->setFrom('Tournyaka@gmail.com', 'Your Name');
            // $email->setTo('ilhamadvntr27@gmail.com');
            // // $email->setCC('another@another-example.com');
            // // $email->setBCC('them@their-example.com');

            // $url = base_url('/join_here');
            // $url_link = '/join_here/' . $event['nm_event'];
            // $link = anchor($url_link, $url);
            // $email->setSubject($event['nm_event']);
            // $email->setMessage('Testing the email class. ' . $link);

            // // $email->send();
            // if (!$email->send()) {
            //     echo "gagal";
            // } else {
            //     echo "berhasil";
            // }

            // response
            $msg = [
                'data' => $statuss
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }
}
