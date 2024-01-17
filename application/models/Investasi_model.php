<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Investasi_model extends CI_Model
{
    public function get_investasi_data()
    {
        // Sesuaikan dengan nama tabel dan field yang ada di database Anda
        $query = $this->db->get('investasi');
        return $query->result();
    }

    // Proses insert data ke tabel dari form modal input investasi
    public function insert_investasi($data)
    {
        $this->db->insert('investasi', $data);
    }

    public function delete_investasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('investasi');
    }

    // Ambil data dari database untuk ditampilkan di form edit investasi
    public function get_investasi_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('investasi');
        return $query->row();
    }

    // Proses update data ke database dari form edit investasi
    public function update_investasi($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('investasi', $data);
    }

    // Mengambil data investor dari tabel investor database
    public function get_nama_investor()
    {
        $this->db->select('*'); // Sesuaikan dengan nama kolom pada tabel investor
        $query = $this->db->get('investor'); // Sesuaikan dengan nama tabel investor
        return $query->result_array();
    }
}
