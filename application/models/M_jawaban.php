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
  public function get_soal_detail($idsiswa, $kode){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban qj');
    $this->db->join('pa_quiz_soal qs','qj.quizsoal_id=qs.id_quizsoal');
    $this->db->join('pa_quiz_pilihan pl','qs.id_quizsoal=pl.quizsoal_id');
    $this->db->where('qj.siswa_id', $idsiswa);
    $this->db->where('qj.kode_jawaban', $kode);
    $this->db->order_by('qs.soal', 'desc');
    return $this->db->get()->result_array();
  }
  public function get_info_jawaban($idsiswa,$kode){
    $this->db->select("*");
    $this->db->from('pa_quiz_jawaban jwb');
    $this->db->join('pa_skoring sk','sk.quizjawaban_id=jwb.id_quizjawaban');
    $this->db->join('pa_siswa sw','jwb.siswa_id=sw.id_siswa');
    $this->db->join('pa_pos p','jwb.pos_id=p.id_pos');
    $this->db->join('pa_tempat t','p.tempat_id=t.id_tempat');
    $this->db->where('jwb.siswa_id',$idsiswa);
    $this->db->where('jwb.kode_jawaban',$kode);
    return $this->db->get()->result();
  }
}
?>
