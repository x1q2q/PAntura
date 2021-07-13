<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soal extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*, count(qs.pos_id) as jml_soal");
    $this->db->from('pa_quiz_soal qs');
    $this->db->join('pa_pos p','qs.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','t.id_tempat=p.tempat_id');
    $this->db->group_by('qs.pos_id');
    $this->db->like('qs.created_at', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('qs.id_quizsoal', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('p.nm_pos', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('t.nm_tempat', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('pa_siswa');
  }
  public function count_filter($search){
    $this->db->select("*, count(qs.pos_id) as jml_soal");
    $this->db->from('pa_quiz_soal qs');
    $this->db->join('pa_pos p','qs.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','t.id_tempat=p.tempat_id');
    $this->db->group_by('qs.pos_id');
    $this->db->like('qs.created_at', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('qs.id_quizsoal', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('p.nm_pos', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('t.nm_tempat', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function get_soal_detail($kode, $pos){
    $this->db->select("*");
    $this->db->from('pa_quiz_soal qs');
    $this->db->join('pa_quiz_pilihan pl','qs.id_quizsoal=pl.quizsoal_id','left');
    $this->db->where('qs.kode', $kode);
    $this->db->where('qs.pos_id', $pos);
    $this->db->order_by('qs.soal', 'asc');
    return $this->db->get()->result_array();
  }
}
?>
