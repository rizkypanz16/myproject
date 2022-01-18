<?php 
class M_satuan extends CI_Model{
    public function addSatuan($data, $table){
        $this->db->insert($table,$data);
    }
    public function tampil_data(){
        return $this->db->get('satuan');
    }
}