<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/login',
      'for'					=> 'login',
      'titlebread'	=> 'Login',
      'contentbread'=> array('ni-tv-2','Dashboards','default')
      );
			$this->load->view('admin/pages/login',$data);
  }
}
