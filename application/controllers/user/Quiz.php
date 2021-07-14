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
  public function k($kode){
    $pos_data  = $this->m_pos->get_join_detail($kode);
		$soal_asal = $this->m_soal->get_soal_detail($kode,$pos_data[0]["pos_id"]);
		$soal_data = array();
		foreach($soal_asal as $val){
			$soal_data[$val["soal"]][] = $val;
		}
		$no=0;
		$dt_new = array();
		foreach($soal_data as $res){
			array_push($dt_new,
				array(
						"soal" => $res[$no]["soal"],
            "gambar" => $res[$no]["img_path"],
						"jenis" => $res[$no]["jenis"],
						"dt_pilihan" => []
				)
			);
			foreach($soal_asal as $res2){
				if($res[$no]["id_quizsoal"] == $res2["quizsoal_id"]){
					array_push(
						$dt_new[$no]["dt_pilihan"],
							array(
								"pilihan" => $res2["pilihan"],
								"is_benar" => $res2["is_pilihan_benar"]
							)
					);
				}
			}
			$no++;
		}
    $data = array(
      'template'		=> 'user/pages/quiz',
      'for'					=> 'quiz',
      'kode'				=> $kode,
			'dt_pos'			=> $pos_data,
			'dt_soal'			=> $dt_new,
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
