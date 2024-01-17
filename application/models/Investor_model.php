<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Investor_model extends CI_Model
{
    public function get_investor_data()
    {
        // Sesuaikan dengan nama tabel dan field yang ada di database Anda
        $query = $this->db->get('investor');
        return $query->result();
    }

    // Proses insert data ke tabel dari form modal input investor
    public function insert_investor($data)
    {
        $this->db->insert('investor', $data);
    }

    public function delete_investor($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('investor');
    }

    // Ambil data dari database untuk ditampilkan di form edit investor
    public function get_investor_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('investor');
        return $query->row();
    }

    // Proses update data ke database dari form edit investor
    public function update_investor($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('investor', $data);
    }
}
