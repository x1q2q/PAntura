<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatempat extends CI_Controller {
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
      'template'		=> 'admin/pages/datatempat',
      'for'					=> 'datatempat',
			'dropdown'		=> 'alldata',
      'titlebread'	=> 'Data Tempat',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Tempat')),
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
    $sql_total = $this->m_tempat->count_all();
    $sql_data = $this->m_tempat->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_tempat->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);
  }
	public function tambahdata(){
		$this->form_validation->set_rules('tempat','TEMPAT','required|trim');
		$this->form_validation->set_rules('lokasi','LOKASI TEMPAT','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("YOU CANT ATTACK ME WITH THAT. BUNG! ");
		}else{
			$dt_input = array(
				'nm_tempat' 			=> $this->input->post('tempat'),
				'lokasi_tempat'		=> $this->input->post('lokasi')
			);
			$insert = $this->db->insert('pa_tempat',$dt_input);
			if($insert){
				$this->session->set_flashdata('hijau','Data Tempat berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('merah','Data Tempat gagal ditambahkan');
			}
			redirect('admin/datatempat');
		}
	}
	public function editdata($id){
		$this->form_validation->set_rules('tempat','TEMPAT','required|trim');
		$this->form_validation->set_rules('lokasi','LOKASI TEMPAT','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("SORRY BOR. YOU CAN'T ATTACK ME WITH THAT :( ");
		}else{
			$dt_input = array(
				'nm_tempat' 			=> $this->input->post('tempat'),
				'lokasi_tempat'		=> $this->input->post('lokasi')
			);
			$where = array('id_tempat' => $id);
			$update = $this->db->update('pa_tempat',$dt_input,$where);
			if($update){
				$this->session->set_flashdata('hijau','Data Tempat berhasil diupdate');
			}else{
				$this->session->set_flashdata('merah','Data Tempat gagal diupdate');
			}
			redirect('admin/datatempat');
		}
	}
	public function hapusdata($id){
		$where = array('id_tempat' => $id);
		$delete = $this->db->delete('pa_tempat',$where);
		if($delete){
			$this->session->set_flashdata('merah','Data Tempat berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data Tempat gagal dihapus');
		}
		redirect('admin/datatempat');
	}
}
