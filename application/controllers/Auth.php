<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->_vLogin();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            auth_view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    public function register()
    {
        $this->_vRegister();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Page';
            auth_view('auth/register', $data);
        } else {
            $email    = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars($this->input->post('pass', true));
            $data  = [
                'role_id'    => 2,
                'cabang_id'  => 1,
                'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                'last_name'  => htmlspecialchars($this->input->post('last_name', true)),
                'full_name'  => htmlspecialchars($this->input->post('fullname', true)),
                'email'      => $email,
                'password'   => password_hash($password, PASSWORD_DEFAULT),
                'image'      => 'default.jpg',
                'is_active'  => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ];

            $token         = base64_encode(random_bytes(32));
            $karyawanToken = [
                'email'      => $email,
                'token'      => $token,
                'created_at' => time()
            ];

            $this->_sendEmail($token, $email, 'verify');

            $this->db->insert('token', $karyawanToken);
            $this->db->insert('karyawan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Karyawan sudah didaftarkan. Silakan buka email anda !
                </div>');
            redirect('auth');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $karyawan      = $this->db->get_where('karyawan', ['email' => $email])->row_array();
        $karyawanToken = $this->db->get_where('token', ['token' => $token])->row_array();

        if ($karyawan) {
            if (time() - $karyawanToken['created_at'] < 60 * 60 * 24) {

                $this->yahir->is_active($email);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Karyawan sudah teraktivasi. Silakan login !
                </div>');
                redirect('auth');
            } else {
                $this->yahir->not_active($email);

                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Token sudah kadaluarsa. Silakan daftar kembali !
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Karyawan belum terdaftar. Silakan daftar kembali !
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('cabang_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Anda keluar ! Silakan datang kembali :)
                </div>');
        redirect('auth');
    }




    // Private function
    private function _login()
    {
        $email    = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('pass', true));
        $karyawan = $this->db->get_where('karyawan', ['email' => $email])->row_array();

        // cek karyawannya ada ga ?
        if ($karyawan) {
            // cek password
            if (password_verify($password, $karyawan['password'])) {
                // cek aktifnya
                if ($karyawan['is_active'] == 1) {
                    // cek role_id
                    $data = [
                        'id_karyawan' => $karyawan['id_karyawan'],
                        'first_name' => $karyawan['first_name'],
                        'email'     => $karyawan['email'],
                        'role_id'   => $karyawan['role_id'],
                        'cabang_id' => $karyawan['cabang_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($karyawan['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('karyawan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Karyawan ini belum aktif. Silakan cek email & aktifkan !
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password anda salah. silakan ulangi !
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email anda belum terdaftar. Silakan daftar dulu !
            </div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $email, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'acengkusmana2016@gmail.com',
            'smtp_pass' => 'BanjarFatroman@2020',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);


        $this->email->from('acengkusmana2016@gmail.com', 'Yahir POS');
        $this->email->to($email);

        $msgVerify = 'Klik disini untuk konfirmasi akun yahir anda : <a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Konfirmasi</a>';

        $msgForgot = 'Klik disini untuk reset kata sandi anda : <a href="' . base_url() . 'auth/forgot?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>';

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun Yahir POS');
            $this->email->message($msgVerify);
        } else if ($type == 'forgot') {
            $this->email->subject('Lupa Kata Sandi Yahir POS');
            $this->email->message($msgForgot);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    private function _vLogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
    }

    private function _vRegister()
    {
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[karyawan.email]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[3]|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Password', 'trim|required|min_length[3]|matches[pass]');
    }
}
    /* End of file Auth.php */
