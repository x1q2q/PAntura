<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_papanskor extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*, DENSE_RANK() OVER(ORDER BY total_skor DESC) peringkat");
    $this->db->from('pa_papanskor');
    $this->db->like('username', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('total_skor', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('pa_papanskor');
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_papanskor');
    $this->db->like('username', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('total_skor', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
}
?>
