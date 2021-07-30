<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataskor extends CI_Controller {
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
      'template'		=> 'admin/pages/dataskor',
      'for'					=> 'dataskor',
			'dropdown'		=> '',
      'titlebread'	=> 'Data Skor',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Skor')),
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
    $sql_total = $this->m_dataskor->count_all();
    $sql_data = $this->m_dataskor->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter =  $this->m_dataskor->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);;
  }
	public function detail($idsiswa){
		$dt_user = $this->m_global->get_userdata(array('id_siswa' => $idsiswa));
		$q	= $this->m_dataskor->get_detail_skor($idsiswa);
		$filter = array();
		$new_dt = array();
		foreach($q as $val){
			$filter[$val->kode_jawaban][] = $val;
		}

		foreach ($filter as $key => $val) {
			$dt_push = array("dt_skor" => array());
			$dt_pilgan = array();
			foreach($val as $value){
				$dt_push["pos_id"] 			= $value->pos_id;
				$dt_push["nm_pos"]			= $value->nm_pos;

				if($key == $value->kode_jawaban){
					if($value->jenis_jawaban == 'pilgan'){
						array_push($dt_pilgan,$value->skor);
					}else if($value->jenis_jawaban == 'esai'){ // jika pilgan
						array_push($dt_push["dt_skor"],
								array(
									'id_qjawab' => $value->id_quizjawaban,
									'skor'			=> $value->skor,
									'jenis'			=> $value->jenis_jawaban,
									'jawaban'		=> $value->jawaban
								)
						);
					}
				}
			}
			if(count($dt_pilgan)>0){ // to escape from empty option
				array_push($dt_push['dt_skor'],
					array(
						'id_qjawab' => '1',
						'skor'			=> array_sum($dt_pilgan),
						'jenis'			=> 'pilgan',
						'jawaban'		=> '*pilihan ganda!'
					));
			}
			array_push($new_dt,$dt_push);
		}
		$this->index();
		$data = array(
			'id'				=> $idsiswa,
			'dt_detail'	=> $new_dt,
			'nama'			=> $dt_user["username"],
			'regu'			=> $dt_user["regu"]
		);
		$this->load->view('admin/pages/detail_skor',$data);
	}
	public function updatedata(){
		$dt_update = json_decode($_POST['update']);
		foreach($dt_update as $val){
				$dt_upd = array(
						'skor' 			=> $val->skor,
						'tipe'			=> 'manual',
						'created_at'=> get_timestamp('Y-m-d H:i:s')
				);
				$where = array('quizjawaban_id' => $val->id_qjawaban);
				//update pa_skoring
				$update_skoring = $this->db->update('pa_skoring',$dt_upd,$where);
				if($update_skoring){
					$this->session->set_flashdata('hijau','Data SKOR Point <b>('.$val->nm_siswa.')</b> berhasil diupdate');
				}else{
					$this->session->set_flashdata('merah','Data SKOR Point <b>('.$val->nm_siswa.')</b> gagal diiupdate');
				}
			}
    echo base_url('admin/dataskor/');
	}
	public function updateSkor(){
		$skor = $this->input->post('skor');
		$dt_upd = array(
				'skor' 			=> $skor,
				'tipe'			=> 'manual',
				'created_at'=> get_timestamp('Y-m-d H:i:s')
		);
		$where = array('siswa_id' => $id_qjawab);
		$dt_updated = $this->m_global->get_detail('pa_quiz_jawaban',array('id_quizjawaban' => $id_qjawab))->result();
		$id_soal = $dt_updated[0]->quizsoal_id;
		if($this->db->update('pa_skoring',$dt_upd,$where)){
			$this->session->set_flashdata('hijau','Data SKOR ID soal <b>('.$id_soal.')</b> berhasil diupdate!');
		}else{
			$this->session->set_flashdata('merah','Gagal mengupdate Data SKOR kode Jawaban ID soal <b>('.$kd_jawaban.')</b>');
		}
		redirect(base_url('admin/skoringesai'));
	}
}
