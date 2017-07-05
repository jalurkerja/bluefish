<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<meta property="og:image" content="../images/logo.jpg">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=8;" />
		<meta name="description" content="BlueFish Hotel - Enjoy your vacation on the blue water beach" />
		<meta name="keywords" content="libur, banten, tanjung lesung, ujung kulon, hot vacation, Hotel, Resort, Vacation, BLUEFISH Hotel - Enjoy Your Vacation On The Blue Water Beach, " />
		<meta name="author" content="bts" />
		<meta name="title" content="bluefish"/>
		<meta name="language" content="id"/>
		<meta name="country" content="indonesia"/>
		<meta name="source" content="http://www.bluefish.co.id/"/>
		<meta name="subject" content="hotel"/>
		<meta name="robots" content="index, follow"/>
		<link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
		<title id="titleid">BlueFish.co.id</title>
	</head>
	<body>
		<style>
		</style>
<?php
	include_once "../connect_config.php";
	if(!$db=mysqli_connect($host,$user,$pass,$dbname)){echo "DB Not Connect!";}
	function format_tanggal($tanggal){
		$temp=substr($tanggal,8,2)."-".substr($tanggal,5,2)."-".substr($tanggal,0,4);
		return $temp;
	}
?>