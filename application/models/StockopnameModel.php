<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockopnameModel extends CI_Model
{
    public function ambilData()
    {
        return $this->db->get('stockopnamedetail')->result();
    }

    public function ambilDataByID($id)
    {
        return $this->db->get_where('stockopnamedetail', ['noline' => $id])->row();
    }

    public function tambahData()
    {
        $data = [
            'noline' => htmlspecialchars($this->input->post('no_line')),
            'notransaksi' => htmlspecialchars($this->input->post('no_transaksi')),
            'kodeitem' => htmlspecialchars($this->input->post('kode_item')),
            'realstock' => htmlspecialchars($this->input->post('real_stock')),
            'idlokasi' => htmlspecialchars($this->input->post('id_lokasi'))
        ];

        $this->db->insert('stockopnamedetail', $data);
    }

    public function ubahData($id)
    {
        $data = [
            'notransaksi' => htmlspecialchars($this->input->post('no_transaksi')),
            'kodeitem' => htmlspecialchars($this->input->post('kode_item')),
            'realstock' => htmlspecialchars($this->input->post('real_stock')),
            'idlokasi' => htmlspecialchars($this->input->post('id_lokasi'))
        ];

        $this->db->update('stockopnamedetail', $data, ['noline' => $id]);
    }

    public function deleteData($id)
    {
        $this->db->delete('stockopnamedetail', ['noline' => $id]);
    }
}
