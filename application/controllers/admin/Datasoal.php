<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasoal extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$this->load->library('upload');
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

	public function model_data($search, $limit, $start, $order_field, $order_ascdesc){
		$model = $this->m_soal->filter($search, $limit, $start, $order_field, $order_ascdesc);
		$filter = array();
		$new_dt = array();
		foreach($model as $val){
			$filter[$val["kode"]][] = $val;
		}

		foreach ($filter as $key => $val) {
			$dt_push = array("pos_id" => [],"pos_tempat" => [], "nm_tempat" => []);
			foreach($val as $value){
				$dt_push["kode"] 				= $value["kode"];
				$dt_push["created_at"]	= $value["created_at"];
				$dt_push["jml_soal"]		= $value["jml_soal"];
				$dt_push["id_quizsoal"] = $value["id_quizsoal"];

				if($key == $value["kode"]){
					array_push($dt_push["pos_id"], $value["pos_id"]);
					array_push($dt_push["pos_tempat"], $value["nm_pos"].'-'.$value["nm_tempat"]);
				}
			}
			array_push($new_dt,$dt_push);
		}
		return $new_dt;
	}

	public function alldata(){
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $this->m_soal->count_all();
    $sql_data = $this->model_data($search, $limit, $start, $order_field, $order_ascdesc);
    $sql_filter =  $this->m_soal->count_filter($search);
    $callback = array(
        'draw'						=>$_POST['draw'],
        'recordsTotal'		=>$sql_total,
        'recordsFiltered'	=>$sql_filter,
        'data'						=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback);;
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
			$where = array('id_admin' =>  $this->session->userdata('user_admin'));
			$data = array(
				'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
	      'template'		=> 'admin/pages/tambahsoal',
	      'for'					=> 'datasoal',
				'dropdown'		=> '',
				'jml_soal'		=> '0',
				'kode'				=> $kode,
				'dt_pos'			=> $this->m_pos->get_in($pos),
				'dt_posid'		=> implode("-",$pos),
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
		function replace_img($soal,$imgname){
			return str_replace('src="'.$imgname.'"','src="'.base_url(PATH_IMGSOAL).$imgname.'"', $soal);
		}
		$pos_data  = $this->m_pos->get_join_detail($kode);
		$soal_asal = $this->m_soal->get_soal_detail($kode,$pos_data[0]["pos_id"]);
		$soal_data = array();
		foreach($soal_asal as $val){
			$soal_data[$val["id_quizsoal"]][] = $val;
		}

		$dt_new = array();
		foreach($soal_data as $key => $res){
			$dt_push = array('dt_pilihan' => []);
			foreach($res as $val){
				$dt_push["soal"]	= replace_img($val["soal"],$val["img_path"]);
				$dt_push["jenis"]	= $val["jenis"];
			}
			foreach($soal_asal as $res2){
				if($key == $res2["quizsoal_id"]){
					array_push(
						$dt_push["dt_pilihan"],
							array(
								"pilihan" => $res2["pilihan"],
								"is_benar" => $res2["is_pilihan_benar"]
							)
					);
				}
			}
			array_push($dt_new,$dt_push);
		}
		//
		$where = array('id_admin' =>  $this->session->userdata('user_admin'));
		$data = array(
			'nm_admin'		=> $this->m_global->get_profil($where,'nama'),
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
	public function inputsoal(){
		function replace_url($imgpath){ // mengganti src imgpath ke hanya nama saja
			return str_replace(base_url(PATH_IMGSOAL),"",$imgpath);
		}
		$soal = json_decode($_POST['soal']);
		foreach($soal as $val){
			foreach($val->posid as $dtposid){
				$unik_id = strtoupper(substr('QZ'.mt_rand().time(),0,8));
				$created = get_timestamp('Y-m-d H:i:s');
				$dt_insoal = array(
					'id_quizsoal' => $unik_id,
					'pos_id'			=> $dtposid,
					'kode'				=> $val->kode,
					'soal'				=> replace_url($val->soal),
					'jenis'				=> $val->jenis,
					'created_at' 	=> $created,
					'img_path'		=> replace_url($val->imgpath)
				);
				//insert into soal
				$insert_soal = $this->db->insert('pa_quiz_soal',$dt_insoal);
				if($insert_soal){
					foreach($val->dtpilihan as $pilihan){
						$dt_inpilihan = array(
							'quizsoal_id' 		=> $unik_id,
							'pilihan'					=> $pilihan->pilihan,
							'is_pilihan_benar'=> $pilihan->is_benar
						);
						// insert into pilihan
						$insert_pil = $this->db->insert('pa_quiz_pilihan',$dt_inpilihan);
						if($insert_pil){
							$this->session->set_flashdata('hijau','Data Quiz Soal berhasil ditambahkan');
						}else{
							$this->session->set_flashdata('merah','Data Quiz Soal gagal ditambahkan');
						}
					}
				}else{
					$this->session->set_flashdata('merah','Data Quiz Soal gagal ditambahkan');
				}
			}
		}
    echo base_url('admin/datasoal/');
	}
	public function hapusdata($id){
		$query = $this->m_global->get_detail('pa_quiz_soal',array('kode' => $id));
		foreach($query->result() as $val){
			$file_name = str_replace(base_url(), '', base_url(PATH_IMGSOAL).$val->img_path);
	  	unlink($file_name);
		}
		$where = array('kode' => $id);
		$delete = $this->db->delete('pa_quiz_soal', $where);
		if($delete){
			$this->session->set_flashdata('merah','Data Quiz Soal berhasil dihapus');
		}else{
			$this->session->set_flashdata('merah','Data Quiz Soal gagal dihapus');
		}
		redirect('admin/datasoal');
	}
	public function upload_image(){
		$response  = array('type' => '0','message' => 'error server');
    if(isset($_FILES["image"]["name"])){
        $config['upload_path'] = PATH_IMGSOAL;
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG';
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('image')){
            $error = $this->upload->display_errors();
						$response['type'] = '0';
						$response['message'] = $error;
        }else{
            $data = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']= PATH_IMGSOAL.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '60%';
            $config['new_image']= PATH_IMGSOAL.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

						$this->session->set_flashdata('hijau','Image untuk soal berhasil diupload');
            $response['type'] = '1';
						$response['message'] = base_url().PATH_IMGSOAL.$data['file_name'];
        }
    }
		header('Content-Type: application/json');
    echo json_encode($response);
	}
	public function delete_image(){
	    $src = $this->input->post('src');
	    $file_name = str_replace(base_url(), '', $src);
	    if(unlink($file_name)){
	        echo 'File Delete Successfully';
	    }
	}
}
