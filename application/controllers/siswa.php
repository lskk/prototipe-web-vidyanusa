<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class siswa extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        session_start();
        //print_r($_SESSION);
    }

    public function index() {
        if (!isset($_SESSION['USER'])) {
            redirect(base_url(''));
        } else {
            if ($_SESSION['USER']['KODE_GURU'] == "") {
                redirect(base_url(''));
            }
        }
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        //kode kelas guru
        $query = "SELECT * FROM siswa "
                . " INNER JOIN kelas ON kelas.KODE_KELAS = siswa.KODE_KELAS "
                . " INNER JOIN pengguna ON pengguna.KODE_SISWA = siswa.KODE_SISWA "
                . " INNER JOIN tingkat_kelas ON tingkat_kelas.KODE_TINGKATKELAS = kelas.KODE_TINGKATKELAS"
                . " WHERE kelas.KODE_GURU = '$kode_guru'";
        $rs = $this->db->query($query);
        $data['rs'] = $rs;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('siswa/list', $data);
        $this->load->view('include/footer');
    }
    
    public function update_status(){
        $username = $this->uri->segment("3");
        $sekarang = $this->uri->segment("4");
        $nilai = $sekarang == '1' ? '0' : '1';
        $this->db->where("USERNAME", $username);
        $this->db->update("pengguna", array('STATUS' => $nilai));
        redirect(base_url("index.php/siswa/"));
    }

}
