<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Pegawai extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $pegawai = $this->pegawai->getPegawai();
        } else {
            $pegawai = $this->pegawai->getPegawai($id);
        }
        if ($pegawai) {
            $arrayPegawai = [];
            foreach ($pegawai as $pegawai) {
                $arrayPegawai[] = [
                    'nip' => $pegawai['nip'],
                    'nama' => $pegawai['nama'],
                    'tanggal_lahir' => $pegawai['tanggal_lahir'],
                    'nomor_telepon' => $pegawai['nomor_telepon'],
                    'email' => $pegawai['email'],
                    'password' => $pegawai['password'],
                ];
            }
            $this->response($arrayPegawai, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data Pegawai tidak Ditemukan'
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
            if ($this->pegawai->deletePegawai($id) > 0) {
                // Oke
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Data Pegawai Berhasil Dihapus'
                ], RestController::HTTP_OK);
            } else {
                // Delete Gagal
                $this->response([
                    'status' => false,
                    'message' => 'Data Pegawai tidak Ditemukan'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nip' => $this->post('nip'),
            'nama' => $this->post('nama'),
            'tanggal_lahir' => $this->post('tanggal_lahir'),
            'nomor_telepon' => $this->post('nomor_telepon'),
            'email' => $this->post('email'),
            'password' => $this->post('password')
        ];

        if ($this->pegawai->createPegawai($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Pegawai Berhasil Ditambahkan'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Menambahkan Data Pegawai'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nip' => $this->put('nip'),
            'nama' => $this->put('nama'),
            'tanggal_lahir' => $this->put('tanggal_lahir'),
            'nomor_telepon' => $this->put('nomor_telepon'),
            'email' => $this->put('email'),
            'password' => $this->put('password')
        ];

        if ($this->pegawai->updatePegawai($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Pegawai Berhasil Diubah'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Mengubah Data Pegawai'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
