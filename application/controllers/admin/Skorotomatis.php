<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skorotomatis extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/skorotomatis',
      'for'					=> 'skorotomatis',
			'dropdown'		=> 'dataskor',
      'titlebread'	=> 'Data Skor Otomatis',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Skor Otomatis')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
