<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of registration
 *
 * @author ailagema
 */
class foto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['USER'])) {
            redirect(base_url(''));
        }
    }

    function index() {
        $username = $_SESSION['USER']['USERNAME'];
        $this->db->where("USERNAME", $username);
        $data['rs'] = $this->db->get("foto");
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view('list_foto', $data);
    }

    function take_picture() {
        $this->load->view('include/header');
        $this->load->view('include/menu');
        $this->load->view("take_picture");
    }

    function upload() {
        if (isset($_FILES['myFile'])) {
            //size
            if (move_uploaded_file($_FILES['myFile']['tmp_name'], "./uploads/" . $_FILES['myFile']['name'])) {
                echo $_FILES['myFile']['name'];
                $username = $_SESSION['USER']['USERNAME'];
                $komen = $_POST['komen'];
                $nama_file = $_FILES['myFile']['name'];
                $data = array(
                    'USERNAME' => $username,
                    'NAMA_FILE' => $nama_file,
                    'KETERANGAN' => $komen
                );
                $this->db->insert("foto", $data);
            } else {
                echo "error";
            }
        }
    }

    /**
     * Image resize
     * @param int $width
     * @param int $height
     */
    function resize($width, $height) {
        /* Get original image x y */
        list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
        /* calculate new image size with ratio */
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* new file name */
        $path = 'uploads/' . $width . 'x' . $height . '_' . $_FILES['image']['name'];
        /* read binary data from image file */
        $imgString = file_get_contents($_FILES['image']['tmp_name']);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        /* Save image */
        switch ($_FILES['image']['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $path;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }

}
