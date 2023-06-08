<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Poli extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Poli_model', 'poli');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $poli = $this->poli->getPoli();
        } else {
            $poli = $this->poli->getPoli($id);
        }
        if ($poli) {
            $arrayPoli = [];
            foreach ($poli as $poli) {
                $arrayPoli[] = [
                    'id' => $poli['id'],
                    'nama_poli' => $poli['nama_poli']

                ];
            }
            $this->response($arrayPoli, RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'Data tidak Ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }



    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'message' => 'Silakan Masukkan ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->poli->deletePoli($id) > 0) {
                $arrayPoli = [];
                // Oke
                $this->response([
                    'id' => $id,
                    'message' => 'Data deleted succesfully'
                ], RestController::HTTP_OK);
            } else {
                // Delete Gagal
                $this->response([
                    'message' => 'Data tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama_poli' => $this->post('nama_poli')
        ];

        if ($this->poli->createPoli($data) > 0) {
            $this->response([
                'message' => 'Data Poli Berhasil Ditambahkan'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'Gagal Menambahkan Data'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama_poli' => $this->put('nama_poli')
        ];

        if ($this->poli->updatePoli($data, $id) > 0) {
            $this->response([
                'message' => 'Data Poli Berhasil Diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'Gagal Mengubah Data'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
