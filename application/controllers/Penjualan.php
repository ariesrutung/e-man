<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data['belanja'] = $this->Belanja_model->get_belanja_data();

        $this->load->view('templates/header');
        // $this->load->view('penjualan', $data);
        $this->load->view('penjualan');
        $this->load->view('templates/footer');
    }

}
