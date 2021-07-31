<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapos extends CI_Controller {
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
      'template'		=> 'admin/pages/datapos',
      'for'					=> 'datapos',
			'dropdown'		=> 'alldata',
      'titlebread'	=> 'Data Pos',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Data Pos')),
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
    $sql_total = $this->m_pos->count_all();
    $sql_data = $this->m_pos->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_pos->count_filter($search);
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
		$this->form_validation->set_rules('tempat','TEMPAT','required');
		$this->form_validation->set_rules('pos','POS','required|trim');
		$this->form_validation->set_rules('lokasi','LOKASI POS','required|trim');

		$tempat = $this->input->post('tempat');
		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("YOU CANT ATTACK ME WITH THAT. BUNG! ");
		}else{
			$desk = $this->input->post('deskripsi');
			$nm_pos = strtoupper($this->input->post('pos'));
			$dt_input = array(
				'tempat_id'		=> $tempat,
				'nm_pos' 			=> $nm_pos,
				'lokasi_pos'	=> $this->input->post('lokasi'),
				'deskripsi_pos'=> $desk == null?'-':$desk,
				'waktu'				=> $this->milihWaktu($nm_pos),
			);
			$insert = $this->db->insert('pa_pos',$dt_input);
			if($insert){
				$this->session->set_flashdata('hijau','Data POS berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('merah','Data POS gagal ditambahkan');
			}
			redirect('admin/datapos');
		}
	}
	public function editdata($id){
		$this->form_validation->set_rules('tempat','TEMPAT','required|trim');
		$this->form_validation->set_rules('pos','POS','required|trim');
		$this->form_validation->set_rules('lokasi','LOKASI POS','required|trim');

		if($this->form_validation->run() == FALSE){
			$this->index();
			alert("SORRY BOR. YOU CAN'T ATTACK ME WITH THAT :( ");
		}else{
			$desk = $this->input->post('deskripsi');
			$nm_pos = strtoupper($this->input->post('pos'));
			$dt_input = array(
				'tempat_id'		=> $this->input->post('tempat'),
				'nm_pos' 			=> $nm_pos,
				'lokasi_pos'	=> $this->input->post('lokasi'),
				'deskripsi_pos'=> $desk == null?'-':$desk,
				'waktu'				=> $this->milihWaktu($nm_pos),
			);
			$where = array('id_pos' => $id);
			$update = $this->db->update('pa_pos',$dt_input,$where);
			if($update){
				$this->session->set_flashdata('hijau','Data Tempat berhasil diupdate');
			}else{
				$this->session->set_flashdata('merah','Data Tempat gagal diupdate');
			}
			redirect('admin/datapos');
		}
	}
	public function hapusdata($id){
		$where = array('id_pos' => $id);
		$delete = $this->db->delete('pa_pos',$where);
		if($delete){
			$this->session->set_flashdata('merah','Data Tempat berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data Tempat gagal dihapus');
		}
		redirect('admin/datapos');
	}
	public function milihWaktu($pos){
		$waktu;
		switch ($pos) {
			case DATAPOS[0]["NAMA"]: // jika pos 1
				$waktu = 1800;
				break;

			case DATAPOS[1]["NAMA"]: // jika pos 2
					$waktu = 1800;
					break;

			case DATAPOS[2]["NAMA"]: // jika pos 3
					$waktu = 2400;
					break;

			case DATAPOS[3]["NAMA"]: // jika pos 4
					$waktu = 900;
					break;

			case DATAPOS[4]["NAMA"]: // jika pos 5
					$waktu = 7200;
					break;

			default:
				$waktu = 1800; // jaga-jaga
				break;
		}
		return $waktu;
	}
}
