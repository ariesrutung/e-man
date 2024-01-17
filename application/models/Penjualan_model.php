<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function get_belanja_data()
    {
        // Sesuaikan dengan nama tabel dan field yang ada di database Anda
        $query = $this->db->get('belanja');
        return $query->result();
    }

    // Proses insert data ke tabel dari form modal input belanja
    public function insert_belanja($data)
    {
        $this->db->insert('belanja', $data);
    }

    public function delete_belanja($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('belanja');
    }

    // Ambil data dari database untuk ditampilkan di form edit belanja
    public function get_belanja_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('belanja');
        return $query->row();
    }

    // Proses update data ke database dari form edit belanja
    public function update_belanja($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('belanja', $data);
    }

    public function get_data_perusahaan()
    {
        $this->db->select('*');
        $query = $this->db->get('data_perusahaan');
        return $query->row_array(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    }
}
