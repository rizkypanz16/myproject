<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Proyek extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_proyek');
            $this->load->model('m_instansi');
            $this->load->model('m_signon');
            if($this->session->userdata('level') != 1){
                redirect('signon/logout');
                
            };
        }
        public function index(){
            $data['proyek'] = $this->m_proyek->get_data();
            $this->load->view('v_proyek', $data);
        }
        public function hapus($id){
            $where = array('id_proyek' => $id);
            $this->m_proyek->hapus_data($where, 'proyek');
            redirect('proyek');
        }
        public function add(){
            $data = $this->m_instansi->tampil_data()->result();
            // echo '<pre> ';var_dump($data);die;
            $this->load->view('v_addProyek', [
                'instansi' => $data
            ]);
        }
        public function addProyek(){
            $proyek = ucwords($this->input->post('proyek'));
            $instansi = $this->input->post('instansi');
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $data = array(
                'proyek' => $proyek,
                'id_instansi' => $instansi,
                'mulai_proyek' => $tanggal_mulai,
                'selesai_proyek' => $tanggal_selesai
            );
            if(empty($proyek)){
                // $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('proyek/add'));
            }
            else{
                $this->m_proyek->input_data($data,'proyek');
                $this->session->set_flashdata('berhasil', 'Registrasi Berhasil');
                redirect(base_url('proyek/addProyek'));
            }   
        }
        public function addUserproyek($id_proyek){
            $data_proyek = $this->db->from('proyek')->where('id_proyek', $id_proyek)->get()->row();
            $data_user_proyek = $this->db->select('user_proyek.id, proyek.proyek, instansi.instansi, user.nama')
                ->from('user_proyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->join('user', 'user.id_user = user_proyek.id_karyawan')
                ->where('proyek.id_proyek', $id_proyek)
                ->get()->result();
            // var_dump($data_user_proyek); die;
            $this->load->view('v_addUserproyek', [
                'detail' => $data_proyek,
                'instansi' => $this->m_instansi->tampil_data()->result(),
                'user' => $this->m_signon->get_data()->result(),
                'proyek' => $this->m_proyek->get_proyek()->result(),
                'user_proyek' => $data_user_proyek
            ]);
        }
        public function tambah_task($id_userproyek){
            $data_userproyek = $this->db->from('user_proyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->where('id', $id_userproyek)->get()->row();
            // $data_task = $this->db->from('progress_proyek')->where('id_userproyek', $id_userproyek)->get()->row();
            $data_task = $this->db->select('*')
                ->from('task_proyek')
                ->join('user_proyek', 'user_proyek.id = task_proyek.id_userproyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->where('user_proyek.id', $id_userproyek)
                ->get()->result();
            // var_dump($data_userproyek);die;
            $this->load->view('v_addTask', [
                'user_proyek' => $data_userproyek,
                'data_task' => $data_task
            ]);
        }
        public function addUser(){
            $id_proyek = $this->input->post('id_proyek');
            $user = $this->input->post('user');
            $nama_karyawan = $this->db->from('user')->where('id_user', $user)->get()->row();
            $data = array(
                'id_proyek' => $id_proyek,
                'id_karyawan' => $user,
                'nama_karyawan' => $nama_karyawan->nama
            );
            $this->db->insert('user_proyek', $data);
            redirect(base_url('proyek/addUserproyek/'.$id_proyek));
        }
        public function addTaskproyek(){
            $id_userproyek = $this->input->post('id_userproyek');
            $task = $this->input->post('task');
            $tanggal_input = date('Y-m-d H:i:s');
            $data = array(
                'id_userproyek' => $id_userproyek,
                'tanggal_input' => $tanggal_input,
                'task' => $task
            );
            $this->db->insert('task_proyek', $data);
            redirect(base_url('proyek/tambah_task/'.$id_userproyek));
        }
        public function hapus_task($id){
            $where = array('id_task' => $id);
            $this->m_proyek->hapus_data($where, 'task_proyek');
            redirect('proyek');
        }
        public function hapus_user_proyek($id){
            $where = array('id' => $id);
            $this->m_proyek->hapus_data($where, 'user_proyek');
            redirect('proyek');
        }
        
    }