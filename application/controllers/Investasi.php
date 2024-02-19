<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Investasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Investasi_model');
        $this->load->library('form_validation');
        $this->load->library(['ion_auth', 'form_validation']);
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $data['investasi'] = $this->Investasi_model->get_investasi_data();
        $data['nama_investor'] = $this->Investasi_model->get_nama_investor();

        $this->load->view('templates/header');
        $this->load->view('investasi', $data);
        $this->load->view('templates/footer');
    }

    // public function unggah_data_investasi()
    // {

    //     $this->form_validation->set_rules('periode', 'Periode', 'required');
    //     $this->form_validation->set_rules('investor', 'Nama Investor', 'required');
    //     $this->form_validation->set_rules('jumlah_modal', 'Jumlah Modal', 'required|numeric');
    //     $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
    //     $this->form_validation->set_rules('status', 'Status', 'required');
    //     $this->form_validation->set_rules('tgl_investasi', 'Tanggal Investasi', 'required');
    //     $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
    //     $this->form_validation->set_rules('tgl_akhir', 'Tanggal Selesai', 'required');

    //     if ($this->form_validation->run() == TRUE) {
    //         $data = array(
    //             'periode' => $this->input->post('periode'),
    //             'investor' => $this->input->post('investor'),
    //             'jumlah_modal' => $this->input->post('jumlah_modal'),
    //             'tujuan' => $this->input->post('tujuan'),
    //             'tgl_investasi' => $this->input->post('tgl_investasi'),
    //             'status' => $this->input->post('status'),
    //             'tgl_mulai' => $this->input->post('tgl_mulai'),
    //             'tgl_akhir' => $this->input->post('tgl_akhir'),
    //         );

    //         var_dump($data);

    //         $this->Investasi_model->insert_investasi($data);

    //         redirect('investasi');
    //     } else {
    //         echo validation_errors();
    //     }
    // }

    public function unggah_data_investasi()
    {
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('investor', 'Nama Investor', 'required');
        $this->form_validation->set_rules('jumlah_modal', 'Jumlah Modal', 'required|numeric');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tgl_investasi', 'Tanggal Investasi', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Selesai', 'required');

        // Menambahkan aturan validasi untuk file gambar
        $this->form_validation->set_rules('bukti', 'Bukti Investasi', 'callback_upload_check');

        if ($this->form_validation->run() == TRUE) {
            // Proses unggah file gambar
            $config['upload_path'] = './assets/bukti_investasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diperbolehkan
            $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobyte)
            $config['file_name'] = 'bukti_' . time(); // Nama file yang diunggah (gunakan timestamp untuk menghindari duplikat)

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bukti')) {
                // Jika gagal unggah, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                echo validation_errors();
            } else {
                // Jika berhasil unggah, ambil informasi file yang diunggah
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                // Persiapkan data untuk disimpan ke database
                $data = array(
                    'periode' => $this->input->post('periode'),
                    'investor' => $this->input->post('investor'),
                    'jumlah_modal' => $this->input->post('jumlah_modal'),
                    'tujuan' => $this->input->post('tujuan'),
                    'tgl_investasi' => $this->input->post('tgl_investasi'),
                    'status' => $this->input->post('status'),
                    'tgl_mulai' => $this->input->post('tgl_mulai'),
                    'tgl_akhir' => $this->input->post('tgl_akhir'),
                    'bukti' => $file_name // Simpan nama file gambar ke dalam database
                );

                var_dump($data);

                $this->Investasi_model->insert_investasi($data);

                redirect('investasi');
            }
        } else {
            echo validation_errors();
        }
    }

    // Callback function untuk validasi unggah file
    public function upload_check($str)
    {
        $allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif');
        $mime = get_mime_by_extension($_FILES['bukti']['name']);
        if (in_array($mime, $allowed_mime_types)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('upload_check', 'Tipe file yang diunggah tidak valid. Harap unggah file gambar (JPG, JPEG, PNG, GIF).');
            return FALSE;
        }
    }


    public function delete_investasi($id)
    {
        $this->Investasi_model->delete_investasi($id);
        redirect('investasi');
    }

    public function update_investasi()
    {
        // Validasi form
        $this->form_validation->set_rules('edit_periode', 'Periode', 'required');
        $this->form_validation->set_rules('edit_investor', 'Nama Investor', 'required');
        $this->form_validation->set_rules('edit_jumlah_modal', 'Jumlah Modal', 'required|numeric');
        $this->form_validation->set_rules('edit_tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('edit_status', 'Status', 'required');
        $this->form_validation->set_rules('edit_tgl_investasi', 'Tanggal Investasi', 'required');
        $this->form_validation->set_rules('edit_tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('edit_tgl_akhir', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'periode' => $this->input->post('edit_periode'),
                'investor' => $this->input->post('edit_investor'),
                'jumlah_modal' => $this->input->post('edit_jumlah_modal'),
                'tujuan' => $this->input->post('edit_tujuan'),
                'status' => $this->input->post('edit_status'),
                'tgl_investasi' => $this->input->post('edit_tgl_investasi'),
                'tgl_mulai' => $this->input->post('edit_tgl_mulai'),
                'tgl_akhir' => $this->input->post('edit_tgl_akhir'),
            );

            $this->Investasi_model->update_investasi($this->input->post('edit_id'), $data);

            echo "Data investasi berhasil diupdate";
        } else {
            echo validation_errors();
        }
    }

    public function get_investasi($id)
    {
        $data = $this->Investasi_model->get_investasi_by_id($id);
        echo json_encode($data);
    }
}
