<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/datasiswa',
      'for'					=> 'datasiswa',
			'dropdown'		=> 'alldata',
      'titlebread'	=> 'Data Siswa',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Siswa')),
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
    $sql_total = $this->m_siswa->count_all();
    $sql_data = $this->m_siswa->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_siswa->count_filter($search);
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
		$this->form_validation->set_rules('sekolah','SEKOLAH','required');
		$this->form_validation->set_rules('regu','REGU','required');
		$this->form_validation->set_rules('username','USERNAME','required|trim');
		$this->form_validation->set_rules('password','PASSWORD','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("SORRY BOR. YOU CAN'T ATTACK ME WITH THAT :( ");
		}else{
			$fullname = $this->input->post('fullname');
			$username = $this->input->post('username');
			$dt_input = array(
				'sekolah_id'		=> $this->input->post('sekolah'),
				'regu_id'				=> $this->input->post('regu'),
				'username'			=> $username,
				'password'			=> $this->input->post('password'),
				'fullname'			=> $fullname == null?$username:$fullname
			);
			$insert = $this->db->insert('pa_siswa',$dt_input);
			if($insert){
				$this->session->set_flashdata('hijau','Data SISWA berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('merah','Data SISWA gagal ditambahkan');
			}
			redirect('admin/datasiswa');
		}
	}
	public function editdata($id){
		$this->form_validation->set_rules('sekolah','SEKOLAH','required');
		$this->form_validation->set_rules('regu','REGU','required');
		$this->form_validation->set_rules('username','USERNAME','required|trim');
		$this->form_validation->set_rules('password','PASSWORD','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("SORRY BOR. YOU CAN'T ATTACK ME WITH THAT :( ");
		}else{
			$fullname = $this->input->post('fullname');
			$username = $this->input->post('username');
			$dt_input = array(
				'sekolah_id'		=> $this->input->post('sekolah'),
				'regu_id'				=> $this->input->post('regu'),
				'username'			=> $username,
				'password'			=> $this->input->post('password'),
				'fullname'			=> $fullname == null?$username:$fullname
			);
			$where = array('id_siswa' => $id);
			$update = $this->db->update('pa_siswa',$dt_input,$where);
			if($update){
				$this->session->set_flashdata('hijau','Data SISWA berhasil diupdate');
			}else{
				$this->session->set_flashdata('merah','Data SISWA gagal diupdate');
			}
			redirect('admin/datasiswa');
		}
	}
	public function hapusdata($id){
		$where = array('id_siswa' => $id);
		$delete = $this->db->delete('pa_siswa',$where);
		if($delete){
			$this->session->set_flashdata('merah','Data SISWA berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data SISWA gagal dihapus');
		}
		redirect('admin/datasiswa');
	}
}
