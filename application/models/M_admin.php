<?php 
class M_admin extends CI_Model{
    public function count($table){
        return $this->db->count_all($table);
    }
    public function sum($table, $field){
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function addSupplier($data, $table){
        $this->db->insert($table,$data);
    }
    public function tampil_data(){
        return $this->db->get('supplier');
    }
    public function hitungUser(){
        $query = $this->db->get('user');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function hitungReport(){
        $query = $this->db->get('item_pekerjaan');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function hitungTask(){
        $query = $this->db->get('task_proyek');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function hitungInstansi(){
        $query = $this->db->get('instansi');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    public function hitungProyek(){
        $query = $this->db->get('proyek');
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
}