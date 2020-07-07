<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Yahir_model extends CI_Model
{

    function karyawan()
    {
        $query = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email')])->row_array();
        return $query;
    }

    function is_active($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update('karyawan');

        $this->db->delete('token', ['email' => $email]);
    }

    function not_active($email)
    {
        $this->db->delete('token', ['email' => $email]);
        $this->db->delete('karyawan', ['email' => $email]);
    }

    function menu()
    {
        $role = $this->session->userdata('role_id');

        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('menu__access', 'id_menu = menu_id');
        $this->db->where('menu__access.role_id', $role);
        $this->db->order_by('menu.menu', 'asc');

        $query = $this->db->get()->result_array();
        return $query;
    }

    function subMenu()
    {
        $this->db->select('*');
        $this->db->from('menu__sub');
        $this->db->join('menu', 'id_menu = menu_id');
        $this->db->where('is_active', 1);
        $this->db->order_by('menu__sub.title', 'asc');

        $query = $this->db->get()->result_array();
        return $query;
    }

    // Query dataBarang

    public function igntmdl()
    {

        $this->datatables->select('id_databarang, cabang, namaBarang, databarang.stock, asal, kategori, harga, harga_agen, harga_reseller, harga_custom, databarang.created_at as created');
        $this->datatables->from('databarang');

        $this->datatables->join('karyawan__cabang', 'id_cabang = cabang_id');
        $this->datatables->join('supplier', 'id_supplier = databarang.supplier_id');
        $this->datatables->join('databarang__asal', 'id_asal = databarang.asal_id');
        $this->datatables->join('databarang__kategori', 'id_kategori = databarang.kategori_id');

        if ($this->session->userdata('role_id') > 1) {
            $this->datatables->where('databarang.cabang_id', $this->session->userdata('cabang_id'));
        }

        $this->datatables->add_column('view', '<span type="button" onclick="ignt_edit($1)" class="badge badge-pill badge-info shadow"><i class="fa fa-edit"></i> Edit</span>  <span onclick="ignt_hapus($1)" type="button" class="badge badge-pill badge-danger shadow"><i class="fa fa-trash"></i> Hapus</span>', 'id_databarang, cabang, namaBarang, stock, asal, kategori, harga, harga_agen, harga_reseller, harga_custom, created');

        return $this->datatables->generate();
    }

    public function igntmdl_kategori()
    {
        $result = $this->db->get('databarang__kategori')->result();
        return $result;
    }

    // public function igntmdl_id($id)
    // {
    //     $this->db->from('data_barang');
    //     $this->db->where('id_barang', $id);
    //     $query = $this->db->get()->row();
    //     return $query;
    // }


    public function dbSupplier()
    {
        $this->datatables->select('id_supplier, product, kategori, asal, supplier, stock, supplier.created_at, supplier.updated_at');
        $this->datatables->from('supplier');
        $this->datatables->join('databarang__kategori', 'id_kategori = supplier.kategori_id');
        $this->datatables->join('databarang__asal', 'id_asal = supplier.asal_id');
        $this->datatables->add_column('view', '<span type="button" onclick="dbSupplier_edit($1)" class="badge badge-pill badge-info shadow"><i class="fa fa-edit"></i> Edit</span>  <span onclick="dbSupplier_hapus($1)" type="button" class="badge badge-pill badge-danger shadow"><i class="fa fa-trash"></i> Hapus</span>', 'id_supplier, product, kategori, asal, supplier, stock, created_at, updated_at');

        return $this->datatables->generate();
    }

    public function dtCustomer()
    {
        $this->datatables->select('id_customer, customer.nama namaCustomer, nohp, alamat, karyawan.nama as namaKaryawan, type, sumber, customer.created_at, customer.updated_at ');
        $this->datatables->from('customer');
        $this->datatables->join('karyawan', 'id_karyawan = customer.karyawan_id');
        $this->datatables->join('customer__type', 'id_type = customer.type_id');
        $this->datatables->join('customer__sumber', 'id_sumber = customer.sumber_id');
        $this->datatables->add_column('view', '<span type="button" onclick="dtCustomer_edit($1)" class="badge badge-pill badge-info shadow"><i class="fa fa-edit"></i> Edit</span>  <span onclick="dtCustomer_hapus($1)" type="button" class="badge badge-pill badge-danger shadow"><i class="fa fa-trash"></i> Hapus</span>', 'id_customer, namaCustomer, nohp, alamat, namaKaryawan, type, sumber, created_at, updated_at');

        return $this->datatables->generate();
    }

    public function dtInvoice()
    {
        $this->datatables->select('id_invoice, karyawan.nama as namaKaryawan, customer.nama as namaCustomer, type_pembayaran, ekspedisi, invoice.total as tInvoice, namaBarang, qty, invoice__detail.total as tInvoiceDetail, invoice.created_at as created, invoice.updated_at as updated');
        $this->datatables->from('invoice');
        $this->datatables->join('karyawan', 'id_karyawan = invoice.karyawan_id');
        $this->datatables->join('customer', 'id_customer = invoice.customer_id');
        $this->datatables->join('invoice__type_pembayaran', 'id_type_pembayaran = invoice.type_pembayaran_id');
        $this->datatables->join('invoice__ekspedisi', 'id_ekspedisi = invoice.ekspedisi_id');
        $this->datatables->join('invoice__detail', 'id_invoice = invoice__detail.invoice_id', 'left');
        $this->datatables->join('databarang', 'id_databarang = invoice__detail.databarang_id', 'left');
        $this->datatables->add_column('view', '<span type="button" class="badge badge-pill badge-info shadow details-control"><i class="fa fa-edit"></i> Show</span>  <span type="button" onclick="dtCustomer_edit($1)" class="badge badge-pill badge-info shadow"><i class="fa fa-edit"></i> Edit</span>  <span onclick="dtCustomer_hapus($1)" type="button" class="badge badge-pill badge-danger shadow"><i class="fa fa-trash"></i> Hapus</span>', 'id_invoice, namaKaryawan, namaCustomer, type_pembayaran, ekspedisi, tInvoice, namaBarang, qty, tInvoiceDetail, created, updated');
        return $this->datatables->generate();

        // $this->db->select('*');
        // $this->db->where('id_invoice', 'invoice__detail.invoice_id');
        // return $this->db->get()->result_array();
    }

    function inputCustomer_invoice($postData)
    {
        // Note : tambahkan parameter untuk menampung _POST
        // defines array null

        $response = array();

        // Jika _POST['search'] ada valuenya
        if (isset($postData['search'])) {

            // Select record
            $this->db
                ->select('id_customer, customer.nama, nohp, alamat, customer__type.type as type')
                ->from('customer')
                ->join('customer__type', 'id_type = type_id')
                ->like('nama', $postData['search']);
            $records = $this->db->get()->result();

            foreach ($records as $row) {
                $response[] = [
                    // label wajib ditambahkan untuk pencarian
                    "label"   => $row->nama,
                    "idCust"  => $row->id_customer,
                    "nohp"    => $row->nohp,
                    "alamat"  => $row->alamat,
                    "type"    => $row->type,
                ];
            }
        }

        return $response;
    }

    function inputBarang_invoice($postData)
    {
        // Note : tambahkan parameter untuk menampung _POST
        // defines array null
        $response = [];

        // Jika _POST['search'] ada valuenya
        $cabang = $this->session->userdata('cabang_id');

        if (isset($postData['search'])) {

            // Select record
            $this->db
                ->select('databarang.*')
                ->where('cabang_id', $cabang)
                ->like('namaBarang', $postData['search']);
            $records = $this->db->get('databarang')->result();

            foreach ($records as $row) {
                $response[] = [
                    // label wajib ditambahkan untuk pencarian
                    "label"   => $row->namaBarang,
                    "idBarang" => $row->id_databarang,
                    "stock"   => $row->stock,
                    "agen"    => $row->harga_agen,
                    "reseller" => $row->harga_reseller,
                    "custom"  => $row->harga_custom,
                ];
            }
        }

        return $response;
    }







    // query builder invoice :
    function resultBarang_invoice()
    {
        $data = $this->db->get('invoice__detail')->result_array();

        // $data = $this->db->get('databarang')->result();
        // ->join('databarang', 'id_databarang=databarang_id')

        return $data;
        // ->join('databarang', 'id_databarang=databarang_id')
        // ->order_by('databarang.namaBarang', 'asc')
    }

    function insertBarang_invoice($table, $insert)
    {
        $this->db->insert($table, $insert);
    }

    function editBarang_invoice($where, $data)
    {
        $this->db->where('id_detail', $where);
        $this->db->update('invoice__detail', $data);
    }

    function deleteBarang_invoice($id)
    {
        $this->db->delete('invoice__detail', ['id_detail' => $id]);
    }
}


/* End of file Yahir_model.php */
