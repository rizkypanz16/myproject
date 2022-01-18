<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_registrasi');
            $this->load->model('m_signon');
        }
        public function register(){
            if($this->session->userdata('level') != 1){
                redirect('signon/logout');
            };
            $this->load->view('v_register');
        }
        public function add(){
            $nama = ucwords($this->input->post('nama'));
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $role = $this->input->post('role');
            $password = md5($this->input->post('password'));
            $kelamin = $this->input->post('kelamin');
            $divisi = $this->input->post('divisi');
            $pendidikan = $this->input->post('pendidikan');
            $alamat = ucwords($this->input->post('alamat'));
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'no_telp' => $no_telp,
                'role' => $role,
                'password' => $password,
                'kelamin' => $kelamin,
                'divisi' => $divisi,
                'pendidikan' => $pendidikan,
                'alamat' => $alamat
            );
            if(empty($nama)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($username)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($password)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($role)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($kelamin)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($divisi)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }elseif(empty($pendidikan)){
                $this->session->set_flashdata('kosong', 'Form Wajib Di Isi !');
                redirect(base_url('user/register'));
            }
            else{
                $this->m_registrasi->input_data($data,'user');
                $this->session->set_flashdata('berhasil', 'Registrasi Berhasil');
                redirect(base_url('user/register'));
            }   
        }
        public function edit(){
            // echo('test');die;
            // echo('<pre>'); var_dump($this->session->userdata('id_user'));die;
            $getId = $this->session->userdata('id_user');
            $data = $this->m_registrasi->show_data($getId);
            // echo('<pre>'); var_dump($data->id_user);die;
            $this->load->view('v_editUser', [
                'data' => $data
            ]);
        }
        public function data(){
            if($this->session->userdata('level') != 1){
                redirect('signon/logout');
            };
            $data['user'] = $this->m_registrasi->tampil_data()->result();
            $this->load->view('v_dataUser', $data);
        }
        public function hapus($id){
            $where = array('id_user' => $id);
            $this->m_registrasi->hapus_data($where, 'user');
            redirect('user/data');
        }
        public function change($id){
            $where = array('id_user' => $id);
            $data['user'] = $this->m_registrasi->change_data($where, 'user')->result();
            $this->load->view('v_changeUser', $data);
        }
        public function update($id){
            $nama = $this->input->post('nama');
            $no_telp = $this->input->post('no_telp');
            $alamat = ucwords($this->input->post('alamat'));
            $data = array(
                'nama' => $nama,
                'no_telp' => $no_telp,
                'alamat' => $alamat
            );
            $where = array(
                'id_user' => $id
            );
            $this->m_registrasi->update_data($where,$data,'user');
            redirect('user/data');
        }
        public function editUser($id){
            $nama = $this->input->post('nama');
            $no_telp = $this->input->post('no_telp');
            $alamat = ucwords($this->input->post('alamat'));
            $data = array(
                'nama' => $nama,
                'no_telp' => $no_telp,
                'alamat' => $alamat
            );
            $where = array(
                'id_user' => $id
            );
            $this->m_registrasi->update_data($where,$data,'user');
            redirect('user/data');
        }
        public function profile(){
            $id = $this->session->userdata('id_user');
            $data = $this->m_registrasi->show_data($id);
            $data = $this->db->select('*')
                ->from('user')
                ->join('divisi', 'divisi.id_divisi = user.divisi')
                ->where('id_user', $id)
                ->get()->result();
            // var_dump($data);die;
            $this->load->view('v_profile', ['data' => $data]);
        }
    }