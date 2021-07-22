<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jawaban extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->group_by(array("jwb.siswa_id","jwb.kode_jawaban"));
    $this->db->like('jwb.kode_jawaban', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('jwb.submited_at', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    $this->db->from('pa_quiz_jawaban');
    $this->db->group_by('siswa_id');
    return $this->db->count_all_results();
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->group_by(array("jwb.siswa_id","jwb.kode_jawaban"));
    $this->db->like('jwb.kode_jawaban', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('jwb.submited_at', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function get_soal_detail($kode, $pos){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_quiz_soal qs','jwb.quizsoal_id=qs.id_quizsoal');
    $this->db->join('pa_quiz_pilihan plh','jwb.quizpilihan_id=plh.id_quizpilihan');
    $this->db->join('pa_pos p','qs.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->group_by('qs.pos_id'); // agar bisa satu kolom memuat banyak pos
    $this->db->like('qs.created_at', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('p.nm_pos', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('t.nm_tempat', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('qs.kode', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
}
?>
