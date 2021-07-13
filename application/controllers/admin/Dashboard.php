<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/dashboard',
      'for'					=> 'dashboard',
			'dropdown'		=> '',
      'titlebread'	=> 'Dashboard',
      'contentbread'=> array(
					array(base_url('admin'),'Dahsboard'),
					array('#','Default')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
  public function error(){

  }
}
