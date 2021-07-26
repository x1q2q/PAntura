<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $sesi = $this->session->userdata('user');
        if (empty($sesi)) {
            $this->load->view('user/pages/login');
        } else {
            redirect('user/');
        }
    }
    public function dologin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama     = $this->input->post('username');
            $passwd = $this->input->post('password');
            $where = array(
                'username' => $nama,
                'password' => $passwd
            );
            if (!empty($nama) && !empty($passwd)) {
                $login = $this->m_global->get_detail('pa_siswa', $where);
                $row = $this->m_global->cek_row($login);
                foreach ($login->result() as $profil) {
                    $getid        = $profil->id_siswa;
                    $uname        = $profil->username;
                }
                if ($row > 0) {
                    $this->session->set_flashdata('login_sukses', strtoupper('Selamat datang ' . $uname));
                    $this->session->set_userdata(array('user' => $getid));
                    redirect('user/');
                } else {
                    $this->session->set_flashdata('login_gagal', strtoupper('Login Gagal <br/> username atau password salah'));
                    redirect('user/login');
                }
            }
        }
    }
    public function logout()
    {
        $data = array('user', 'unfilldata');
        $this->session->unset_userdata($data);
        redirect('admin/login');
    }
}
