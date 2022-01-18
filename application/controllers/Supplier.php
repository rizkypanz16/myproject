<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller{
    public function __Construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('signon');
        }
        $this->load->model('M_admin', 'supplier');
    }
    public function index(){
        $data['supplier'] = $this->supplier->tampil_data()->result();
        $this->load->view('v_supplier', $data);
    }
    public function add(){
        $this->load->view('v_addSupplier');
    }
    public function addSupplier(){
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama_supplier' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        );
        if(empty($nama)){
            // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
            redirect(base_url('supplier/add'));
        }elseif(empty($no_telp)){
            // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
            redirect(base_url('supplier/add'));
        }elseif(empty($alamat)){
            // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
            redirect(base_url('supplier/add'));
        }else{
            $this->supplier->addSupplier($data,'supplier');
            // $this->session->set_flashdata('berhasil', 'Data Supplier Berhasil DiInput');
            redirect(base_url('supplier/add'));
        }   
    }
}