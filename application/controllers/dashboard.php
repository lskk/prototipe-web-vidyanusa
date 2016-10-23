<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class Dashboard extends CI_Controller {

    //put your code here
    var $rs_siswa;
  
    
    public function __construct() {
        parent::__construct();
        session_start();
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        //kode kelas guru
        $query = "SELECT * FROM siswa "
                . " INNER JOIN kelas ON kelas.KODE_KELAS = siswa.KODE_KELAS "
                . " INNER JOIN pengguna ON pengguna.KODE_SISWA = siswa.KODE_SISWA "
                . " INNER JOIN tingkat_kelas ON tingkat_kelas.KODE_TINGKATKELAS = kelas.KODE_TINGKATKELAS"
                . " WHERE kelas.KODE_GURU = '$kode_guru'";
        $this->rs_siswa = $this->db->query($query);
        
    }

    function index() {
        if (!isset($_SESSION['USER'])) {
            redirect(base_url(''));
        } else {
            if ($_SESSION['USER']['KODE_GURU'] == "") {
                redirect(base_url(''));
            }
        }
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/dashboard');
        $this->load->view('include/footer');
    }

    function grafik_akurasi() {
        $username = $this->uri->segment(3);
        $nama = $this->uri->segment(4);
          $data['rs'] = $this->db->query("SELECT NAMA_PERMAINAN,MAX(`RIWAYAT_ACCURACY`) AS AKURASI FROM permainan p 
INNER JOIN riwayat_permainan r ON r.kode_permainan = p.kode_permainan 
WHERE r.`RIWAYAT_ACCURACY` != 0 AND r.USERNAME = '$username'
GROUP BY r.`KODE_PERMAINAN` 
ORDER BY p.`KODE_PERMAINAN` ASC");  
        $data['rs_siswa'] = $this->rs_siswa;
        $data['grafik'] = "grafik_akurasi";
        $data['nama_siswa'] = $nama;
        $data['username'] = $username;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/grafik_akurasi', $data);
        $this->load->view('include/footer');
    }

    function grafik_waktu() {
         $username = $this->uri->segment(3);
        $nama = $this->uri->segment(4);
        $data['rs'] = $this->db->query("SELECT 
p.`NAMA_PERMAINAN`,
TIME_TO_SEC(MIN(RIWAYAT_WAKTUMAIN)) AS RIWAYAT_WAKTUMAIN,
TIME_TO_SEC(`WAKTU_STANDAR`) AS  WAKTU_STANDAR
FROM permainan p 
INNER JOIN riwayat_permainan r ON r.kode_permainan = p.kode_permainan
WHERE r.RIWAYAT_WAKTUMAIN != '00:00:00' 
AND STATUS_RIWAYAT = 1 AND r.USERNAME = '$username'
GROUP BY r.`KODE_PERMAINAN` 
ORDER BY p.`KODE_PERMAINAN` ASC");
        $data['rs_siswa'] = $this->rs_siswa;
        $data['grafik'] = "grafik_waktu";
        $data['nama_siswa'] = $nama;
        $data['username'] = $username;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/grafik_waktu', $data);
        $this->load->view('include/footer');
    }

    function grafik_riwayat() {
         $username = $this->uri->segment(3);
        $nama = $this->uri->segment(4);
        //table tmp
        $this->db->query("DROP TEMPORARY TABLE IF EXISTS tmp_riwayat");
        $this->db->query("DROP TEMPORARY TABLE IF EXISTS tmp_hitung");
        $this->db->query("DROP TEMPORARY TABLE IF EXISTS tmp_final");
        $this->db->query("CREATE TEMPORARY TABLE tmp_riwayat AS SELECT 
p.`KODE_PERMAINAN`,
`NAMA_PERMAINAN`,
STATUS_RIWAYAT,
COUNT(`STATUS_RIWAYAT`) AS CNT_STATUS_RIWAYAT
FROM `permainan` p 
INNER JOIN `riwayat_permainan` r ON r.`KODE_PERMAINAN` = p.`KODE_PERMAINAN` 
WHERE `STATUS_RIWAYAT` != 0 AND r.USERNAME = '$username'
GROUP BY p.`KODE_PERMAINAN`,`STATUS_RIWAYAT` ORDER BY p.`KODE_PERMAINAN` ASC");
        $this->db->query("CREATE TEMPORARY TABLE tmp_hitung AS SELECT NAMA_PERMAINAN,KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT FROM tmp_riwayat");
        $rs = $this->db->query("SELECT KODE_PERMAINAN,NAMA_PERMAINAN FROM tmp_riwayat GROUP BY KODE_PERMAINAN");
        $row_menang = "";
        $row_kalah = "";
        $row_menyerah = "";
        $rs_cnt = $this->db->query("SELECT KODE_PERMAINAN,COUNT(*) as cnt FROM tmp_hitung GROUP BY KODE_PERMAINAN");
        $row_data_permainan = array();
        $rs_hasill = $this->db->query("SELECT * FROM tmp_hitung");
        //echo count($rs_hasill->result_array());
        foreach ($rs_cnt->result_array() as $rows) {
            $cnt = $rows['cnt'];
            if ($cnt < 3) {
                $kode_permainan = $rows['KODE_PERMAINAN'];
                $r = $this->db->query("SELECT KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT FROM tmp_hitung WHERE KODE_PERMAINAN='$kode_permainan'");

                foreach ($r->result_array() as $row1) {
                    $row_data_permainan["'{$row1['KODE_PERMAINAN']}'"][] = $row1['STATUS_RIWAYAT'];
                }
            }
        }
        //print_r($row_data_permainan);
        foreach ($row_data_permainan as $key => $value) {
            $kode = $key;
            //print_r($value);
            //echo "<hr>";
            if (!in_array(array('1'), $value)) {
                $this->db->query("INSERT INTO tmp_hitung (KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT) VALUES ($kode,'1','0')");
            }
            if (!in_array(array('2'), $value)) {
                $this->db->query("INSERT INTO tmp_hitung (KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT) VALUES ($kode,'2','0')");
            }
            if (!in_array(array('3'), $value)) {
                $this->db->query("INSERT INTO tmp_hitung (KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT) VALUES ($kode,'3','0')");
            }
        }

        $r_1 = $this->db->query("CREATE TEMPORARY TABLE tmp_final AS SELECT * FROM tmp_hitung GROUP BY KODE_PERMAINAN,STATUS_RIWAYAT");
        $rs_hasil = $this->db->query("SELECT DISTINCT KODE_PERMAINAN FROM tmp_hitung");
        //echo "jml".count($rs_hasil->result_array())."<br>";
        foreach ($rs_hasil->result_array() as $row) {
            $kode_permainan = $row['KODE_PERMAINAN'];
            $rs_status = $this->db->query("SELECT KODE_PERMAINAN,STATUS_RIWAYAT,CNT_STATUS_RIWAYAT FROM tmp_final WHERE KODE_PERMAINAN='$kode_permainan'");
            foreach ($rs_status->result_array() as $r_status) {
                //echo $row_menang."<br>";
                if ($r_status['STATUS_RIWAYAT'] == "1") {
                    $row_menang .= $r_status['CNT_STATUS_RIWAYAT'] . ",";
                } else if ($r_status['STATUS_RIWAYAT'] == "2") {
                    $row_kalah .= $r_status['CNT_STATUS_RIWAYAT'] . ",";
                } else {
                    $row_menyerah .= $r_status['CNT_STATUS_RIWAYAT'] . ",";
                }
            }
        }

        //data
         $data['rs_siswa'] = $this->rs_siswa;
        $data['grafik'] = "grafik_riwayat";
        $data['nama_siswa'] = $nama;
        $data['username'] = $username;
        $data['rs'] = $rs;
        $data['row_menang'] = $row_menang;
        $data['row_kalah'] = $row_kalah;
        $data['row_menyerah'] = $row_menyerah;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/grafik_riwayat', $data);
        $this->load->view('include/footer');
    }

    function grafik_skor(){
        $kode_permainan = $this->uri->segment(3);
        $kode_kelas = $this->uri->segment(4);
        $nama_permainan = $this->uri->segment(5);
        $nama_kelas = $this->uri->segment(6);
        
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        $query = "SELECT KODE_SISWA,NAMA_SISWA,MAX(SKOR) AS SKOR FROM (
SELECT `siswa`.KODE_SISWA,NAMA_SISWA,`RIWAYAT_ACCURACY` AS SKOR FROM `riwayat_permainan` 
INNER JOIN pengguna ON pengguna.`USERNAME` = `riwayat_permainan`.`USERNAME` 
INNER JOIN siswa ON siswa.`KODE_SISWA` = pengguna.`KODE_SISWA` 
WHERE riwayat_permainan.`KODE_PERMAINAN` = '$kode_permainan' AND siswa.`KODE_KELAS` = '$kode_kelas'
GROUP BY riwayat_permainan.USERNAME,SKOR
) AS TMP GROUP BY KODE_SISWA
";
        //game
        $rs_game = $this->db->get("permainan");
        $rs_kelas = $this->db->get_where("kelas",array("KODE_GURU" => $kode_guru));
        $rs = $this->db->query($query);
        $data['rs'] = $rs;
        $data['rs_game'] = $rs_game;
        $data['rs_kelas'] = $rs_kelas;
        $data['grafik'] = "grafik_skor";
        $data['kode_game'] = $kode_permainan;
        $data['kode_kelas'] = $kode_kelas;
        $data['nama_game'] = $nama_permainan;
        $data['nama_kelas'] = $nama_kelas;
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('dashboard/grafik_skor', $data);
        $this->load->view('include/footer');
    }
    
    function table_percobaan(){
        $kode_permainan = $this->uri->segment(3);
        $kode_kelas = $this->uri->segment(4);
                $nama_permainan = $this->uri->segment(5);
        $nama_kelas = $this->uri->segment(6);
        
        $this->db->query("DROP TEMPORARY TABLE IF EXISTS TMP_RAW");
        $query = "CREATE TEMPORARY TABLE TMP_RAW AS SELECT USERNAME,KODE_SISWA,NAMA_SISWA,NAMA_PERMAINAN,KODE_PERMAINAN,
`STATUS_RIWAYAT`, 
0 AS JML_PERCOBAAN,0 AS MENANG,0 AS KALAH,0 AS NYERAH FROM (
SELECT r.`USERNAME`,S.`KODE_SISWA`, S.`NAMA_SISWA`, p.`KODE_PERMAINAN`, `NAMA_PERMAINAN`,
 STATUS_RIWAYAT FROM `permainan` p 
 INNER JOIN `riwayat_permainan` r ON r.`KODE_PERMAINAN` = p.`KODE_PERMAINAN` 
 INNER JOIN pengguna pe ON pe.`USERNAME` = r.`USERNAME` 
 INNER JOIN siswa s ON s.`KODE_SISWA` = pe.`KODE_SISWA` 
 WHERE `STATUS_RIWAYAT` != 0 AND r.KODE_PERMAINAN = '$kode_permainan' 
 AND s.KODE_KELAS = '$kode_kelas' 
ORDER BY p.`KODE_PERMAINAN` ASC )  AS tmp ;
";
         $rs = $this->db->query($query);
        $rs0 = $this->db->query("SELECT DISTINCT KODE_SISWA FROM TMP_RAW");
        foreach($rs0->result_array() as $row){
            $kode_siswa = $row['KODE_SISWA'];
            $r_menang = $this->db->query("SELECT COUNT(STATUS_RIWAYAT) as menang "
                    . " FROM TMP_RAW WHERE KODE_SISWA = '$kode_siswa' AND KODE_PERMAINAN='$kode_permainan' AND STATUS_RIWAYAT='1'")->row_array();
            $menang = $r_menang['menang'];
            $r_kalah = $this->db->query("SELECT COUNT(STATUS_RIWAYAT) as kalah "
                    . " FROM TMP_RAW WHERE KODE_SISWA = '$kode_siswa' AND KODE_PERMAINAN='$kode_permainan' AND STATUS_RIWAYAT='2'")->row_array();
            $kalah = $r_kalah['kalah'];
            $r_nyerah = $this->db->query("SELECT COUNT(STATUS_RIWAYAT) as nyerah "
                    . " FROM TMP_RAW WHERE KODE_SISWA = '$kode_siswa' AND KODE_PERMAINAN='$kode_permainan' AND STATUS_RIWAYAT='3'")->row_array();
            $nyerah = $r_nyerah['nyerah'];
            
            $r_total = $this->db->query("SELECT COUNT(STATUS_RIWAYAT) as total "
                    . " FROM TMP_RAW WHERE KODE_SISWA = '$kode_siswa' AND KODE_PERMAINAN='$kode_permainan'")->row_array();
            $total = $r_total['total'];
            
            $query = "UPDATE TMP_RAW SET JML_PERCOBAAN='$total',MENANG='$menang',KALAH='$kalah',NYERAH='$nyerah' WHERE KODE_SISWA = '$kode_siswa' AND KODE_PERMAINAN='$kode_permainan'";
            $this->db->query($query);
            
        }
        
        $kode_guru = $_SESSION['USER']['KODE_GURU'];
        $rs= "";
        $query = "SELECT * FROM TMP_RAW GROUP BY KODE_SISWA";
        $rs = $this->db->query($query);
        $rs_game = $this->db->get("permainan");
        $rs_kelas = $this->db->get_where("kelas",array("KODE_GURU" => $kode_guru));
        $data['rs'] = $rs;
        $data['rs_game'] = $rs_game;
        $data['rs_kelas'] = $rs_kelas;
        $data['kode_game'] = $kode_permainan;
        $data['kode_kelas'] = $kode_kelas;
        $data['nama_game'] = $nama_permainan;
        $data['nama_kelas'] = $nama_kelas;
         $data['grafik'] = "table_percobaan";
        $this->load->view('include/header');
        $this->load->view('include/menu');
        
        $this->load->view('dashboard/table_percobaan', $data);
        $this->load->view('include/footer');
    }
    
    function get_waktu_riwayat(){
        $kode_permainan = $this->uri->segment(3);
        $username = $this->uri->segment(4);
        $query = "SELECT RIWAYAT_ACCURACY,`RIWAYAT_WAKTUMAIN`,`STATUS_RIWAYAT` FROM riwayat_permainan WHERE USERNAME='$username' AND KODE_PERMAINAN='$kode_permainan' AND `STATUS_RIWAYAT` != 0";
        $rs = $this->db->query($query);
        $output = "";
        $i = 1;
        foreach($rs->result_array() as $row){
            $status = "";
            if($row['STATUS_RIWAYAT'] == "1"){
                $status = "menang";
            }else if($row['STATUS_RIWAYAT'] == "2"){
                $status = "kalah";
            }else{
                $status = "menyerah";
            }
            $output .= "<b>".$i.". </b>{$row['RIWAYAT_ACCURACY']} waktu : ".$row['RIWAYAT_WAKTUMAIN'] . " (" . $status .")<br>";
            $i++;
        }
        echo $output;
        
    }
}
