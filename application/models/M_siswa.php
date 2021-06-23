<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*");
    $this->db->from('pa_siswa sw');
    $this->db->join('pa_sekolah s','sw.sekolah_id=s.id_sekolah');
    $this->db->join('pa_regu r','sw.regu_id=r.id_regu');
    $this->db->like('sw.username', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.fullname', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('s.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('r.nm_regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('pa_regu');
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_siswa sw');
    $this->db->join('pa_sekolah s','sw.sekolah_id=s.id_sekolah');
    $this->db->join('pa_regu r','sw.regu_id=r.id_regu');
    $this->db->like('sw.username', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.fullname', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('s.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('r.nm_regu', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
}
?>
