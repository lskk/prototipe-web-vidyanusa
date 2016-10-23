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
	$id_riwayat=$maks;

	//Sanitize the POST values
	date_default_timezone_set('Asia/Jakarta');
	$kode_riwayat = clean($id_riwayat);
	$username = clean($_POST['username']);
	$kode_permainan = clean($_POST['kode_permainan']);
	$tanggal_riwayat = date('Y-m-d H:i:s');
	$minutes2 = clean($_POST['minutes2']);
	$seconds2 = clean($_POST['seconds2']);
	$miliseconds2 = clean($_POST['miliseconds2']);
	$riwayat_exp = clean($_POST['riwayat_exp']);
	$riwayat_gold = clean($_POST['riwayat_gold']);
	$riwayat_klik = clean($_POST['riwayat_klik']);
	$accuracy = clean($_POST['accuracy']);
	$riwayat_status = clean($_POST['riwayat_status']);
	$status_riwayat = clean($_POST['status_riwayat']);

	//Create UPDATE query
	$qry = 	"UPDATE `riwayat_permainan` SET `TANGGAL_RIWAYAT` = '$tanggal_riwayat', `RIWAYAT_WAKTUMAIN` = '$minutes2:$seconds2:$miliseconds2', `RIWAYAT_EXP` = '$riwayat_exp',  `RIWAYAT_GOLD` = '$riwayat_gold', `RIWAYAT_KLIK` = '$riwayat_klik', `RIWAYAT_ACCURACY` = '$accuracy', `RIWAYAT_STATUS` = '$riwayat_status', `STATUS_RIWAYAT` = '$status_riwayat' WHERE CONCAT(`riwayat_permainan`.`KODE_RIWAYAT`) = '$kode_riwayat'";
	
$result = @mysql_query($qry);
echo "writing=Ok";
exit();
mysql_close();
	
?>
	