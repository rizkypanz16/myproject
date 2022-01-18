<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller{
    public function __Construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('signon');
        }
        $this->load->model('M_jenis', 'jenis');
    }
    public function index(){
        $data['jenis'] = $this->jenis->tampil_data()->result();
        $this->load->view('v_jenis', $data);
    }
    public function add(){
        $this->load->view('v_addJenis');
    }
    public function addJenis(){
        $satuan = $this->input->post('jenis');
        $data = array(
            'jenis' => $jenis
        );
        if(empty($jenis)){
            // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
            redirect(base_url('jenis/add'));
        }else{
            $this->jenis->addJenis($data,'jenis');
            // $this->session->set_flashdata('berhasil', 'Data Supplier Berhasil DiInput');
            redirect(base_url('jenis/add'));
        }   
    }
}