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
}
    
    /* End of file Landingpage.php */
