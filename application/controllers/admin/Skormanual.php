<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skormanual extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/skormanual',
      'for'					=> 'skormanual',
			'dropdown'		=> 'dataskor',
      'titlebread'	=> 'Data Skor Manual',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Skor Manual')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
