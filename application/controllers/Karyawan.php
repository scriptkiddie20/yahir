<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public $validation_for = '';

    public function index()
    {
        $data['title'] = "Penjualan";
        view('karyawan/index', $data);
    }

    public function penjualan()
    {
        $data['title'] = "Tambah Penjualan";
        $data['invoice'] = $this->session->userdata('first_name') . '__' .  date('dmy', time()) . substr(time(), -5, 5);
        // $coba = $_GET['name'];
        // var_dump($coba);
        // var_dump($_SERVER);

        view('karyawan/tambahpenjualan', $data);
    }

    public function dataBarang()
    {
        $data['title'] = "Data Barang";
        view('karyawan/databarang', $data);
    }

    public function dataCustomer()
    {
        $data['title'] = "Data Customer";
        view('karyawan/datacustomer', $data);
    }



    // Buat variable validation_for diatas construct dengan nilai '';

    function igntctrl()
    { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->yahir->igntmdl();
    }

    function igntctrl_kategori()
    {
        header('Content-Type: application/json');
        echo json_encode($this->yahir->igntmdl_kategori());
    }

    function dtCustomer()
    {
        header('Content-Type: application/json');
        echo $this->yahir->dtcustomer();
    }

    function dtInvoice()
    {
        header('Content-Type: aplication/json');
        echo $this->yahir->dtInvoice();
    }

    // autocomplete input data customer
    function inputCustomer_invoice()
    {
        // POST data
        $postData = $this->input->post();
        // Get data from model
        $data = $this->yahir->inputCustomer_invoice($postData);
        // encode data to json
        echo json_encode($data);
    }

    function inputBarang_invoice()
    {
        // POST data
        $postData = $this->input->post();
        // Get data from model
        $data = $this->yahir->inputBarang_invoice($postData);
        // encode data to json
        echo json_encode($data);
    }

    function addCustomer_invoice()
    {
        // idInvoice
        // namaCustomer
        // nohp
        // typeCustomer
        // alamat

        $id_karyawan = $this->session->userdata('id_karyawan');
        $custInvoice = [
            'id_invoice'    => $this->input->post('idInvoice'),
            'customer_id'   => $this->input->post('id_customer'),
            'karyawan_id'   => $id_karyawan
        ];
        $this->db->insert('invoice', $custInvoice);

        // $brgInvoice = [];

        $invoice_detail = [
            'invoice_id'    => $this->input->post('idInvoice'),
        ];
        $this->db->insert('invoice__detail', $invoice_detail);
    }


    function resultBarang()
    {
        $data = $this->yahir->resultBarang_invoice();
        echo json_encode($data);
    }

    function insert_data()
    {
        $data = [
            'invoice_id' => $this->input->post('idInvoice'),
            'databarang_id' => $this->input->post('idBarang'),
            // 'invoice_id' => $this->input->post('namaBarang'),
            // 'hSatuan' => $this->input->post('hSatuan'),
            'qty' => $this->input->post('qtyBarang'),
            'total' => $this->input->post('total'),
            'created_at' => time(),
            'updated_at' => time(),
        ];

        $this->yahir->insertBarang_invoice('invoice__detail', $data);
    }
}
    
    /* End of file Karyawan.php */