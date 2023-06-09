<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Pasien extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Pasien_model', 'pasien');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $pasien = $this->pasien->getPasien();
        } else {
            $pasien = $this->pasien->getPasien($id);
        }
        if ($pasien) {
            $arrayPasien = [];
            foreach ($pasien as $pasien) {
                $arrayPasien[] = [
                    'nomor_rm' => $pasien['nomor_rm'],
                    'nama' => $pasien['nama'],
                    'tanggal_lahir' => $pasien['tanggal_lahir'],
                    'nomor_telepon' => $pasien['nomor_telepon'],
                    'alamat' => $pasien['alamat']

                ];
            }
            $this->response($arrayPasien, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Pasien tidak Ditemukan'
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
            if ($this->pasien->deletePasien($id) > 0) {
                // Oke
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data Pasien Berhasil Dihapus'
                ], RestController::HTTP_OK);
            } else {
                // Delete Gagal
                $this->response([
                    'status' => false,
                    'message' => 'Data pasien tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nomor_rm' => $this->post('nomor_rm'),
            'nama' => $this->post('nama'),
            'tanggal_lahir' => $this->post('tanggal_lahir'),
            'nomor_telepon' => $this->post('nomor_telepon'),
            'alamat' => $this->post('alamat')
        ];

        if ($this->pasien->createPasien($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Pasien Berhasil Ditambahkan'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Menambahkan Data Pasien'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nomor_rm' => $this->put('nomor_rm'),
            'nama' => $this->put('nama'),
            'tanggal_lahir' => $this->put('tanggal_lahir'),
            'nomor_telepon' => $this->put('nomor_telepon'),
            'alamat' => $this->put('alamat')
        ];

        if ($this->pasien->updatePasien($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Pasien Berhasil Diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Mengubah Data Pasien'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
