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
            $whereSuper = array(
                'username' => $nama,
                'password' => $passwd,
                'is_login'  => '0' // ketika belum login
            );
            $whereBiasa = array(
                'username' => $nama,
                'password' => $passwd,
            );
            if (!empty($nama) && !empty($passwd)) {
                $loginSuper = $this->m_global->get_detail('pa_siswa', $whereSuper);
                $loginBiasa = $this->m_global->get_detail('pa_siswa', $whereBiasa);
                foreach ($loginSuper->result() as $profil) {
                    $getid        = $profil->id_siswa;
                    $uname        = $profil->username;
                }
                if($this->m_global->cek_row($loginSuper) > 0) {
                    $this->db->update('pa_siswa',array('is_login' => '1'),array('id_siswa' => $getid));
                    $this->session->set_flashdata('login_sukses', strtoupper('Selamat datang ' . $uname));
                    $this->session->set_userdata(array('user' => $getid));
                    redirect('user/');
                } else {
                    if($this->m_global->cek_row($loginBiasa) > 0) { // jika uname & pwd benar tpi mental
                        $this->session->set_flashdata('login_gagal', strtoupper('Login Gagal. Anda sudah pernah login <br/> Silakan hub. panitia untuk konfigurasi ulang'));
                    }else{
                        $this->session->set_flashdata('login_gagal', strtoupper('Login Gagal. <br/> Username atau password yang anda masukkan salah'));
                    }
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
