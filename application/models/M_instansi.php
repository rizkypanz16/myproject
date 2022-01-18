<?php
    class M_instansi extends CI_Model{
        public function tampil_data(){
            return $this->db->get('instansi');
        }
        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function input_data($data, $table){
            $this->db->insert($table,$data);
        }
    }