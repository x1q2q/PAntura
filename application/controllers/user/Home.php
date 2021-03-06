<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $sesi = get_cookie('user');
    if (empty($sesi)) {
      redirect('user/login');
    }
    $data = array(
      'template'    => 'user/pages/index',
      'for'          => 'index',
      'dropdown'    => '',
      'titlebread'  => 'Home',
    );
    $this->load->view('user/template/navbar', $data);
    $this->load->view('user/template/footer', $data);
  }
  public function success(){
    $this->load->view('user/pages/complete');
  }
  public function error()
  {
  }
}
