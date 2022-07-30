<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Events extends BaseController
{
    protected $eventModel;
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Tournyaka',
            'heading' => 'Events'
        ];

        return view('/admin/pages/events', $data);
    }

    public function get_data()
    {
        if ($this->request->isAJAX()) {
            $event = $this->eventModel->findAll();
            $data = [
                'events' => $event
            ];

            $msg = [
                'data' => view('/admin/pages/data_events', $data)
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function form_tambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('/admin/modal/tambah_events')
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function tambah_data()
    {
        if ($this->request->isAJAX()) {
            // Inisialisasi Validation
            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nm_event' => [
                    'rules' => 'required|is_unique[event.nm_event]',
                    'errors' => [
                        'required' => 'Event tidak boleh kosong',
                        'is_unique' => 'Event ' . $this->request->getPost('nm_event') . ' sudah ada'
                    ]
                ],
                'desc_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi tidak boleh kosong'
                    ]
                ],
                'date_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal tidak boleh kosong'
                    ]
                ],
                'harga_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Event tidak boleh kosong'
                    ]
                ],
                'img_event' => [
                    'rules' => 'uploaded[img_event]|max_size[img_event,1024]|is_image[img_event]|mime_in[img_event,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Pilih gambar terlebih dahulu',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nm_event' => $validation->getError('nm_event'),
                        'desc_event' => $validation->getError('desc_event'),
                        'img_event' => $validation->getError('img_event'),
                        'date_event' => $validation->getError('date_event'),
                        'harga_event' => $validation->getError('harga_event'),
                    ]
                ];
            } else {
                // ambil tanggal
                $tgl = date("Y-m-d", strtotime($this->request->getPost('date_event')));

                // ambil waktu
                $waktu = date("H:i", strtotime($this->request->getPost('date_event')));

                // ambil gambar
                $imgEvent = $this->request->getFile('img_event');

                // generate nama gambar random
                $nmImg = $imgEvent->getRandomName();

                // pindah gambar ke server
                $imgEvent->move('assets/img/event', $nmImg);

                // kondisi harga diskon tidak diisi
                if ($this->request->getPost('harga_diskon') === '') {
                    $diskon = 1;
                } else {
                    $diskon = $this->request->getPost('harga_diskon');
                }

                $this->eventModel->save([
                    'nm_event' => $this->request->getPost('nm_event'),
                    'desc_event' => $this->request->getPost('desc_event'),
                    'date_event' => $tgl,
                    'time_event' => $waktu . " WIB",
                    'terlaksana' => 0,
                    'harga_event' => $this->request->getPost('harga_event'),
                    'harga_diskon' => $diskon,
                    'img_event' => $nmImg
                ]);

                $msg = [
                    'sukses' => 'Event berhasil ditambahkan'
                ];
            }

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function form_edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $event = $this->eventModel->find($id);
            // ambil tanggal
            $tgl = date("m/d/Y", strtotime($event['date_event']));

            // ambil waktu
            $waktu = date("H:i A", strtotime($event['time_event']));
            $date = $tgl . " " . $waktu;

            $data = [
                'id' => $event['id'],
                'nm_event' => $event['nm_event'],
                'desc_event' => $event['desc_event'],
                'img_event' => $event['img_event'],
                'harga_event' => $event['harga_event'],
                'harga_diskon' => $event['harga_diskon'],
                'date_event' => $date,
                'time_event' => $event['time_event'],
            ];

            $msg = [
                'data' => view('/admin/modal/modal_events', $data)
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function update_data()
    {
        if ($this->request->isAJAX()) {
            // Inisialisasi Validation
            $validation =  \Config\Services::validation();

            $old_event = $this->eventModel->find($this->request->getVar('id'));
            if ($old_event['nm_event'] == $this->request->getVar('nm_event')) {
                $rule_nm_event = 'required';
            } else {
                $rule_nm_event = 'required|is_unique[event.nm_event]';
            }

            $valid = $this->validate([
                'nm_event' => [
                    'rules' => $rule_nm_event,
                    'errors' => [
                        'required' => 'event tidak boleh kosong',
                        'is_unique' => 'event ' . $this->request->getPost('nm_event') . ' sudah ada'
                    ]
                ],
                'desc_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi tidak boleh kosong'
                    ]
                ],
                'date_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal tidak boleh kosong'
                    ]
                ],
                'harga_event' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harga Event tidak boleh kosong'
                    ]
                ],
                'img_event' => [
                    'rules' => 'max_size[img_event,1024]|is_image[img_event]|mime_in[img_event,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nm_event' => $validation->getError('nm_event'),
                        'desc_event' => $validation->getError('desc_event')
                    ]
                ];
            } else {
                // ambil tanggal
                $tgl = date("Y-m-d", strtotime($this->request->getPost('date_event')));

                // ambil waktu
                $waktu = date("H:i", strtotime($this->request->getPost('date_event')));

                // ambil gambar
                $imgEvent = $this->request->getFile('img_event');

                if ($imgEvent->getError() == 4) {
                    $nmImg = $this->request->getVar('old_img');
                } else {
                    // generate nama gambar random
                    $nmImg = $imgEvent->getRandomName();

                    // upload gambar ke server
                    $imgEvent->move('assets/img/event', $nmImg);

                    //hapus gambar lama
                    unlink('assets/img/event/' . $this->request->getVar('old_img'));
                }

                // kondisi harga diskon tidak diisi
                if ($this->request->getPost('harga_diskon') === '') {
                    $diskon = 1;
                } else {
                    $diskon = $this->request->getPost('harga_diskon');
                }

                $this->eventModel->save([
                    'id' => $this->request->getPost('id'),
                    'nm_event' => $this->request->getPost('nm_event'),
                    'desc_event' => $this->request->getPost('desc_event'),
                    'date_event' => $tgl,
                    'time_event' => $waktu . " WIB",
                    'terlaksana' => 0,
                    'harga_event' => $this->request->getPost('harga_event'),
                    'harga_diskon' => $diskon,
                    'img_event' => $nmImg
                ]);

                $msg = [
                    'sukses' => 'Event berhasil diupdate'
                ];
            }

            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            // Cari gambar
            $event = $this->eventModel->find($id);
            //hapus gambar
            unlink('assets/img/event/' . $event['img_event']);

            // Hapus data
            $this->eventModel->delete($id);

            $msg = [
                'sukses' => 'Event berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }
}
