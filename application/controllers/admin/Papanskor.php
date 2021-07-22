<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Papanskor extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$sesi = $this->session->userdata('user_admin');
		if(empty($sesi)){
			redirect('admin/login');
			return false;
		}
  }
  public function index(){
		$where = array('id_admin' =>  $this->session->userdata('user_admin'));
		$data = array(
			'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
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
