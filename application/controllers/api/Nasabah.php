<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Nasabah extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Untuk memanggil database agar dapat dipakai disemua method di dalam class nasabah//
        // $this->load->database();
        $this->load->model('Nasabah_model', 'nasabah');

        // $this->methods['index_get']['limit'] = 999;
    }

    public function index_get()
    {

        $id = $this->get('id');
        if ( $id === null ) {
            $nasabah = $this->nasabah->getNasabah();
        } else {
            $nasabah = $this->nasabah->getNasabah($id);
        }

        if ( $nasabah ) {
            $this->response([
                'status' => true,
                'data' => $nasabah
            ], REST_Controller::HTTP_OK);
        }  else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ( $id === null ) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ( $this->nasabah->deleteNasabah($id) > 0 ) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'ktp' => $this->post('ktp'),
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'tempatlahir' => $this->post('tempatlahir'),
            'tanggal' => $this->post('tanggal'),
            'telp' => $this->post('telp'),
        ];

        if( $this->nasabah->tambahNasabah($data) > 0 ) {
            $this->response([
                'status' => true,
                'message' => 'new data nasabah has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to created new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'ktp' => $this->put('ktp'),
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'tempatlahir' => $this->put('tempatlahir'),
            'tanggal' => $this->put('tanggal'),
            'telp' => $this->put('telp'),
        ];

        if( $this->nasabah->updateNasabah($data, $id) > 0 ) {
            $this->response([
                'status' => true,
                'message' => 'data nasabah has been updated.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}