<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Instansi extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_instansi');
            if($this->session->userdata('level') != 1){
                redirect('signon/logout');
                
            };
        }
        public function index(){
            $data['instansi'] = $this->m_instansi->tampil_data()->result();
            $this->load->view('v_instansi', $data);
        }
        public function hapus($id){
            $where = array('id_instansi' => $id);
            $this->m_instansi->hapus_data($where, 'instansi');
            redirect('instansi');
        }
        public function add(){
            $this->load->view('v_addInstansi');
        }
        public function addInstansi(){
            $instansi = strtoupper($this->input->post('instansi'));
            $alamat = ucwords($this->input->post('alamat'));
            $data = array(
                'instansi' => $instansi,
                'alamat' => $alamat
            );
            if(empty($instansi)){
                // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('instansi/add'));
            }
            else{
                $this->m_instansi->input_data($data,'instansi');
                $this->session->set_flashdata('berhasil', 'Registrasi Berhasil');
                redirect(base_url('instansi/addInstansi'));
            }   
        }
    }