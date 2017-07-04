<?php
	$host="localhost";
	$user="root";
	$pass="12345";
	$dbname="bluefish";
	$mysqlbinpath="";
	$mysqlbinpath="/opt/lampp/bin/";
	
	$host2="192.168.1.111";
	$user2="bluefish123";
	$pass2="bluefish123";
	$dbname2="bluefish";
	function sanitasi($str){
		$strclear = addslashes(stripslashes(strip_tags($str)));
		return $strclear;
	}
?>
