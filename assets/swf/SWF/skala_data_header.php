<?php
	//Include database connection details
	require_once('config.php');

        //Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$result=mysql_query("SELECT max(kode_riwayat) as kd_riwayat from riwayat_permainan");
	$max=mysql_fetch_assoc($result);
	$maks=$max['kd_riwayat'];
	$id_riwayat=$maks+1;

	//Sanitize the POST values
	date_default_timezone_set('Asia/Jakarta');
	$kode_riwayat = clean($id_riwayat);
	$username = clean($_POST['username']);
	$kode_permainan = clean($_POST['kode_permainan']);
	$tanggal_riwayat = clean($_POST['']);
	$waktu_main = clean($_POST['']);
	$riwayat_exp = clean($_POST['']);
	$riwayat_gold = clean($_POST['']);
	$riwayat_klik = clean($_POST['']);
	$accuracy = clean($_POST['']);
	$riwayat_status = clean($_POST['']);
	$status_riwayat = clean($_POST['']);

	//Create INSERT query
	$qry = "INSERT INTO riwayat_permainan(KODE_RIWAYAT,USERNAME,KODE_PERMAINAN,TANGGAL_RIWAYAT,RIWAYAT_WAKTUMAIN,RIWAYAT_EXP,RIWAYAT_GOLD,RIWAYAT_KLIK,RIWAYAT_ACCURACY,RIWAYAT_STATUS,STATUS_RIWAYAT) VALUES('$kode_riwayat','$username','$kode_permainan','$tanggal_riwayat','$waktu_main','$riwayat_exp','$riwayat_gold','$riwayat_klik','$accuracy','$riwayat_status','$status_riwayat')";
$result = @mysql_query($qry);
echo "writing=Ok";
exit();
mysql_close();
	
?>
	