<?php

use GuzzleHttp\Client;

class Nasabah_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/BANK-AGUNG/api/',
            // 'auth' => ['bni46', 'bni46'],
        ]);
    }

    public function getAllNasabah()
    {
        # Memanggil dari database
        // return $this->db->get('nasabah')->result_array();
        // Untuk memanggil database dengan nama tabel nasabah dan dijadikan data array

        # Memanggil dari API
        $response = $this->_client->request('GET', 'nasabah');
        ################ Ingat pemanggilan QUERY adalah untuk PARAMS pada Postman ###########

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
        
    }
    
    public function getNasabahById($id)
    {
        # Memanggil dari database
        // return $this->db->get_where('nasabah', ['id' => $id])->row_array();
        
        # Memanggil dari API
        $response = $this->_client->request('GET', 'nasabah', [
            'query' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataNasabah()
    {

        $data = [
            "ktp" => $this->input->post('ktp', true), // true untuk menghindari sqlInjection
            "nama" => $this->input->post('nama', true), // true untuk menghindari sqlInjection
            "alamat" => $this->input->post('alamat', true), // true untuk menghindari sqlInjection
            "tempatlahir" => $this->input->post('tempatlahir', true), // true untuk menghindari sqlInjection
            "tanggal" => $this->input->post('tanggal', true), // true untuk menghindari sqlInjection
            "telp" => $this->input->post('telp', true), // true untuk menghindari sqlInjection
        ];

        $response = $this->_client->request('POST', 'nasabah', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
        
    }
    
    
    public function hapusDataNasabah($id)
    {
        # Memanggil dari database
        // $this->db->where('id', $id);
        // $this->db->delete('nasabah');

        // Untuk mebuat code seperti diatas, tetapi lebih singkat
        // $this->db->delete('nasabah', ['id' => $id]);

        // return $this->db->affected_rows();

        # Memanggil dari API
        $response = $this->_client->request('DELETE', 'nasabah', [
            'form_params' =>  [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }


    public function ubahDataNasabah()
    {
        $data = [
            "ktp" => $this->input->post('ktp', true), // true untuk menghindari sqlInjection
            "nama" => $this->input->post('nama', true), // true untuk menghindari sqlInjection
            "alamat" => $this->input->post('alamat', true), // true untuk menghindari sqlInjection
            "tempatlahir" => $this->input->post('tempatlahir', true), // true untuk menghindari sqlInjection
            "tanggal" => $this->input->post('tanggal', true), // true untuk menghindari sqlInjection
            "telp" => $this->input->post('telp', true), // true untuk menghindari sqlInjection
            "id" => $this->input->post('id', true) // true untuk menghindari sqlInjection
        ];

        # Memanggil dari API
        $response = $this->_client->request('PUT', 'nasabah', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;

        # Memanggil dari Database
        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('nasabah', $data);

        // Untuk data pada POSTMAN
        // return $this->db->affected_rows();
    }

    public function cariDataNasabah()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('ktp', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('nasabah')->result_array();
    }

    public function getNasabah($id = null)
    {
        if ( $id === null ) {
            return $this->db->get('nasabah')->result_array();
        } else {
            return $this->db->get_where('nasabah', ['id' => $id])->result_array();
        }
    }

    public function tambahNasabah()
    {
        $data = [
            "ktp" => $this->input->post('ktp', true), // true untuk menghindari sqlInjection
            "nama" => $this->input->post('nama', true), // true untuk menghindari sqlInjection
            "alamat" => $this->input->post('alamat', true), // true untuk menghindari sqlInjection
            "tempatlahir" => $this->input->post('tempatlahir', true), // true untuk menghindari sqlInjection
            "tanggal" => $this->input->post('tanggal', true), // true untuk menghindari sqlInjection
            "telp" => $this->input->post('telp', true) // true untuk menghindari sqlInjection
        ];
        
        $this->db->insert('nasabah', $data);

        // Untuk data pada POSTMAN
        return $this->db->affected_rows();
    }

    public function deleteNasabah($id)
    {
        $this->db->delete('nasabah', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function updateNasabah($data, $id)
    {
        $this->db->update('nasabah', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

}