<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generator
 *
 * @author ailagema
 */
class NumberGen {

    public function __construct() { 
    }
    
    public static function generateKode($flag, $no) {
        $nomor = "";
        switch ($flag) {
            case 'G':
                $nomor = "P" . NumberGen::nomor($no);
                break;
            case 'K':
                $nomor = "K" . NumberGen::nomor($no);
                break;
            case 'S':
                $nomor = "W" . NumberGen::nomor($no);
                break;

            default:
                break;
        }
        return $nomor;
    }

    private static function nomor($no) {
        $result = "";
        $ln = strlen($no);
        switch ($ln) {
            case 1:
                $result = "000" . $no;
                break;
            case 2:
                $result = "00" . $no;
                break;
            case 3:
                $result = "0" . $no;
                break;
            case 4:
                $result = $no;
                break;

            default:
                break;
        }
        return $result;
    }

}
