<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasoal extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/datasoal',
      'for'					=> 'datasoal',
			'dropdown'		=> '',
      'titlebread'	=> 'Data Soal',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Soal')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
