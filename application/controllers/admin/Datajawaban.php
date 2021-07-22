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
		// $soal_data  = $this->m_jawaban->get_soal_detail($idsiswa,$kode);
		// foreach($soal_asal as $val){
		// 	$soal_data[$val["id_quizsoal"]][] = $val;
		// }
		//
		// $dt_new = array();
		// foreach($soal_data as $key => $res){
		// 	$dt_push = array('dt_pilihan' => []);
		// 	foreach($res as $val){
		// 		$dt_push["soal"]	= replace_img($val["soal"],$val["img_path"]);
		// 		$dt_push["jenis"]	= $val["jenis"];
		// 	}
		// 	foreach($soal_asal as $res2){
		// 		if($key == $res2["quizsoal_id"]){
		// 			array_push(
		// 				$dt_push["dt_pilihan"],
		// 					array(
		// 						"pilihan" => $res2["pilihan"],
		// 						"is_benar" => $res2["is_pilihan_benar"]
		// 					)
		// 			);
		// 		}
		// 	}
		// 	array_push($dt_new,$dt_push);
		// }
		//
		$where = array('id_admin' =>  $this->session->userdata('user_admin'));
		$data = array(
			'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
      'template'		=> 'admin/pages/detailjawaban',
      'for'					=> 'datajawaban',
			'dropdown'		=> '',
			'kode'				=> $kode,
			'dt_pos'			=> '',
			'dt_soal'			=> '',
      'titlebread'	=> 'Detail Datajawaban',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array(base_url('admin/datasoal/'),'Data Jawaban'),
					array('#','Detail Jawaban')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
	}
}
