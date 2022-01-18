<?php

class Signon extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_signon');
	}
	function index(){
		// $data['login'] = $this->m_dashboard->get_data()->result();
		$this->load->view('v_signon');

		// jika sudah masuk pada dashboard tidak bisa lagi akses form login
		if($this->session->userdata('username')){
			redirect('dashboard/admin');
		}
	}
	function auth(){
		$username    = $this->input->post('username',TRUE);
		$password = md5($this->input->post('password',TRUE));
		$q = $this->m_signon->get_data();
		$validate = $this->m_signon->validate($username,$password);
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$id_user = $data['id_user'];
			$username  = $data['username'];
			$email = $data['password'];
			$level = $data['role'];
			$sesdata = array(
				'id_user' => $id_user,
				'username'  => $username,
				'level'     => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if($level === '1'){
				redirect('dashboard/admin');
	 
			// access login for staff
			}elseif($level === '2'){
				redirect('dashboard/staff');
			}
		}
		else{
			echo $this->session->set_flashdata('msg','Username or Password is Wrong');
			redirect('signon');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('signon');
	}
}