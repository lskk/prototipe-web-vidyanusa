<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class Registration extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        session_start();
    }

    function index() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/reg_guru');
        $this->load->view('include/footer');
    }

    function registrasi_siswa() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/reg_siswa');
        $this->load->view('include/footer');
    }

    function notif_siswa() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('registration/notif_siswa');
        $this->load->view('include/footer');
    }

    function process_guru() {
        $username = $this->input->post("username");
        $nama = $this->input->post("nama");
        $password = $this->input->post("password1");
        $email = $this->input->post("email");
        $kode_sekolah = $this->input->post("kode_sekolah");
        $kode_guru = $this->kode_guru();
        $jenis_kelamin = $this->input->post("jenis_kelamin");
        $this->db->trans_start();
        $guru = array(
            'KODE_GURU' => $kode_guru,
            'NAMA_GURU' => $nama,
            'EMAIL_GURU' => $email,
            'KODE_SEKOLAH' => $kode_sekolah,
            'JENIS_KELAMIN' => $jenis_kelamin
        );
		
        $this->db->insert('guru', $guru);
        $pengguna = array(
            'USERNAME' => $username,
            'KODE_GURU' => $kode_guru,
            'PASSWORD' => $password,
            'TANGGAL_GABUNG' => date('Y-m-d'),
            'USER_ROLE' => 'G',
            'STATUS' => '1'
        );
        $this->db->insert('pengguna', $pengguna);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo "failed";
        } else {
            echo "success";
        }
    }

    function process_siswa() {
        $username = $this->input->post("username");
        $nama_siswa = $this->input->post("nama_siswa");
        $password = $this->input->post("password1");
        $email = $this->input->post("email_siswa");
        $kode_masuk = $this->input->post("kode_masuk");
        $jenis_kelamin = $this->input->post("jenis_kelamin");
        $kode_siswa = $this->kode_siswa();
        $this->db->trans_start();
        $data = $this->db->get_where("kelas", array('KODE_MASUK' => $kode_masuk))->row_array();
        $kode_kelas = $data['KODE_KELAS'];
        $siswa = array(
            'KODE_SISWA' => $kode_siswa,
            'NAMA_SISWA' => $nama_siswa,
            'EMAIL_SISWA' => $email,
            'KODE_KELAS' => $kode_kelas,
             'JENIS_KELAMIN' => $jenis_kelamin
        );
        $this->db->insert('siswa', $siswa);
        $pengguna = array(
            'USERNAME' => $username,
            'KODE_SISWA' => $kode_siswa,
            'PASSWORD' => $password,
            'TANGGAL_GABUNG' => date('Y-m-d'),
            'USER_ROLE' => 'S',
            'STATUS' => '0'
        );
        $this->db->insert('pengguna', $pengguna);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo "failed";
        } else {
            echo "success";
        }
    }

    function kode_guru() {
        $row = $this->db->query("SELECT RIGHT(MAX(KODE_GURU),4) AS angka FROM guru")->row();
        $nomor = intval($row->angka) + 1;
        return NumberGen::generateKode("G", $nomor);
    }

    function kode_siswa() {
        $row = $this->db->query("SELECT RIGHT(MAX(KODE_SISWA),4) AS angka FROM siswa")->row();
        $nomor = intval($row->angka) + 1;
        return NumberGen::generateKode("S", $nomor);
    }

    function cek_username() {
        $username = $this->input->post("username");
        $cnt = $this->db->get_where("pengguna", array('USERNAME' => $username))->num_rows();
        if ($cnt > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    function cek_email() {
        $email = $this->input->post("email");
        $cnt = $this->db->get_where("guru", array('EMAIL_GURU' => $email))->num_rows();
        if ($cnt > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

     function cek_email_siswa() {
        $email = $this->input->post("email");
        $cnt = $this->db->get_where("siswa", array('EMAIL_SISWA' => $email))->num_rows();
        if ($cnt > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
    
    function cek_kode_masuk() {
        $kode_masuk = $this->input->post("kode_masuk");
        $cnt = $this->db->get_where("kelas", array('KODE_MASUK' => $kode_masuk))->num_rows();
        if ($cnt > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

}
