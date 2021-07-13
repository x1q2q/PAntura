<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Papanskor extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/papanskor',
      'for'					=> 'papanskor',
			'dropdown'		=> '',
      'titlebread'	=> 'Papan Skor',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Papan Skor')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
}
