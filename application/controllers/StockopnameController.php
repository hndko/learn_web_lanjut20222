<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockopnameController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StockopnameModel', 'stockOpnameModel');
    }

    public function index()
    {
        // ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('noline', $data['keyword'])->from('stockopnamedetail');
        $config['base_url'] = "http://localhost/learn_web_lanjut20222/stockopnamecontroller/index";
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 2;
        $config['start'] = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data = [
            'title' => 'Stock Opname',
            'result' => $this->stockOpnameModel->ambilDataLimit($config['per_page'], $config['start'], $data['keyword'])
        ];

        // die(var_dump($config['total_rows']));

        $this->load->view('layout/head', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('stockopname/index', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('no_line', 'No Line', 'required|min_length[2]|is_unique[stockopnamedetail.noline]');
        $this->form_validation->set_rules('no_transaksi', 'No Transaksi', 'required|min_length[2]');
        $this->form_validation->set_rules('kode_item', 'Kode Item', 'required|min_length[2]');
        $this->form_validation->set_rules('real_stock', 'Real Stock', 'required|min_length[2]');
        $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required|min_length[2]');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Stock Opname'
            ];

            $this->load->view('layout/head', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('stockopname/create', $data);
            $this->load->view('layout/footer');
        } else {
            // Simpan data gambar ke dalam database
            $this->stockOpnameModel->tambahData();
            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', '<strong>Berhasil!</strong> Data anda telah tersimpan.');
            redirect(base_url());
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('no_transaksi', 'No Transaksi', 'required|min_length[2]');
        $this->form_validation->set_rules('kode_item', 'Kode Item', 'required|min_length[2]');
        $this->form_validation->set_rules('real_stock', 'Real Stock', 'required|min_length[2]');
        $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required|min_length[2]');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Stock Opname',
                'res' => $this->stockOpnameModel->ambilDataByID($id)
            ];

            $this->load->view('layout/head', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('stockopname/edit', $data);
            $this->load->view('layout/footer');
        } else {
            // Simpan data gambar ke dalam database
            $this->stockOpnameModel->ubahData($id);
            $this->session->set_flashdata('success', true);
            $this->session->set_flashdata('message', '<strong>Berhasil!</strong> Data anda telah tersimpan.');
            redirect(base_url());
        }
    }

    public function delete($id)
    {
        $this->stockOpnameModel->deleteData($id);
        $this->session->set_flashdata('success', true);
        $this->session->set_flashdata('message', '<strong>Berhasil!</strong> Data anda telah dihapuskan.');
        redirect(base_url());
    }
}
