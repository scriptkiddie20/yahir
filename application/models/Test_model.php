<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{

    function result_data($data)
    {
        // $this->db->query($test);
        $result = $this->db->get($data)->result_array();
        return $result;
    }

    function addData($data)
    {
        $add = $this->db->insert('test', $data);
        return $add;
    }

    function edit()
    {
    }

    function dlt($id)
    {
        $this->db->delete('test', ['id' => $id]);
    }



    // Weblesson crud inline tables
    function load_data()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('sample_data');
        return $query->result_array();
    }

    function insert($data)
    {
        $this->db->insert('sample_data', $data);
    }

    function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('sample_data', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sample_data');
    }
}

/* End of file Test_model.php */
