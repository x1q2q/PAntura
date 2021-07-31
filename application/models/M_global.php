<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {
  public function get_all($tabel){
    $q = $this->db->get($tabel);
    return $q;
  }
  public function get_detail($tabel,$where){
		$this->db->from($tabel)
				 ->where($where);
		$q = $this->db->get();
		return $q;
	}
  public function cek_row($query){
		return $query->num_rows();
	}
  public function get_profil($where,$tipe){
    $role = '';
    $nama = '';
    $login = $this->get_detail('pa_admin',$where);
		foreach($login->result() as $profil){
			$nama		= $profil->username;
      $role		= $profil->role;
		}
    return ($tipe == 'nama')? $nama : $role;
  }
  public function get_userdata($where){
    $users = $this->get_detail('pa_siswa', $where);
    $data = array();
    foreach($users->result() as $user){
      $data = array(
        'username' => $user->username,
        'regu' => $user->regu,
        'jenkel' => $user->jenkel,
        'sekolah_id' => $user->sekolah_id,
        'password' => $user->password
      );
    }
    return $data;
  }
  public function get_summary1($tipe){
    switch ($tipe) {
      case 'totalSekolah':
        $ret = $this->db->get('pa_sekolah');
        break;

      case 'totalTempat':
        $ret = $this->db->get('pa_tempat');
        break;

      case 'totalPOS':
        $ret = $this->db->get('pa_pos');
        break;
    }
    return $ret->num_rows();
  }
  public function get_summary2($tipe){
    switch ($tipe) {
      case 'totalSiswa':
        $ret = $this->db->get('pa_siswa');
        break;

      case 'telahLogin':
        $ret = $this->get_detail('pa_siswa', array('is_login' => '1'));
        break;

      case 'belumLogin':
        $ret = $this->get_detail('pa_siswa', array('is_login' => '0'));
        break;
    }
    return $ret->num_rows();
  }
  public function get_summary3($tipe){
    switch ($tipe) {
      case 'totalSoal':
        $this->db->select("count(DISTINCT soal) as jml_soal");
        $this->db->from('pa_quiz_soal');
        $q = $this->db->get()->result();
        $ret = $q[0]->jml_soal;
        break;

      case 'totalPilgan':
        $this->db->select("count(DISTINCT soal) as jml_soal");
        $this->db->from('pa_quiz_soal');
        $this->db->where('jenis','pilgan');
        $q = $this->db->get()->result();
        $ret = $q[0]->jml_soal;
        break;

      case 'totalEsai':
        $this->db->select("count(DISTINCT soal) as jml_soal");
        $this->db->from('pa_quiz_soal');
        $this->db->where('jenis','esai');
        $q = $this->db->get()->result();
        $ret = $q[0]->jml_soal;
        break;
    }
    return $ret;
  }
  public function get_summary4($tipe){
    switch ($tipe) {
      case 'reguSelesai':
        $q = $this->get_detail('pa_papanskor',array('pos_selesai' => count(DATAPOS)));
        $ret = $q->num_rows();
        break;

      case 'jawabanMasuk':
        $this->db->from('pa_quiz_jawaban');
        $this->db->group_by(array('siswa_id','kode_jawaban'));
        $ret =  $this->db->count_all_results();
        break;

      case 'belumDiskoring':
        $this->db->select("*");
        $this->db->from('pa_quiz_jawaban jwb');
        $this->db->join('pa_skoring skr','jwb.id_quizjawaban=skr.quizjawaban_id');
        $this->db->where(array('jwb.jenis_jawaban' => 'esai','skr.tipe' => 'otomatis'));
        $ret =  $this->db->count_all_results();
        break;
    }
    return $ret;
  }
}
?>
