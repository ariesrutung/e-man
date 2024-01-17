<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Investor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Investor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['investor'] = $this->Investor_model->get_investor_data();

        $this->load->view('templates/header');
        $this->load->view('investor', $data);
        $this->load->view('templates/footer');
    }

    public function unggah_data_investor()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'jabatan' => $this->input->post('jabatan'),
                'alamat' => $this->input->post('alamat'),
                'sumber_dana' => $this->input->post('sumber_dana'),
            );

            var_dump($data);

            $this->Investor_model->insert_investor($data);

            redirect('investor');
        } else {
            echo validation_errors();
        }
    }

    public function delete_investor($id)
    {
        $this->Investor_model->delete_investor($id);
        redirect('investor');
    }

    public function update_investor()
    {
        // Validasi form

        $this->form_validation->set_rules('edit_nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('edit_nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('edit_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('edit_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('edit_sumber_dana', 'Sumber Dana', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_lengkap' => $this->input->post('edit_nama_lengkap'),
                'nama_perusahaan' => $this->input->post('edit_nama_perusahaan'),
                'jabatan' => $this->input->post('edit_jabatan'),
                'alamat' => $this->input->post('edit_alamat'),
                'sumber_dana' => $this->input->post('edit_sumber_dana'),
            );

            $this->Investor_model->update_investor($this->input->post('edit_id'), $data);

            echo "Data investor berhasil diupdate";
        } else {
            echo validation_errors();
        }
    }

    public function get_investor($id)
    {
        $data = $this->Investor_model->get_investor_by_id($id);
        echo json_encode($data);
    }
}
