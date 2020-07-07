<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Yahir_crud_model extends CI_Model
{

    function tampil($query)
    {
        // pengulangan data
        $result = $this->db->get($query)->result_array();
        while ($row = $result) {
            $rows[] = $row;
        }

        // Jika rows[] tidak kosong
        if (!empty($rows)) {
            return $rows;
        }
    }

    function insertData($table, $object)
    {
        $insert = $this->db->insert($table, $object);
        return $insert;
    }

    function editData($id_tbl, $id, $table, $data)
    {
        $this->db->where($id_tbl, $id);
        $this->db->update($table, $data);
    }

    function deleteData($id_tbl, $id = null)
    {
        $this->db->delete('Table', [$id_tbl => $id]);
    }
}

/* End of file Yahir_crud_model.php */
