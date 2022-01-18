<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller{
    public function __Construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('signon');
        }
        $this->load->model('M_satuan', 'satuan');
    }
    public function index(){
        $data['satuan'] = $this->satuan->tampil_data()->result();
        $this->load->view('v_satuan', $data);
    }
    public function add(){
        $this->load->view('v_addSatuan');
    }
    public function addSatuan(){
        $satuan = $this->input->post('satuan');
        $data = array(
            'satuan' => $satuan
        );
        if(empty($satuan)){
            // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
            redirect(base_url('satuan/add'));
        }else{
            $this->satuan->addSatuan($data,'satuan');
            // $this->session->set_flashdata('berhasil', 'Data Supplier Berhasil DiInput');
            redirect(base_url('satuan/add'));
        }   
    }
}