<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Perhitungan_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data = [
            'page' => "Hasil",
            'hasil' => $this->Perhitungan_model->get_hasil(),
            'user_level' => $this->User_model->user_level()

        ];

        $this->load->view('home', $data);
    }
}
    
    /* End of file Kategori.php */