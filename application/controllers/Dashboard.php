<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Belanja_model');
		$this->load->model('Penjualan_model');
		$this->load->library(['ion_auth', 'form_validation']);
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
	}

	public function index()
	{
		$data['belanja'] = $this->Belanja_model->get_total_modal();
		$data['penjualan'] = $this->Penjualan_model->get_total_penjualan();

		$this->load->view('templates/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
