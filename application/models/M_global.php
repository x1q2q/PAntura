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
    $login = $this->m_global->get_detail('pa_admin',$where);
		foreach($login->result() as $profil){
			$nama		= $profil->username;
      $role		= $profil->role;
		}
    return ($tipe == 'nama')? $nama : $role;
  }
  public function get_userdata($where){
    $users = $this->m_global->get_detail('pa_siswa', $where);
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
}
?>
