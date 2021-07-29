<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skoringesai extends CI_Controller {
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
      'template'		=> 'admin/pages/skoringesai',
      'for'					=> 'skoringesai',
			'dropdown'		=> '',
      'titlebread'	=> 'Skoring Esai',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Skoring Esai')),
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
    $sql_total = $this->m_skoring->count_all();
    $sql_data = $this->m_skoring->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter =  $this->m_skoring->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);;
  }
	public function updateSkor($id_qjawab){
		$skor = $this->input->post('skor');
		$dt_upd = array(
				'skor' 			=> $skor,
				'tipe'			=> 'manual',
				'created_at'=> get_timestamp('Y-m-d H:i:s')
		);
		$where = array('quizjawaban_id' => $id_qjawab);
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
