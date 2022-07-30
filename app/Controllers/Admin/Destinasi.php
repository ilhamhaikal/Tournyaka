<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DestinasiModel;

class Destinasi extends BaseController
{
    protected $destinasiModel;
    public function __construct()
    {
        $this->destinasiModel = new DestinasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Tournyaka',
            'heading' => 'Destinasi Wisata'
        ];

        return view('/admin/pages/destinasi', $data);
    }

    public function get_data()
    {
        if ($this->request->isAJAX()) {
            $destinasi = $this->destinasiModel->findAll();
            $data = [
                'destinasi' => $destinasi
            ];

            $msg = [
                'data' => view('/admin/pages/data_destinasi', $data)
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
                'data' => view('/admin/modal/tambah_destinasi')
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
                'nm_destinasi' => [
                    'rules' => 'required|is_unique[destinasi.nm_destinasi]',
                    'errors' => [
                        'required' => 'Destinasi tidak boleh kosong',
                        'is_unique' => 'Destinasi ' . $this->request->getPost('nm_destinasi') . ' sudah ada'
                    ]
                ],
                'desc_destinasi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi tidak boleh kosong'
                    ]
                ],
                'img_destinasi' => [
                    'rules' => 'uploaded[img_destinasi]|max_size[img_destinasi,1024]|is_image[img_destinasi]|mime_in[img_destinasi,image/jpg,image/jpeg,image/png]',
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
                        'nm_destinasi' => $validation->getError('nm_destinasi'),
                        'desc_destinasi' => $validation->getError('desc_destinasi'),
                        'img_destinasi' => $validation->getError('img_destinasi')
                    ]
                ];
            } else {
                // ambil gambar
                $imgDestinasi = $this->request->getFile('img_destinasi');

                // generate nama gambar random
                $nmImg = $imgDestinasi->getRandomName();

                // pindah gambar ke server
                $imgDestinasi->move('assets/img/destinasi', $nmImg);

                $this->destinasiModel->save([
                    'nm_destinasi' => $this->request->getPost('nm_destinasi'),
                    'desc_destinasi' => $this->request->getPost('desc_destinasi'),
                    'img_destinasi' => $nmImg
                ]);

                $msg = [
                    'sukses' => 'Destinasi berhasil ditambahkan'
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

            $destinasi = $this->destinasiModel->find($id);
            $data = [
                'id' => $destinasi['id'],
                'nm_destinasi' => $destinasi['nm_destinasi'],
                'img_destinasi' => $destinasi['img_destinasi']
            ];

            $msg = [
                'data' => view('/admin/modal/modal_destinasi', $data)
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

            $old_destinasi = $this->destinasiModel->find($this->request->getVar('id'));
            if ($old_destinasi['nm_destinasi'] == $this->request->getVar('nm_destinasi')) {
                $rule_nm_destinasi = 'required';
            } else {
                $rule_nm_destinasi = 'required|is_unique[destinasi.nm_destinasi]';
            }

            $valid = $this->validate([
                'nm_destinasi' => [
                    'rules' => $rule_nm_destinasi,
                    'errors' => [
                        'required' => 'Destinasi tidak boleh kosong',
                        'is_unique' => 'Destinasi ' . $this->request->getPost('nm_destinasi') . ' sudah ada'
                    ]
                ],
                'desc_destinasi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi tidak boleh kosong'
                    ]
                ],
                'img_destinasi' => [
                    'rules' => 'max_size[img_destinasi,1024]|is_image[img_destinasi]|mime_in[img_destinasi,image/jpg,image/jpeg,image/png]',
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
                        'nm_destinasi' => $validation->getError('nm_destinasi'),
                        'desc_destinasi' => $validation->getError('desc_destinasi')
                    ]
                ];
            } else {
                // ambil gambar
                $imgDestinasi = $this->request->getFile('img_destinasi');

                if ($imgDestinasi->getError() == 4) {
                    $nmImg = $this->request->getVar('old_img');
                } else {
                    // generate nama gambar random
                    $nmImg = $imgDestinasi->getRandomName();

                    // upload gambar ke server
                    $imgDestinasi->move('assets/img/destinasi', $nmImg);

                    //hapus gambar lama
                    unlink('assets/img/destinasi/' . $this->request->getVar('old_img'));
                }


                $this->destinasiModel->save([
                    'id' => $this->request->getPost('id'),
                    'nm_destinasi' => $this->request->getPost('nm_destinasi'),
                    'desc_destinasi' => $this->request->getPost('desc_destinasi'),
                    'img_destinasi' => $nmImg
                ]);

                $msg = [
                    'sukses' => 'Destinasi berhasil diupdate'
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
            $destinasi = $this->destinasiModel->find($id);
            //hapus gambar
            unlink('assets/img/destinasi/' . $destinasi['img_destinasi']);

            // Hapus data
            $this->destinasiModel->delete($id);

            $msg = [
                'sukses' => 'Destinasi berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }
}
