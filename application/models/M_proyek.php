<?php
    class M_proyek extends CI_Model{
        public function tampil_data(){
            return $this->db->get('proyek');
        }
        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function input_data($data, $table){
            $this->db->insert($table,$data);
        }
        public function get_data(){
            $data = $this->db->select('proyek.*, instansi.instansi')
                ->from('proyek')
                ->join('instansi', 'proyek.id_instansi = instansi.id_instansi')
                ->get()->result();
                
            return $data;
        }
        public function get_proyek(){
            return $this->db->get('user_proyek');
        }
        
    }