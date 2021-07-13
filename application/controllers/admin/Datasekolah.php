<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasekolah extends CI_Controller {
	public function __construct(){
    parent::__construct();
  }
  public function index(){
    $data = array(
      'template'		=> 'admin/pages/datasekolah',
      'for'					=> 'datasekolah',
			'dropdown'		=> 'alldata',
      'titlebread'	=> 'Data Sekolah',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Sekolah')),
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
    $sql_total = $this->m_sekolah->count_all();
    $sql_data = $this->m_sekolah->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_sekolah->count_filter($search);
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
		$this->form_validation->set_rules('sekolah','SEKOLAH','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("YOU CANT ATTACK ME WITH THAT. BUNG! ");
		}else{
			$desk = $this->input->post('deskripsi');
			$dt_input = array(
				'nm_sekolah' 				=> $this->input->post('sekolah'),
				'deskripsi_sekolah'	=> $desk == null?'-':$desk
			);
			$insert = $this->db->insert('pa_sekolah',$dt_input);
			if($insert){
				$this->session->set_flashdata('hijau','Data Sekolah berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('merah','Data Sekolah gagal ditambahkan');
			}
			redirect('admin/datasekolah');
		}
	}
	public function editdata($id){
		$this->form_validation->set_rules('sekolah','SEKOLAH','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("SORRY BOR. YOU CAN'T ATTACK ME WITH THAT :( ");
		}else{
			$desk = $this->input->post('deskripsi');
			$dt_input = array(
				'nm_sekolah' 				=> $this->input->post('sekolah'),
				'deskripsi_sekolah'	=> $desk == null?'-':$desk
			);
			$where = array('id_sekolah' => $id);
			$update = $this->db->update('pa_sekolah',$dt_input,$where);
			if($update){
				$this->session->set_flashdata('hijau','Data Sekolah berhasil diupdate');
			}else{
				$this->session->set_flashdata('merah','Data Sekolah gagal diupdate');
			}
			redirect('admin/datasekolah');
		}
	}
	public function hapusdata($id){
		$where = array('id_sekolah' => $id);
		$delete = $this->db->delete('pa_sekolah',$where);
		if($delete){
			$this->session->set_flashdata('merah','Data Sekolah berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data Sekolah gagal dihapus');
		}
		redirect('admin/datasekolah');
	}
}
