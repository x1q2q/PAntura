<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'user/pages/kode',
      'for'					=> 'kode',
			'dropdown'		=> '',
      'titlebread'	=> 'Masukkan Kode Soal',
      );
			$this->load->view('user/template/navbar',$data);
			$this->load->view('user/template/footer',$data);
  }
  public function error(){

  }
}
