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

	//Sanitize the POST values
	$kode_riwayat =  clean($_POST['kode_riwayat']);
    $posisi_x = clean($_POST['posisi_x']);
	$posisi_y = clean($_POST['posisi_y']);

	//Create INSERT query
	$qry = "CREATE EVENT eventclick_17
            ON SCHEDULE EVERY 30 SECOND
            STARTS CURRENT_TIMESTAMP
            ENDS CURRENT_TIMESTAMP + INTERVAL 5 MINUTE
            DO
            INSERT INTO aktifitas_permainan(KODE_RIWAYAT,POSISI_X,POSISI_Y)
            VALUES('$kode_riwayat','$posisi_x','$posisi_y');";
	$result = @mysql_query($qry);
echo "writing=Ok";
exit();
mysql_close();
	
?>
	