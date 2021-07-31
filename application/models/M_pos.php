<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pos extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*");
    $this->db->from('pa_pos p');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->like('p.nm_pos', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('p.lokasi_pos', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('t.nm_tempat', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('pa_pos');
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_pos p');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->like('p.nm_pos', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('p.lokasi_pos', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('t.nm_tempat', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function get_join_array($posid_digunakan){
    $this->db->select("*");
    $this->db->from('pa_pos p');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where_not_in('p.id_pos', $posid_digunakan);
    $this->db->order_by('p.nm_pos','asc');
    return $this->db->get()->result_array();
  }
  public function get_in($data){
    $this->db->select("*");
    $this->db->from('pa_pos p');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where_in('p.id_pos',$data);
    $this->db->order_by('p.nm_pos','asc');
    return $this->db->get()->result_array();
  }
  public function get_join_detail($kode){
    $this->db->select("*");
    $this->db->from('pa_quiz_soal qs');
    $this->db->join('pa_pos p','p.id_pos=qs.pos_id');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where('qs.kode',$kode);
    $this->db->group_by('qs.pos_id');
    $this->db->order_by('p.nm_pos','asc');
    return $this->db->get()->result_array();
  }
}
?>
