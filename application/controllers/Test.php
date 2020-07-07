<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model');
    }


    public function index()
    {
        $data['title'] = "CRUD INLINE TABLES";
        $data['results'] = $this->Test_model->result_data('test');
        view('test/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        ];

        $data = $this->Test_model->addData($data);
        return $data;
    }

    function edit()
    {
        $id    = $this->input->post('id');
        $field = $this->input->post('column');
        $value = $this->input->post('editVal');

        $this->db->set($field, $value);
        $this->db->where('id', $id);
        $this->db->update('test');
    }

    function dlt()
    {
        $id = $this->input->post('id');
        $this->Test_model->delete($id);
    }

    function ms()
    {
        echo microtime();
    }

    function coba()
    {
        $sql = $this->db->select('(age+hidup) AS amount_paid, first_name', FALSE)->from('sample_data')->where('id', 3)->get()->result();
        print_r($sql);
    }



    // Crud inline tables weblessons

    function weblessons()
    {
        $this->load->view('test/crud_inline_tables_weblesson');
    }

    function load_data()
    {
        $data = $this->Test_model->load_data();
        echo json_encode($data);
    }

    function insert()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'age'   => $this->input->post('age')
        );

        $this->Test_model->insert($data);
    }

    function update()
    {
        $data = array(
            $this->input->post('table_column') => $this->input->post('value')
        );

        $this->Test_model->update($data, $this->input->post('id'));
    }

    function delete()
    {
        $this->Test_model->delete($this->input->post('id'));
    }


    function landing()
    {
        $data['title'] = 'percobaan get whatsapp';
        view('test/landing', $data);

        // '%0A%0A' => enter di link whatsapp
        // '$20' => space di link whatsapp
        // redirect('https://api.whatsapp.com/send?phone=6281212609423');
    }

    function inputUsers()
    {
        $name = $this->input->post('namaLengkap');
        $email = $this->input->post('emails');
        $phone = $this->input->post('nohp');
        $kelamin = $this->input->post('typeKelamin');
        $alamat = $this->input->post('alamat');

        $insert = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'kelamin' => $kelamin,
            'alamat' => $alamat,
            'created_at' => time(),
        ];

        $this->db->insert('users', $insert);
        redirect('https://api.whatsapp.com/send?phone=6281212609423&text=' . $name . '%0A%0A' . $email);
    }
}

/* End of file Test.php */
