<?php 
	include_once "../connect_config.php";
	if(!$db=mysqli_connect($host,$user,$pass,$dbname)){echo "DB Not Connect!";}
	$username = $_GET["username"];
	$sql = "SELECT id,title FROM app_notifications WHERE id NOT IN (SELECT notification_id FROM app_notifications_status WHERE username='$username') ORDER BY id LIMIT 5";
	$hsl=mysqli_query($db,$sql);
	while(list($id,$title)=mysqli_fetch_array($hsl)){
		$return .= $title."
";
		mysqli_query($db,"INSERT INTO app_notifications_status (username,notification_id,status,updated_at,updated_ip) VALUES ('$username','$id','1',NOW(),'".$_SERVER["REMOTE_ADDR"]."')");
	}
?>