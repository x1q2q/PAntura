<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = array(
			'template'		=> 'user/pages/quiz',
			'for'					=> 'quiz',
			'dropdown'		=> '',
			'titlebread'	=> 'Home',
		);
		$this->load->view('user/template/navbar-quiz', $data);
		$this->load->view('user/template/footer-quiz', $data);
	}
	public function k($kode)
	{
		$sesi = get_cookie('user');
		if (empty($sesi)) {
			redirect('user/login');
		}
		$pos_data  = $this->m_pos->get_join_detail($kode);
		$waktu = $pos_data[0]["waktu"];
		$soal_asal = $this->m_soal->get_soal_detail($kode, $pos_data[0]["pos_id"]);
		$soal_data = array();
		$done = $this->m_jawaban->get_soal_detail($sesi, $kode);
		if ($done) {
			redirect('user/home/success');
		}
		foreach ($soal_asal as $val) {
			$soal_data[$val["id_quizsoal"]][] = $val;
		}
		$dt_new = array();
		foreach ($soal_data as $key => $res) {
			$dt_push = array('dt_pilihan' => []);
			foreach ($res as $val) {
				$dt_push["soal"]	= replace_img($val["soal"], $val["img_path"]);
				$dt_push["jenis"]	= $val["jenis"];
				$dt_push["id_soal"] = $val["id_quizsoal"];
			}
			foreach ($soal_asal as $res2) {
				if ($key == $res2["quizsoal_id"]) {
					array_push(
						$dt_push["dt_pilihan"],
						array(
							"pilihan" => $res2["pilihan"],
							"is_benar" => $res2["is_pilihan_benar"],
							"id_quizpilihan" => $res2['id_quizpilihan']
						)
					);
				}
			}
			array_push($dt_new, $dt_push);
		}
		$data = array(
			'template'		=> 'user/pages/quiz',
			'for'					=> 'quiz',
			'kode'				=> $kode,
			'dt_pos'			=> $pos_data,
			'waktu'				=> $waktu,
			'dt_soal'			=> $dt_new,
			'dropdown'		=> '',
			'titlebread'	=> 'Home',
		);
		$this->load->view('user/template/navbar-quiz', $data);
		$this->load->view('user/template/footer-quiz', $data);
	}
	public function essay()
	{
		$data = array(
			'template'		=> 'user/pages/quiz-essay',
			'for'					=> 'quiz',
			'dropdown'		=> '',
			'titlebread'	=> 'Soal',
		);
		$this->load->view('user/template/navbar-quiz', $data);
		$this->load->view('user/template/footer-quiz', $data);
	}
	public function inputjawaban()
	{
		$user = get_cookie('user');
		$submitedat = get_timestamp('Y-m-d H:i:s');
		$jawaban = json_decode($_POST['jawaban']);
		foreach ($jawaban[0]->dtpilihan as $ans) {
			$dt_jawaban = array(
				"pos_id" 				=> $jawaban[0]->pos_id,
				"siswa_id"			=> $user,
				"submited_at"		=> $submitedat,
				"jenis_jawaban" => $jawaban[0]->jenis,
				"kode_jawaban"	=> $jawaban[0]->kode_jawaban,
				"quizsoal_id"		=> $ans->quizsoal_id,
				"quizpilihan_id" => $ans->quizpilihan_id,
				"jawaban"				=> $ans->jawaban_pilihan,
				"is_jawaban_benar" => $ans->is_benar
			);
			$this->insertDB($dt_jawaban, $jawaban[0]->jenis, $ans->is_benar);
		}
		echo base_url('user/home/success');
	}
	public function insertDB($jawaban, $jenis, $isbenar)
	{
		$this->db->insert('pa_quiz_jawaban', $jawaban);
		$id_qjawaban = $this->db->insert_id();
		$created_at = get_timestamp('Y-m-d H:i:s');
		if (!empty($id_qjawaban)) {
			$dt_skor = array(
				'quizjawaban_id'	=> $id_qjawaban,
				'skor'						=> ($jenis == 'esai') ? "100" : (($isbenar == '1') ? "2" : "0"),
				'tipe'						=> 'otomatis',
				'created_at'			=> $created_at
			);
			$this->db->insert('pa_skoring', $dt_skor);
		}
	}
	public function error()
	{
	}
}
