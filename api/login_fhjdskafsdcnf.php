<?php 
	include_once "../connect_config.php";
	if(!$db=mysqli_connect($host,$user,$pass,$dbname)){echo "DB Not Connect!";}
	$username = $_GET["username"];
	$password = $_GET["password"];
	$sql = "SELECT password FROM user_account WHERE username = '$username'";
	$hsl=mysqli_query($db,$sql);
	list($_password)=mysqli_fetch_array($hsl);
	if($_password == $password){echo $username;} else {echo "0";}
?>