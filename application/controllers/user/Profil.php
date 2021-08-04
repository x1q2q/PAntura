<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $sesi = get_cookie('user');
		if (empty($sesi)) {
			redirect('user/login');
		}
    $where = array("id_siswa"=> $sesi);
    $user = $this->m_global->get_userdata($where);
    $tabel = 'pa_sekolah';
    $wheres = array('id_sekolah' => $user['sekolah_id']);
    $sekulnama = '';
    $sekolah = $this->m_global->get_detail($tabel, $wheres);
    $detailSkor = $this->db->select('total_skor, pos_selesai')->where('username', $user['username'])->get('pa_papanskor')->result();
    $skor = '';
    $posselesai = '';
    foreach($detailSkor as $d){
      $skor = $d->total_skor;
      $posselesai = $d->pos_selesai;
    }
    foreach($sekolah->result() as $s){
      $sekulnama = $s->nm_sekolah;
    }
    $data = array(
      'template'		=> 'user/pages/profil',
      'for'					=> 'profil',
      'user'        => $user,
      'sekolah'     => $sekulnama,
      'skor'        => $skor,
      'pos'        => $posselesai,
			'dropdown'		=> '',
      'titlebread'	=> 'Profil',
      );
			$this->load->view('user/template/navbar',$data);
			$this->load->view('user/template/footer',$data);
  }
  public function error(){

  }
}
