<?php
defined('BASEPATH') or exit('No direct script access allowed');
    class Report extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url', 'download'));
        }
        public function harian(){
            $this->load->view('v_reportHarian');
        }
        public function download($gambar){
            if(!empty($gambar)){
                //load download helper
                $this->load->helper('download');
                
                //file path
                $file = 'uploads/'.$gambar;
                
                //download file from directory
                force_download($file, NULL);
            }
        }
        public function harianUser(){
            $id_user = $this->session->userdata('id_user');
            $data_proyek = $this->db->select('*')
                ->from('user_proyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->join('user', 'user.id_user = user_proyek.id_karyawan')
                ->where('user_proyek.id_karyawan', $id_user)
                ->get()->result();
            
                // var_dump($data_proyek);die;
            $this->load->view('v_reportHarianuser', ['data_proyek' => $data_proyek]);
        }
        public function addHarianuser($id){
            $data_task = $this->db->select('*')
                ->from('task_proyek')
                ->where('id_userproyek', $id)
                ->get()->result();
            $this->load->view('v_addHarian', ['data_task' => $data_task]);
        }
        public function Itempekerjaan($id){
            $data_itempekerjaan = $this->db->where('id_task', $id)->get('item_pekerjaan')->result();
            // echo '<pre>'; var_dump($data_itempekerjaan); die;
            $this->load->view('v_itemPekerjaan', [
                'data_itempekerjaan' => $data_itempekerjaan,
                'id_task' => $id
            ]);
        }
        public function addItempekerjaan(){
            // UPLOAD
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 10000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('berkas')){
                $data['error'] = $this->upload->display_errors();
                echo 'Upload Error';
                echo '<pre>'; var_dump($data['error']); die;
            }
            else{
                $id_task = $this->input->post('id_task');
                $mulai = date('Y-m-d '.$this->input->post('mulai').':00');
                $selesai = date('Y-m-d '.$this->input->post('selesai').':00');
                $file = $this->upload->data();
                $gambar = $file['file_name'];
                $deskripsi = $this->input->post('deskripsi');
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'id_task' => $id_task,
                    'tanggal_mulai' => $mulai,
                    'tanggal_selesai' => $selesai,
                    'gambar' => $gambar,
                    'deskripsi' => $deskripsi,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('item_pekerjaan', $data);
                redirect(base_url('report/Itempekerjaan/'.$id_task));
            }
        }
        public function all(){
            $query = "SELECT YEAR(created_at) as tahun, MONTH(created_at) as bulan, COUNT(*) as jumlah FROM item_pekerjaan GROUP BY YEAR(created_at), MONTH(created_at) ";
            // $query = "SELECT * FROM task_proyek";
            $data = $this->db->query($query)->result();
            $karyawan = $this->db->get('user')->result();
            // echo '<pre>'; var_dump($data); die;
            $this->load->view('v_reportAll', [
                'data' => $data,
                'karyawan' => $karyawan
             ]);
        }
        public function detail($id_user){
            $query = "SELECT YEAR(created_at) as tahun, MONTH(created_at) as bulan, COUNT(*) as jumlah FROM item_pekerjaan WHERE id_user = '".$id_user."' GROUP BY YEAR(created_at), MONTH(created_at) ";
            // $query = "SELECT * FROM task_proyek";
            $data = $this->db->query($query)->result();
            $pekerjaan = $this->db->join('task_proyek', 'task_proyek.id_task = item_pekerjaan.id_task')
                ->join('user_proyek', 'user_proyek.id = task_proyek.id_userproyek')
                ->join('proyek', 'proyek.id_proyek = user_proyek.id_proyek')
                ->join('instansi', 'instansi.id_instansi = proyek.id_instansi')
                ->where('id_user', $id_user)
                ->get('item_pekerjaan')->result();
            $user = $this->db->where('id_user', $id_user)->get('user')->row();
            // echo '<pre>'; var_dump($pekerjaan); die;
            $this->load->view('v_detailReport', [
                'id_user' => $id_user,
                'data' => $data,
                'pekerjaan' => $pekerjaan,
                'user' => $user
             ]);
        }
        public function monthly(){
            // $bulan = $this->input->post('bulan');
            // $id_user = $this->session->userdata('id_user');
            // $query = "SELECT * FROM item_pekerjaan WHERE month(created_at)=12 and id_user=".$id_user;
            // $data = $this->db->query($query)->result();
            // echo '<pre>' , var_dump($data) , '</pre>';
            $this->load->view('v_monthlyuser');
        }
        public function detail_monthly(){
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $id_user = $this->session->userdata('id_user');
            $jml_data = "SELECT count(id) as jumlah FROM item_pekerjaan WHERE month(created_at)=".$bulan." and year(created_at)=".$tahun ." and id_user=".$id_user;
            $query1 = $this->db->query($jml_data)->row();
            $query2 = "SELECT * FROM item_pekerjaan INNER JOIN task_proyek ON item_pekerjaan.id_task = task_proyek.id_task WHERE month(created_at)=".$bulan." and year(created_at)=".$tahun ." and id_user=".$id_user;
            $data = $this->db->query($query2)->result();
            // echo '<pre>' , var_dump($query1) , '</pre>';
            $this->load->view('v_detailmonth.php', [
                'jml_data' => $query1,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'data' => $data
            ]);
        }
        public function detail_monthly_admin(){
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $id_user = $this->input->get('id_user');
            $user = $this->db->where('id_user', $id_user)->get('user')->row();
            $jml_data = "SELECT count(id) as jumlah FROM item_pekerjaan WHERE month(created_at)=".$bulan." and year(created_at)=".$tahun ." and id_user=".$id_user;
            $query1 = $this->db->query($jml_data)->row();
            $query2 = "SELECT * FROM item_pekerjaan INNER JOIN task_proyek ON item_pekerjaan.id_task = task_proyek.id_task WHERE month(created_at)=".$bulan." and year(created_at)=".$tahun ." and id_user=".$id_user;
            $data = $this->db->query($query2)->result();
            // echo '<pre>' , var_dump($query1) , '</pre>';
            $this->load->view('v_detailmonthadmin.php', [
                'jml_data' => $query1,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'data' => $data,
                'user' => $user
            ]);
        }


    }
