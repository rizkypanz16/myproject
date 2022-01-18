<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('signon');
    }
    $this->load->model('M_admin', 'admin');
  }

  function admin(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
          $data = ['user' => $this->admin->hitungUser(),
                  'instansi' => $this->admin->hitungInstansi(),
                  'proyek' => $this->admin->hitungProyek(),
                  'report' => $this->admin->hitungReport(),
                  'task' => $this->admin->hitungTask()     
          ];
          $this->load->view('v_admin', $data);
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    $id_user = $this->session->userdata('id_user');
    $query = "SELECT YEAR(created_at) as tahun, MONTH(created_at) as bulan, COUNT(*) as jumlah FROM item_pekerjaan WHERE id_user = '".$id_user."' GROUP BY YEAR(created_at), MONTH(created_at) ";
    $data = $this->db->query($query)->result();
    $pekerjaan = $this->db->join('task_proyek', 'task_proyek.id_task = item_pekerjaan.id_task')
                ->join('user_proyek', 'user_proyek.id = task_proyek.id_userproyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->where('id_user', $id_user)
                ->get('item_pekerjaan')->result();
    
    // echo '<pre>'; var_dump($pekerjaan); die;
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      $this->load->view('v_staff', [
        'data' => $data,
        'pekerjaan' => $pekerjaan
      ]);
    }else{
        echo "Access Denied";
    }
  }
}