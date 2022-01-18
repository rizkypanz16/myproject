<?php 
class M_jenis extends CI_Model{
    public function addJenis($data, $table){
        $this->db->insert($table,$data);
    }
    public function tampil_data(){
        return $this->db->get('jenis');
    }
}