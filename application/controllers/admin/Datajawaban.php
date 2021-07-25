<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajawaban extends CI_Controller {
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

	public function alldata(){
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $this->m_jawaban->count_all();
    $sql_data = $this->m_jawaban->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter =  $this->m_jawaban->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);;
  }
	public function detail($idsiswa,$kode){
		$q_infjawaban = $this->m_jawaban->get_info_jawaban($idsiswa,$kode);
		$dt_infjawaban = array();

		$dt_jawabanpil = array();
		$dt_jawabanbnr = array();
    foreach($q_infjawaban as $val){
      $dtinf_jawaban['username'] = $val->username;
      $dtinf_jawaban['regu'] = $val->regu;
      $dtinf_jawaban['pos'] = $val->nm_pos;
      $dtinf_jawaban['tempat'] = $val->nm_tempat;
      $dtinf_jawaban['submited_at'] = $val->submited_at;
			// array_push($dt_jawabanpil,$val->quizpilihan_id);
			if($val->is_jawaban_benar == '1'){
				array_push($dt_jawabanbnr,'x');
			}
    }
		$dtinf_jawaban['skor'] = count($dt_jawabanbnr) * 2;

		$data_jawaban = array();
		$q_dtjawaban  = $this->m_jawaban->get_soal_detail($idsiswa,$kode);
		$soal_data = array();
		foreach($q_dtjawaban as $val){
			$soal_data[$val["quizsoal_id"]][] = $val;
		}

		foreach($soal_data as $key => $res){
			$dt_push = array('dt_pilihan' => []);
			foreach($res as $val){
				$dt_push["soal"]	= replace_img($val["soal"],$val["img_path"]);
				$dt_push["jenis"]	= $val["jenis"];
				$dt_push['is_benar'] = $val['is_jawaban_benar'];
				$dt_push['jawaban'] = $val['jawaban'];
			}
			foreach($q_dtjawaban as $hsl){
				if($key == $hsl["quizsoal_id"]){
					array_push(
						$dt_push["dt_pilihan"],
							array(
								'id_pilihan'	=> $hsl['id_quizpilihan'],
								"pilihan" 		=> $hsl["pilihan"],
								"is_benar" 		=> $hsl["is_pilihan_benar"],
								'id_terpilih' => $hsl['quizpilihan_id'],
							)
					);
				}
			}
			array_push($data_jawaban,$dt_push);
		}

		$where = array('id_admin' =>  $this->session->userdata('user_admin'));
		$data = array(
			'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
      'template'		=> 'admin/pages/detailjawaban',
      'for'					=> 'datajawaban',
			'dropdown'		=> '',
			'dt_jawaban'	=> $data_jawaban,
			'inf_jawaban' => $dtinf_jawaban,
      'titlebread'	=> 'Detail Jawaban',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array(base_url('admin/datajawaban/'),'Data Jawaban'),
					array('#','Detail Jawaban')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
	}
}
