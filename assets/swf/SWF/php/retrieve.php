<?php
	include_once "connect.php";
	/*
	$username = $_POST['username'];
	$password = $_POST['password'];
	*/
	/*Prepare class*/
	class DataPengguna {
       public $KODE_RIWAYAT = "";
	   public $USERNAME = "";
	   public $KODE_PERMAINAN = "";
	   public $TANGGAL_RIWAYAT = "";
	   public $RIWAYAT_WAKTUMAIN = "";
	   public $RIWAYAT_EXP = "";
	   public $RIWAYAT_GOLD = "";
	   public $RIWAYAT_KLIK = "";
	   public $RIWAYAT_ACCURACY = "";
	   public $RIWAYAT_STATUS = "";
	   public $STATUS_RIWAYAT = "";
	   public $KODE_AKTIFITAS = "";
	   public $POSISI_X = "";
	   public $POSISI_Y = "";
	 
   }
	/*Prepare query*/
	$sql = "SELECT DISTINCT 
				   p.KODE_RIWAYAT
				  ,p.USERNAME
				  ,p.KODE_PERMAINAN
				  ,p.TANGGAL_RIWAYAT
				  ,p.RIWAYAT_WAKTUMAIN
				  ,p.RIWAYAT_EXP
				  ,p.RIWAYAT_GOLD
				  ,p.RIWAYAT_KLIK
				  ,p.RIWAYAT_ACCURACY
				  ,p.RIWAYAT_STATUS
				  ,p.STATUS_RIWAYAT
				  ,ps.KODE_AKTIFITAS
				  ,ps.POSISI_X
				  ,ps.POSISI_Y
			FROM riwayat_permainan p
				,aktifitas_permainan ps
			WHERE p.KODE_RIWAYAT = ps.KODE_RIWAYAT";
	/*Eksekusi query*/
	$query = mysql_query($sql);

	/*Fetch data*/
	$counter = mysql_num_rows($query);

	if($counter > 0){

		/*Array DataPengguna*/
		$dpArray = array();

		while($data = mysql_fetch_array($query)){
			$dp = new DataPengguna();
			$dp->KODE_RIWAYAT = $data['KODE_RIWAYAT'];
			$dp->USERNAME = $data['USERNAME'];
			$dp->KODE_PERMAINAN = $data['KODE_PERMAINAN'];
			$dp->TANGGAL_RIWAYAT = $data['TANGGAL_RIWAYAT'];
			$dp->RIWAYAT_WAKTUMAIN = $data['RIWAYAT_WAKTUMAIN'];
			$dp->RIWAYAT_EXP = $data['RIWAYAT_EXP'];
			$dp->RIWAYAT_GOLD = $data['RIWAYAT_GOLD'];
			$dp->RIWAYAT_KLIK = $data['RIWAYAT_KLIK'];
			$dp->RIWAYAT_ACCURACY = $data['RIWAYAT_ACCURACY'];
			$dp->RIWAYAT_STATUS = $data['RIWAYAT_STATUS'];
			$dp->STATUS_RIWAYAT = $data['STATUS_RIWAYAT'];
			$dp->KODE_AKTIFITAS = $data['KODE_AKTIFITAS'];
			$dp->POSISI_X = $data['POSISI_X'];
			$dp->POSISI_Y = $data['POSISI_Y'];

			array_push($dpArray, $dp);

		}

		echo '{"players":'.json_encode($dpArray).'}';
	}
	
	/*print "nama=$nama";*/
	/*Close connection*/
	mysql_close();
?>