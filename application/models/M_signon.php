<?php

class M_signon extends CI_Model{
    function get_data(){
        return $this->db->get('user');
    }
    function validate($email,$password){
        $this->db->where('username',$email);
        $this->db->where('password',$password);
        $result = $this->db->get('user',1);
        return $result;
    }
    function get_profile($id){
        $this->db->where('id_user', $id);
        $result = $this->db->get('user');
        return $result;
    }
}