<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'user/pages/quiz',
      'for'					=> 'quiz',
			'dropdown'		=> '',
      'titlebread'	=> 'Home',
      );
			$this->load->view('user/template/navbar-quiz',$data);
			$this->load->view('user/template/footer-quiz',$data);
  }
  public function essay(){
    $data = array(
      'template'		=> 'user/pages/quiz-essay',
      'for'					=> 'quiz',
			'dropdown'		=> '',
      'titlebread'	=> 'Soal',
      );
			$this->load->view('user/template/navbar-quiz',$data);
			$this->load->view('user/template/footer-quiz',$data);
  }
  public function error(){

  }
}
