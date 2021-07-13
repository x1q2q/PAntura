<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasoal extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/datasoal',
      'for'					=> 'datasoal',
			'dropdown'		=> '',
      'titlebread'	=> 'Data Soal',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Soal')),
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
    $sql_total = $this->m_soal->count_all();
    $sql_data = $this->m_soal->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_soal->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);
  }
	public function tambah(){
		$this->form_validation->set_rules('pos[]','Untuk POS','required');
		$this->form_validation->set_rules('kode','KODE(QR/Input)','required|max_length[11]|min_length[9]');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("YOU CANT ATTACK ME WITH THAT. BUNG! ");
		}else{
			$pos = $this->input->post('pos[]');
			$kode = $this->input->post('kode');
			$data = array(
	      'template'		=> 'admin/pages/tambahsoal',
	      'for'					=> 'datasoal',
				'dropdown'		=> '',
				'jml_soal'		=> '0',
				'kode'				=> $kode,
				'dt_pos'			=> $this->m_pos->get_in($pos),
	      'titlebread'	=> 'Tambah Soal',
				'contentbread'=> array(
						array(base_url('admin/'),'Dashboard'),
						array(base_url('admin/datasoal/'),'Data Soal'),
						array('#','Tambah Soal')),
	      );
				$this->load->view('admin/template/navigation',$data);
				$this->load->view('admin/template/sidebar',$data);
				$this->load->view('admin/template/content',$data);
		}
	}
	public function detail($jml,$kode){
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
		//
		$data = array(
      'template'		=> 'admin/pages/detailsoal',
      'for'					=> 'datasoal',
			'dropdown'		=> '',
			'jml_soal'		=> $jml,
			'kode'				=> $kode,
			'dt_pos'			=> $pos_data,
			'dt_soal'			=> $dt_new,
      'titlebread'	=> 'Detail Soal',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array(base_url('admin/datasoal/'),'Data Soal'),
					array('#','Detail Soal')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
	}
	public function hapusdata($id){
		$where = array('kode' => $id);
		$delete = $this->db->delete('pa_quiz_soal',$where);
		if($delete){
			$this->session->set_flashdata('merah','Data Quiz Soal berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data Quiz Soal gagal dihapus');
		}
		redirect('admin/datasoal');
	}
}
