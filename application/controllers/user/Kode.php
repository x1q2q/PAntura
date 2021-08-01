<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $sesi = $this->session->userdata('user');
    if (empty($sesi)) {
      redirect('user/login');
    }
    $data = array(
      'template'		=> 'user/pages/kode',
      'for'					=> 'kode',
			'dropdown'		=> '',
      'titlebread'	=> 'Masukkan Kode Soal',
      );
			$this->load->view('user/template/navbar',$data);
			$this->load->view('user/template/footer',$data);
  }
  public function confirm(){
    $kode = $this->input->post('kode');
    $pos_data  = $this->m_pos->get_join_detail($kode);
    $soal = $this->m_soal->get_soal_detail($kode,$pos_data[0]["pos_id"]);
    if (count($soal) > 0) {
      return redirect('user/quiz/k/'.$kode);
    }else{
      $this->session->set_flashdata('merah','Kode Salah');
      return redirect('user/kode');
    }
  }

  public function error(){

  }
}
