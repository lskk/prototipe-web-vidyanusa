<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    var $username;
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('main-new');
    }

    public function guru() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/note_guru');
        $this->load->view('include/footer');
    }

    public function siswa() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/note_siswa');
        $this->load->view('include/footer');
    }

    public function login_page() {
        $flag = $this->uri->segment(3);
        $data = array();
        if ($flag == '1') {
            $data['msg'] = "Username atau password salah,silahkan login kembali";
        }
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/login', $data);
        $this->load->view('include/footer');
    }

    public function login() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $cnt = $this->db->get_where('pengguna', array('USERNAME' => $username, 'PASSWORD' => $password, 'STATUS' => '1'))->num_rows();
        $pengguna = $this->db->get_where('pengguna', array('USERNAME' => $username))->row_array();
        $kode = "";
        if ($cnt > 0) {
            date_default_timezone_set('ASIA/JAKARTA');
            $this->db->update("pengguna", 
                    array(
                        'MASUK_TERAKHIR' => date('y-m-d H:i:s'),
                        'IS_ONLINE' => '1'
                    ), 
                    array(
                        'USERNAME' => $username
                    )
            );
            session_start();
            $this->username = $username;
            if ($pengguna['USER_ROLE'] == 'G') {
                $kode = $pengguna['KODE_GURU'];
                $guru = $this->db->get_where('guru', array('KODE_GURU' => $kode))->row_array();
                array_push($pengguna, $guru);
                $_SESSION['USER'] = $pengguna;
                redirect('dashboard/');
            } else if ($pengguna['USER_ROLE'] == 'S') {
                $kode = $pengguna['KODE_SISWA'];
                $siswa = $this->db->get_where('siswa', array('KODE_SISWA' => $kode))->row_array();
                array_push($pengguna, $siswa);
                $_SESSION['USER'] = $pengguna;
                redirect('dashboardsiswa/');
            } else {
                //blank
                redirect('main/login_page/1');
            }
        } else {
            redirect('main/login_page/1');
        }
    }

    function logout() {
        session_start();
        $username = $_SESSION['USER']['USERNAME'];
        $this->db->update("pengguna", 
                    array(
                        'IS_ONLINE' => '0'
                    ), 
                    array(
                        'USERNAME' => $username
                    )
            );
        session_destroy();
        redirect(base_url());
    }
    
    function cek_active(){
        //cek session aktif/tidak pada interval tertentu
        session_start();
        if(!isset($_SESSION['USER'])){
            $this->db->update("pengguna", 
                    array(
                        'IS_ONLINE' => '0'
                    ), 
                    array(
                        'USERNAME' => $this->username
                    )
            );
            echo "0";
        }else{
            echo "1";
        }
    }
    
    function count_online(){
        $data = $this->db->query("SELECT COUNT(USERNAME) as cnt FROM pengguna WHERE IS_ONLINE = '1'")->row_array();
        echo $data['cnt'];
    }
    
    function whose_online(){
        $rs = $this->db->query("SELECT * FROM pengguna WHERE IS_ONLINE = '1'");
        $teks = "";
        foreach($rs->result_array() as $row){
            $teks .= $row['USERNAME'];
        }
        echo $teks;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */