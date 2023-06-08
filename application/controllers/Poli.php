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
            $this->response([
                'status' => true,
                'data' => $poli
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak Ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Silakan Masukkan ID'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->poli->deletePoli($id) > 0) {
                // Oke
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data deleted succesfully'
                ], RestController::HTTP_OK);
            } else {
                // Delete Gagal
                $this->response([
                    'status' => false,
                    'message' => 'Data tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'nama_poli' => $this->post('nama_poli')
        ];

        if ($this->poli->createPoli($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Poli Berhasil Ditambahkan'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Menambahkan Data'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id' => $this->put('id'),
            'nama_poli' => $this->put('nama_poli')
        ];

        if ($this->poli->updatePoli($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Poli Berhasil Diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Mengubah Data'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
