<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'user/pages/profil',
      'for'					=> 'profil',
			'dropdown'		=> '',
      'titlebread'	=> 'Profil',
      );
			$this->load->view('user/template/navbar',$data);
			$this->load->view('user/template/footer',$data);
  }
  public function error(){

  }
}
