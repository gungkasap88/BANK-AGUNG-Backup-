<?php

class Home extends CI_Controller {
    public function index()
    {
        $data['judul'] = 'Halaman Home'; // Data yg disimpan di array otomatis jadi var ($judul)
        $this->load->view('templates/header.php', $data);
        $this->load->view('home/index.php');
        $this->load->view('templates/footer.php');
    }
}