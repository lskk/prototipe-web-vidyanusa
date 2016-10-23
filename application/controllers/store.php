<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of store
 *
 * @author ailagema
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store extends CI_Controller {

    //put your code here
    function sekolah_store() {
        $key = $this->db->escape_like_str(empty($_REQUEST['term']) ? "" : $_REQUEST['term']);
        $limit = empty($_REQUEST['page_limit']) ? 10 : intval($_REQUEST['page_limit']);
        $page = empty($_REQUEST['page']) ? 0 : $_REQUEST['page'];
        //total
        $count = $this->db
                ->like('s.NAMA_SEKOLAH', $key, 'after')
                ->or_like("s.KODE_SEKOLAH", $key, 'after')
                ->count_all_results('sekolah s');

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit;
        $start = $start > 0 ? $start : 0;

        $result = $this->db
                ->select("s.*", false)
                ->like('s.NAMA_SEKOLAH', $key, 'after')
                ->or_like("s.KODE_SEKOLAH", $key, 'after')
                ->get('sekolah s', $limit, $start);

        $row_array = array();
        $json = array();
        $json['text'] = "sekolah ...";
        foreach ($result->result_array() as $row) {
            $json['id'] = $row['KODE_SEKOLAH'];
            $json['text'] = utf8_encode($row['NAMA_SEKOLAH']);
            $json['obj'] = array(
                'nama_sekolah' => utf8_encode($row['NAMA_SEKOLAH']),
                'kode_sekolah' => utf8_encode($row['KODE_SEKOLAH']),
                'alamat_sekolah' => utf8_encode($row['ALAMAT_SEKOLAH'])
            );
            array_push($row_array, $json);
        }

        $ret['results'] = $row_array;
        $ret['total'] = $count;
        echo json_encode($ret);
    }
    
    function tingkatkelas_store() {
        $key = $this->db->escape_like_str(empty($_REQUEST['term']) ? "" : $_REQUEST['term']);
        $limit = empty($_REQUEST['page_limit']) ? 10 : intval($_REQUEST['page_limit']);
        $page = empty($_REQUEST['page']) ? 0 : $_REQUEST['page'];
        //total
        $count = $this->db
                ->like('t.KODE_TINGKATKELAS', $key, 'after')
                ->or_like("t.KETERANGAN_TINGKATKELAS", $key, 'after')
                ->count_all_results('tingkat_kelas t');

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit;
        $start = $start > 0 ? $start : 0;

        $result = $this->db
                ->select("t.*", false)
                ->like('t.KODE_TINGKATKELAS', $key, 'after')
                ->or_like("t.KETERANGAN_TINGKATKELAS", $key, 'after')
                ->get('tingkat_kelas t', $limit, $start);

        $row_array = array();
        $json = array();
        $json['text'] = "tingkat kelas ...";
        foreach ($result->result_array() as $row) {
            $json['id'] = $row['KODE_TINGKATKELAS'];
            $json['text'] = utf8_encode($row['KETERANGAN_TINGKATKELAS']);
            $json['obj'] = array(
                'kode_tingkatkelas' => utf8_encode($row['KODE_TINGKATKELAS']),
                'keterangan_tingkatkelas' => utf8_encode($row['KETERANGAN_TINGKATKELAS'])
            );
            array_push($row_array, $json);
        }

        $ret['results'] = $row_array;
        $ret['total'] = $count;
        echo json_encode($ret);
    }

}
