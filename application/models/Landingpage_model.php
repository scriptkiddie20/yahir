<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage_model extends CI_Model
{

    function result_paket()
    {
        $db = $this->db->select('*')->from('paket__detail')
            ->join('paket', 'id_paket = paket_id')
            ->get()->result_array();

        return $db;
    }
}

/* End of file Landingpage_model.php */
