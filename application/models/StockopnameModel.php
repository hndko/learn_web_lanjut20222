<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockopnameModel extends CI_Model
{
    public function ambilData()
    {
        return $this->db->get('stockopname')->result();
    }

    public function ambilDataByID($id)
    {
        return $this->db->get_where('stockopname', ['noline' => $id])->row();
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

        $this->db->insert('stockopname', $data);
    }

    public function ubahData($id)
    {
        $data = [
            'notransaksi' => htmlspecialchars($this->input->post('no_transaksi')),
            'kodeitem' => htmlspecialchars($this->input->post('kode_item')),
            'realstock' => htmlspecialchars($this->input->post('real_stock')),
            'idlokasi' => htmlspecialchars($this->input->post('id_lokasi'))
        ];

        $this->db->update('stockopname', $data, ['noline' => $id]);
    }

    public function deleteData($id)
    {
        $this->db->delete('stockopname', ['noline' => $id]);
    }
}
