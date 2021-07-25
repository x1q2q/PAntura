<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_skoring extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_quiz_soal qs','jwb.quizsoal_id=qs.id_quizsoal');
    $this->db->join('pa_quiz_pilihan qp','jwb.quizpilihan_id=qp.id_quizpilihan');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where(array('qs.jenis' => 'esai'));
    $this->db->group_start();
    $this->db->like('jwb.kode_jawaban', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('qs.soal', $search); // Untuk menambahkan query where OR LIKE
    $this->db->group_end();
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    $this->db->get_where('pa_quiz_jawaban',array('jenis_jawaban' =>'esai'));
    return $this->db->count_all_results();
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_quiz_soal qs','jwb.quizsoal_id=qs.id_quizsoal');
    $this->db->join('pa_quiz_pilihan qp','jwb.quizpilihan_id=qp.id_quizpilihan');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where(array('qs.jenis' => 'esai'));
    $this->db->group_start();
    $this->db->like('jwb.kode_jawaban', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('qs.soal', $search); // Untuk menambahkan query where OR LIKE
    $this->db->group_end();
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
}
?>
