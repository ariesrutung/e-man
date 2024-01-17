<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';
class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Belanja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['belanja'] = $this->Belanja_model->get_belanja_data();

        $this->load->view('templates/header');
        $this->load->view('belanja', $data);
        $this->load->view('templates/footer');
    }

    public function unggah_data_belanja()
    {
        $this->form_validation->set_rules('nama_item', 'Nama Item', 'required');
        $this->form_validation->set_rules('jumlah_item', 'Jumlah Item', 'required|numeric');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_item' => $this->input->post('nama_item'),
                'jumlah_item' => $this->input->post('jumlah_item'),
                'satuan' => $this->input->post('satuan'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                'grand_total' => $this->input->post('jumlah_item') * $this->input->post('harga_satuan'),
            );

            $this->Belanja_model->insert_belanja($data);

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }

    public function delete_belanja($id)
    {
        $this->Belanja_model->delete_belanja($id);
        echo json_encode(['status' => 'success']);
    }

    public function update_belanja()
    {
        $this->form_validation->set_rules('edit_nama_item', 'Nama Item', 'required');
        $this->form_validation->set_rules('edit_jumlah_item', 'Jumlah Item', 'required|numeric');
        $this->form_validation->set_rules('edit_satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('edit_harga_satuan', 'Harga Satuan', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_item' => $this->input->post('edit_nama_item'),
                'jumlah_item' => $this->input->post('edit_jumlah_item'),
                'satuan' => $this->input->post('edit_satuan'),
                'harga_satuan' => $this->input->post('edit_harga_satuan'),
                'grand_total' => $this->input->post('edit_jumlah_item') * $this->input->post('edit_harga_satuan'),
            );

            $this->Belanja_model->update_belanja($this->input->post('edit_id'), $data);

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        }
    }

    public function get_belanja($id)
    {
        $data = $this->Belanja_model->get_belanja_by_id($id);
        echo json_encode($data);
    }

    public function cetak()
    {
        $data['perusahaan'] = $this->Belanja_model->get_data_perusahaan();
        $data['belanja'] = $this->Belanja_model->get_belanja_data();

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($this->load->view('pdf_template', $data, true));
        $mpdf->Output();
    }

    // public function contoh()
    // {
    //     $data['belanja'] = $this->Belanja_model->get_belanja_data();
    //     $this->load->view('contoh', $data);
    // }
}
