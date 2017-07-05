<?php 
	include_once "../connect_config.php";
	if(!$db=mysqli_connect($host,$user,$pass,$dbname)){echo "DB Not Connect!";}
	$username = $_GET["username"];
	$sql = "SELECT count(0) FROM app_notifications a INNER JOIN app_notifications_status b ON a.id = b.notification_id WHERE b.username='$username' AND b.status < 2";
	$hsl=mysqli_query($db,$sql);
	list($return)=mysqli_fetch_array($hsl);
	echo $return;
?>