<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['profil'] = $this->Profil_model->get_data_perusahaan();

        $this->load->view('templates/header');
        $this->load->view('profil', $data);
        $this->load->view('templates/footer');
    }
}
