<?php

class M_model extends CI_Model{
    function get_data($table){
        return $this->db->get($table);
    }
    public function getData()
    {
        // Query database untuk mengambil data
        $this->db->select('siswa.*,kelas.tingkat_kelas, kelas.jurusan_kelas');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    function delete($table, $field, $id)
    {
        $data=$this->db->delete($table,array($field => $id));
        return $data;
    }
    function tambah_data($tabel, $data)
    {
       $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($tabel,$id_column,$id){
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function ubah_data($tabel,$data,$where){
        $data=$this->db->update($tabel,$data,$where);
        return $this->db->affected_rows();
    }
}
?>