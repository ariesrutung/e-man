<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function get_penjualan_data()
    {

        // $this->db->select('*');
        // $query = $this->db->get('penjualan');
        // return $query->result(); // Menggunakan row_array() karena kita hanya mengambil satu baris data

        // Sesuaikan dengan nama tabel dan field yang ada di database Anda
        $query = $this->db->get('penjualan');
        return $query->result();
    }

    // Proses insert data ke tabel dari form modal input penjualan
    public function insert_penjualan($data)
    {
        $this->db->insert('penjualan', $data);
    }

    public function delete_penjualan($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('penjualan');
    }

    // Ambil data dari database untuk ditampilkan di form edit penjualan
    public function get_penjualan_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('penjualan');
        return $query->row();
    }

    // Proses update data ke database dari form edit penjualan
    public function update_penjualan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }

    public function get_data_perusahaan()
    {
        $this->db->select('*');
        $query = $this->db->get('data_perusahaan');
        return $query->row_array(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    }

    public function get_total_penjualan()
    {
        $this->db->select_sum('jumlah_modal', 'total_modal');
        $query = $this->db->get('penjualan');

        return $query->row()->total_modal;
    }

    public function get_total_penjualan_by_period($period)
    {
        $this->db->select_sum('jumlah_modal', 'total_modal');
        $this->db->where('periode', $period);
        $query = $this->db->get('penjualan');

        return $query->row()->total_modal;
    }

    public function get_total_penjualan_per_year()
    {
        $this->db->select('YEAR(tanggal_transaksi) AS tahun, SUM(jumlah_modal) AS total_penjualan');
        $this->db->from('penjualan');
        $this->db->group_by('YEAR(tanggal_transaksi)');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_investor()
    {
        $this->db->select('investor, GROUP_CONCAT(DISTINCT periode) AS periode');
        $this->db->group_by('investor');
        $query = $this->db->get('belanja');
        return $query->result();
    }

    public function get_pembelian_by_id_transaksi()
    {
        $this->db->select('*');
        $this->db->group_by('id_transaksi');
        $query = $this->db->get('belanja');
        return $query->result(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    }

    public function get_id_transaksi()
    {
        $this->db->select('id, id_transaksi, investor, periode, nama_item, SUM(jumlah_item) as jumlah_item,  tanggal_transaksi, satuan, harga_satuan, SUM(harga_total) as harga_total, jumlah_modal');
        $this->db->group_by('id_transaksi');
        $query = $this->db->get('penjualan');
        return $query->result();
    }

    public function group_penjualan_by_id_transaksi()
    {
        $this->db->select('id_transaksi, investor, periode, nama_item, jumlah_item,  tanggal_transaksi, satuan, harga_satuan, harga_total, jumlah_modal');
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            $result = $query->result();

            // Membuat struktur data yang sesuai untuk looping di view
            $grouped_data = [];
            foreach ($result as $row) {
                if (!isset($grouped_data[$row->id_transaksi])) {
                    $grouped_data[$row->id_transaksi] = (object) [
                        'id_transaksi' => $row->id_transaksi,
                        'tanggal_transaksi' => $row->tanggal_transaksi,
                        'satuan' => $row->satuan,
                        'investor' => $row->investor,
                        'periode' => $row->periode,
                        'details' => [],
                        'total_grand_total' => 0
                    ];
                }

                // Menambahkan detail ke dalam array details
                $grouped_data[$row->id_transaksi]->details[] = (object) [
                    'nama_item' => $row->nama_item,
                    'tanggal_transaksi' => $row->tanggal_transaksi,
                    'jumlah_item' => $row->jumlah_item,
                    'investor' => $row->investor,
                    'periode' => $row->periode,
                    'satuan' => $row->satuan,
                    'harga_satuan' => $row->harga_satuan,
                    'harga_total' => $row->harga_total,
                    'jumlah_modal' => $row->jumlah_modal
                ];

                // Menghitung total grand total
                $grouped_data[$row->id_transaksi]->total_grand_total += $row->harga_total;
            }

            return $grouped_data;
        } else {
            return false;
        }
    }

    public function save_purchase($data)
    {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru disimpan
    }

    // Mendapatkan semua data beli_sparepart berdasarkan id_transaksi
    public function get_data_by_id_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_total_modal()
    {
        $this->db->select_sum('jumlah_modal', 'total_modal');
        $query = $this->db->get('penjualan');

        return $query->row()->total_modal;
    }
}
