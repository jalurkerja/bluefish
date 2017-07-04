<?php
	$host="localhost";
	$user="root";
	$pass="12345";
	$dbname="bluefish";
	$mysqlbinpath="";
	function sanitasi($str){
		//$strclear = addslashes(stripslashes(strip_tags($str)));
		$strclear = addslashes(stripslashes($str));
		return $strclear;
	}
?>
