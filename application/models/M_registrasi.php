<?php
class M_registrasi extends CI_Model{
    public function input_data($data, $table){
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table){
        return $this->db->get_where($table, $where);
    }
    public function show_data($id){
        return $this->db->where('id_user', $id)->get('user')->row();
    }
    public function tampil_data(){
        return $this->db->get('user');
    }
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function change_data($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hitungUser(){
        $query = $this->db->get('user');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
}