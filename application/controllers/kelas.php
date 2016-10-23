<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class kelas extends CI_Controller {

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
        $rs = $this->db->query("SELECT * FROM kelas INNER JOIN tingkat_kelas ON kelas.kode_tingkatkelas = tingkat_kelas.kode_tingkatkelas WHERE KODE_GURU='$kode_guru'");
        $data['rs'] = $rs;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('kelas/list', $data);
        $this->load->view('include/footer');
    }

    public function form() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('kelas/form');
        $this->load->view('include/footer');
    }

    public function form_update() {
        $kode_kelas = $this->uri->segment("3");
        $this->db->join("tingkat_kelas", "tingkat_kelas.kode_tingkatkelas = kelas.kode_tingkatkelas");
        $this->db->where(array("KODE_KELAS" => $kode_kelas));
        $data['kelas'] = $this->db->get('kelas')->row_array();
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('kelas/form_update', $data);
        $this->load->view('include/footer');
    }

    public function save() {
        $nama_kelas = $this->input->post("nama_kelas");
        $kode_tingkatkelas = $this->input->post("kode_tingkatkelas");
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        $kode_kelas = $this->kode_kelas();
        $this->db->trans_start();
        $kelas = array(
            'KODE_KELAS' => $kode_kelas,
            'KODE_GURU' => $kode_guru,
            'KODE_TINGKATKELAS' => $kode_tingkatkelas,
            'NAMA_KELAS' => $nama_kelas,
            'KODE_MASUK' => $this->kode_masuk()
        );
        $this->db->insert('kelas', $kelas);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo "failed";
        } else {
            echo "success";
        }
    }

    public function update() {
        $nama_kelas = $this->input->post("nama_kelas");
        $kode_tingkatkelas = $this->input->post("kode_tingkatkelas_hidden");
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        $kode_kelas = $this->input->post("kode_kelas");
        $this->db->trans_start();
        $kelas = array(
            'KODE_TINGKATKELAS' => $kode_tingkatkelas,
            'NAMA_KELAS' => $nama_kelas,
            'KODE_MASUK' => $this->kode_masuk()
        );
        $this->db->where(array('KODE_KELAS' => $kode_kelas));
        $this->db->update('kelas', $kelas);
        //echo $this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo "failed";
        } else {
            echo "success";
        }
    }

    public function delete() {
        $kode_kelas = $this->uri->segment("3");
        $this->db->where(array("KODE_KELAS" => $kode_kelas));
        $this->db->delete('kelas');
        redirect('kelas/');
    }

    function kode_kelas() {
        /*$row = $this->db->query("SELECT RIGHT(MAX(KODE_KELAS),4) AS angka FROM kelas")->row();
        $nomor = intval($row->angka) + 1;
        return NumberGen::generateKode("K", $nomor);
		*/
	   $row = $this->db->query("SELECT RIGHT(MAX(IFNULL(KODE_KELAS,1)),4) AS angka FROM kelas")->row();
       $nomor = intval($row->angka) + 1;
       return NumberGen::generateKode("K", $nomor);
    }
    
    function kode_masuk(){
        return random_string('alnum',5);
    }

}
