<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataskor extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->select("*, count(DISTINCT jwb.kode_jawaban) as pos_selesai, sum(skr.skor) as tot_skor");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_skoring skr','skr.quizjawaban_id=jwb.id_quizjawaban');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->group_by('sw.id_siswa');
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('skr.skor', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get()->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    $this->db->from('pa_quiz_jawaban');
    $this->db->group_by('siswa_id');
    return $this->db->count_all_results();
  }
  public function count_filter($search){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_skoring skr','skr.quizjawaban_id=jwb.id_quizjawaban');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_sekolah sk','sw.sekolah_id=sk.id_sekolah');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->group_by('sw.id_siswa');
    $this->db->or_like('sw.username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('skr.skor', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sk.nm_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('sw.regu', $search);
    return $this->db->get()->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
  public function get_detail_skor($idsiswa){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_skoring skr','skr.quizjawaban_id=jwb.id_quizjawaban');
    $this->db->join('pa_quiz_soal qs','qs.id_quizsoal=jwb.quizsoal_id');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->where(array('jwb.siswa_id' => $idsiswa));
    $this->db->order_by("p.id_pos", 'asc');
    return $this->db->get()->result();
  }
}
?>
