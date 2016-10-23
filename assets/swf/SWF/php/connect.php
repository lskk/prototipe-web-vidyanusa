<?php
	/*Variable untuk melakukan koneksi ke MySQL*/
	$db_name = "database_vidyanusa";
	$db_username = "root";
	$db_password = "";
	$db_host = "localhost";
	/*Melakukan koneksi ke MySQL*/
	mysql_connect($db_host,$db_username,$db_password,$db_name);
	/*Pilih DB atau keluarkan error*/
	mysql_select_db($db_name) or die (mysql_error());
	/*Tampilkan pesan sukses ke layar*/
	/*echo "success";*/
?>