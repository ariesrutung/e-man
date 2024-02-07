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

		$data['tahun'] = array();
		$data['total_penjualan'] = array();
		$data['total_belanja'] = array();

		// Mengambil data total penjualan per tahun
		$penjualan_per_year = $this->Penjualan_model->get_total_penjualan_per_year();
		foreach ($penjualan_per_year as $penjualan) {
			$data['tahun'][] = $penjualan->tahun;
			$data['total_penjualan'][] = $penjualan->total_penjualan;
		}

		// Mengambil data total belanja per tahun
		$belanja_per_year = $this->Belanja_model->get_total_belanja_per_year();
		foreach ($belanja_per_year as $belanja) {
			$data['total_belanja'][] = $belanja->total_belanja;
		}


		$data['belanja'] = $this->Belanja_model->get_total_modal();
		$data['penjualan'] = $this->Penjualan_model->get_total_penjualan();

		$data['sales_and_purchases'] = $this->Belanja_model->get_sales_and_purchases_data();
		// $data['sales_and_purchases'] = $this->Penjualan_model->get_sales_and_purchases_data();

		$this->load->view('templates/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
