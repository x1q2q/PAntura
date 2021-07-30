<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Papanskor extends CI_Controller {
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
      'template'		=> 'admin/pages/papanskor',
      'for'					=> 'papanskor',
			'dropdown'		=> '',
      'titlebread'	=> 'Papan Skor',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array('#','Papan Skor')),
      );
			$this->load->view('admin/template/navigation',$data);
			$this->load->view('admin/template/sidebar',$data);
			$this->load->view('admin/template/content',$data);
  }
	public function all(){
		$where = array('id_admin' =>  $this->session->userdata('user_admin'));
		$data = array(
			'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
      'template'		=> 'admin/pages/all_peringkat',
      'for'					=> 'papanskor',
			'dropdown'		=> '',
      'titlebread'	=> 'Papan Skor',
			'contentbread'=> array(
					array(base_url('admin/'),'Dashboard'),
					array(base_url('admin/papanskor/'),'Papan Skor'),
					array('#','All peringkat')),
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
    $sql_total = $this->m_papanskor->count_all();
    $sql_data = $this->m_papanskor->filter($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter = $this->m_papanskor->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);
  }
}
