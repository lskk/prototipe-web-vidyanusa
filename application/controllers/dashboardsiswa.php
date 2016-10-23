<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class DashboardSiswa extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        session_start();
    }

    function index() {
         $username = $_SESSION['USER']['USERNAME'];
         $query = "SELECT * FROM siswa "
                . " INNER JOIN kelas ON kelas.KODE_KELAS = siswa.KODE_KELAS "
                . " INNER JOIN pengguna ON pengguna.KODE_SISWA = siswa.KODE_SISWA "
                . " INNER JOIN guru ON guru.KODE_GURU = kelas.KODE_GURU "
                . " INNER JOIN tingkat_kelas ON tingkat_kelas.KODE_TINGKATKELAS = kelas.KODE_TINGKATKELAS"
                . " WHERE pengguna.USERNAME = '$username'";
        $rs = $this->db->query($query);
        $data['rs'] = $rs;
        //echo $this->db->last_query();
        if (!isset($_SESSION['USER'])) {
            redirect(base_url(''));
        } else {
            if ($_SESSION['USER']['KODE_SISWA'] == "") {
                redirect(base_url(''));
            }
        }
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/dashboard_siswa',$data);
        $this->load->view('include/footer');
    }
    

}
