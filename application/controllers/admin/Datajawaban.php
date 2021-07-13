<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajawaban extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/datajawaban',
      'for'					=> 'datajawaban',
			'dropdown'		=> '',
      'titlebread'	=> 'Data Jawaban',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Jawaban')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
