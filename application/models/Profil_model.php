<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    public function get_data_perusahaan()
    {
        $this->db->select('*');
        $query = $this->db->get('data_perusahaan');
        return $query->row_array();
    }
}
