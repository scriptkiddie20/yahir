<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Landingpage for grosirbajuku";
        $this->load->view('users/index', $data);
    }
}
    
    /* End of file Landingpage.php */
