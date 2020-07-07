<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        view('admin/index', $data);
    }

    public function supplier()
    {
        $data['title'] = "Supplier";
        view('admin/supplier', $data);
    }

    function dbSupplier()
    {
        header('Content-Type: application/json');
        echo $this->yahir->dbSupplier();
    }
}

/* End of file Admin.php */
