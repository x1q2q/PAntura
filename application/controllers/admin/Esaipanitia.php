<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esaipanitia extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/esaipanitia',
      'for'					=> 'esaipanitia',
			'dropdown'		=> '',
      'titlebread'	=> 'Esai Panitia',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Esai Panitia')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
