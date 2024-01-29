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

        $judul = [
            'title' => 'Data Pembelian Spare Part',
            'sub_title' => ''
        ];

        $data['belanja'] = $this->Belanja_model->get_belanja_data();

        $data['investor'] = $this->Belanja_model->get_data_investor();

        $data['barang'] = $this->Belanja_model->get_data_barang();

        $data['pembelian'] = $this->Belanja_model->get_id_transaksi();
        $data['detail'] = $this->Belanja_model->group_pembelian_by_id_transaksi();

        $this->load->view('templates/header', $judul);
        $this->load->view('belanja', $data);
        $this->load->view('templates/footer');
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

    public function hapus_data($id)
    {
        $this->db->where(['id_transaksi' => $id]);
        $this->db->delete('belanja');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('belanja'));
    }

    public function save_purchase()
    {
        $productData = $this->input->post('productData');

        // Check if $productData is an array before proceeding
        if (!is_array($productData) || empty($productData)) {
            // Handle the error, perhaps by sending an appropriate response back to the client
            $response = array(
                'status' => 'error',
                'message' => 'Invalid or empty product data.'
            );
            echo json_encode($response);
            return;
        }

        // Save each product to the database
        $inserted_ids = array();
        $jumlah_modal = 0; // Initialize grand total

        foreach ($productData as $product) {
            $id_transaksi = 'NPPG-INV-' . date('YmdHis');
            $jumlah_modal += $product['harga_total'];

            // Prepare data for insertion
            $data = array(
                'id_transaksi' => $id_transaksi,
                'investor' => $product['investor'],
                'periode' => $product['periode'],
                'modal_investasi' => $product['modalInvestasi'],
                'nama_item' => $product['nama_item'],
                'jumlah_item' => $product['jumlah_item'],
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
                'satuan' => $product['satuan'],
                'harga_satuan' => $product['harga_satuan'],
                'harga_total' => $product['harga_total'],
                'jumlah_modal' => $jumlah_modal // Assign the current grand total
            );

            // Save to the database using the model
            $inserted_ids[] = $this->Belanja_model->save_purchase($data);
        }

        // Send a success response back to the client
        $response = array(
            'status' => 'success',
            'inserted_ids' => $inserted_ids
        );
        echo json_encode($response);
    }

    public function cetakPDF($id_transaksi)
    {
        $judul = [
            'title' => 'Cetak Data Merk Spare Part',
            'sub_title' => 'List Data Merk Spare Part',
            'company' => $this->Belanja_model->get_data_perusahaan(),
        ];

        // Get details for the specific id_transaksi
        $data['details'] = $this->Belanja_model->get_data_by_id_transaksi($id_transaksi);

        // Calculate total grand total
        $data['total_grand_total'] = 0;
        foreach ($data['details'] as $detailItem) {
            $data['total_grand_total'] += $detailItem->harga_total;
        }

        $mpdf = new \Mpdf\Mpdf();

        $html = $this->load->view('pdf/templates/header', $judul, true);
        $html .= $this->load->view('pdf/cetak-belanja', $data, true);
        // $html .= '<pagebreak>';
        $html .= $this->load->view('pdf/templates/footer', '', true);

        $mpdf->WriteHTML($html);

        $mpdf->Output();
    }
}
