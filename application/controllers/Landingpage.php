<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

    public function index()
    {
        $this->load->model('landingpage_model');

        $data = [
            'title' => "Landingpage for grosirbajuku",
            'result_paket' => $this->landingpage_model->result_paket()

        ];

        $this->load->view('users/index', $data);
    }

    public function orderpaket()
    {

        $paket_id = 3;

        $qty   = $this->db->select_sum('qty')->from('paket__detail')->where('paket_id', $paket_id)->get()->row_array();
        $total = $this->db->select_sum('total')->from('paket__detail')->where('paket_id', $paket_id)->get()->row_array();

        $databarang = $this->db->select('databarang_id')->from('paket__detail')->where('paket_id', 3)->get()->result();
        $qty = $this->db->select('qty')->from('paket__detail')->where('paket_id', 3)->get()->result();
        $total = $this->db->select('total')->from('paket__detail')->where('paket_id', 3)->get()->result();

        $jumlah = count($qty);
    }
}
    
    /* End of file Landingpage.php */
