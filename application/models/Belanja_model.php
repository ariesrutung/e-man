<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja_model extends CI_Model
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

    // public function get_data_investor()
    // {
    //     $this->db->select('*');
    //     $query = $this->db->get('investasi');
    //     return $query->result(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    // }

    public function get_data_investor()
    {
        $this->db->select('investor, GROUP_CONCAT(DISTINCT periode) AS periodes, GROUP_CONCAT(jumlah_modal) AS jumlah_modal');
        $this->db->group_by('investor');
        $query = $this->db->get('investasi');
        return $query->result();
    }

    public function get_data_barang()
    {
        $this->db->select('*');
        $query = $this->db->get('data_barang');
        return $query->result(); // Menggunakan row_array() karena kita hanya mengambil satu baris data
    }

    public function get_id_transaksi()
    {
        $this->db->select('id, id_transaksi, investor, modal_investasi, nama_item, SUM(jumlah_item) as jumlah_item, periode, tanggal_transaksi, satuan, harga_satuan, SUM(harga_total) as harga_total, jumlah_modal');
        $this->db->group_by('id_transaksi');
        $query = $this->db->get('belanja');
        return $query->result();
    }

    public function group_pembelian_by_id_transaksi()
    {
        $this->db->select('id_transaksi, investor, periode, modal_investasi, nama_item, jumlah_item,  tanggal_transaksi, satuan, harga_satuan, harga_total, jumlah_modal');
        $query = $this->db->get('belanja');

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
                        'modal_investasi' => $row->modal_investasi,
                        'details' => [],
                        'total_grand_total' => 0
                    ];
                }

                // Menambahkan detail ke dalam array details
                $grouped_data[$row->id_transaksi]->details[] = (object) [
                    'nama_item' => $row->nama_item,
                    'tanggal_transaksi' => $row->tanggal_transaksi,
                    'jumlah_item' => $row->jumlah_item,
                    'satuan' => $row->satuan,
                    'investor' => $row->investor,
                    'periode' => $row->periode,
                    'modal_investasi' => $row->modal_investasi,
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
        $this->db->insert('belanja', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru disimpan
    }

    // Mendapatkan semua data beli_sparepart berdasarkan id_transaksi
    public function get_data_by_id_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('belanja');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_total_modal()
    {
        $this->db->select_sum('harga_total', 'total_modal');
        $query = $this->db->get('belanja');

        return $query->row()->total_modal;
    }

    public function save_purchase1($data)
    {
        // Simpan data ke dalam tabel database
        $this->db->insert('belanja', $data);

        // Kembalikan ID terakhir yang di-insert
        $last_inserted_id = $this->db->insert_id();

        return $last_inserted_id;
    }

    // Model untuk Pembelian (Belanja_model.php)
    public function get_total_pembelian_by_period($period)
    {
        $this->db->select_sum('harga_total', 'total_modal');
        $this->db->where('periode', $period);
        $query = $this->db->get('belanja');

        return $query->row()->total_modal;
    }

    public function get_total_penjualan_by_period($period)
    {
        $this->db->select_sum('jumlah_modal', 'total_modal');
        $this->db->where('periode', $period);
        $query = $this->db->get('penjualan');

        return $query->row()->total_modal;
    }

    public function get_total_belanja_per_year()
    {
        $this->db->select('YEAR(tanggal_transaksi) AS tahun, SUM(harga_total) AS total_belanja');
        $this->db->from('belanja');
        $this->db->group_by('YEAR(tanggal_transaksi)');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sales_and_purchases_data()
    {
        $this->db->select('periode');
        $this->db->from('penjualan');
        $penjualan = $this->db->get()->result_array();

        $this->db->select('periode');
        $this->db->from('belanja');
        $pembelian = $this->db->get()->result_array();

        // Gabungkan periode dari penjualan dan pembelian
        $periodes = array_merge($penjualan, $pembelian);

        // Buat array asosiatif untuk menyimpan total penjualan dan pembelian berdasarkan periode
        $data = array();
        foreach ($periodes as $periode) {
            $data[$periode['periode']]['total_penjualan'] = $this->get_total_penjualan_by_period($periode['periode']);
            $data[$periode['periode']]['total_pembelian'] = $this->get_total_pembelian_by_period($periode['periode']);
        }

        return $data;
    }
}
