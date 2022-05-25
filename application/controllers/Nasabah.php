<?php

class Nasabah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Untuk memanggil database agar dapat dipakai disemua method di dalam class nasabah//
        // $this->load->database();
        $this->load->model('Nasabah_model');                                                            //
        // Untuk memanggil database agar dapat dipakai disemua method di dalam class nasabah//
        $this->load->library('form_validation');

        // Menambahkan flashdata pada autoload, karna digunakan di setiap halaman
    }

    public function index()
    {
        $data['judul'] = 'Daftar Nasabah'; // Data yg disimpan di array otomatis jadi var ($judul)
        $data['nasabah'] = $this->Nasabah_model->getAllNasabah(); // Data yg disimpan di array otomatis jadi var ($nasabah)
        if( $this->input->post('keyword') ) {
            $data['nasabah'] = $this->Nasabah_model->cariDataNasabah();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('nasabah/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Nasabah';

        // Ini untuk memvalidasi data, untuk menghindari data kosong
        $this->form_validation->set_rules('ktp', 'KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'NAMA', 'required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
        $this->form_validation->set_rules('tempatlahir', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('tanggal', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('telp', 'NO TELP', 'required|numeric');
        // helper(['nama', 'url']);
        if( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('nasabah/tambah.php',);
            $this->load->view('templates/footer.php',);
        } else {
            $this->Nasabah_model->tambahDataNasabah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('nasabah');
        }   
    }

    public function hapus($id)
    {
        $this->Nasabah_model->hapusDataNasabah($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nasabah');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Nasabah';
        $data['nasabah'] = $this->Nasabah_model->getNasabahById($id);
        $this->load->view('templates/header.php', $data);
        $this->load->view('nasabah/detail.php', $data);
        $this->load->view('templates/footer.php');

    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Tambah Data Nasabah';
        $data['nasabah'] = $this->Nasabah_model->getNasabahById($id);

        // Ini untuk memvalidasi data, untuk menghindari data kosong
        $this->form_validation->set_rules('ktp', 'KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'NAMA', 'required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
        $this->form_validation->set_rules('tempatlahir', 'TEMPAT LAHIR', 'required');
        $this->form_validation->set_rules('tanggal', 'TANGGAL LAHIR', 'required');
        $this->form_validation->set_rules('telp', 'NO TELP', 'required|numeric');
        // helper(['nama', 'url']);
        if( $this->form_validation->run() == FALSE ) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('nasabah/ubah.php', $data);
            $this->load->view('templates/footer.php',);
        } else {
            $this->Nasabah_model->ubahDataNasabah();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('nasabah');
        }   
    }

}