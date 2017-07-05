<?php 
	include_once "head.php";
	$mode = $_GET["mode"];
	$username = $_GET["username"];
	$id = $_GET["id"];
	$return = "";
	$no = 0;

	if($mode == "notifications_list"){
		$return .= "<table class='list'>";
		$sql = "SELECT a.id,a.title,b.status FROM app_notifications a INNER JOIN app_notifications_status b ON a.id = b.notification_id WHERE b.username='$username' ORDER BY a.id DESC LIMIT 100";
		$hsl=mysqli_query($db,$sql);
		while(list($id,$title,$status)=mysqli_fetch_array($hsl)){
			$no++;
			$href = "href='?mode=notifications_details&username=$username&id=$id'";
			$return .= "<tr class='list_row_".$status."'>
				<td align='right'><a $href>$no</a></td>
				<td><a $href>$title</a></td>
			</tr>";
		}
		$return .= "</table>";
	}
	
	if($mode == "notifications_details"){
		$sql = "SELECT title,message FROM app_notifications WHERE id='$id'";
		$hsl=mysqli_query($db,$sql);
		while(list($title,$message)=mysqli_fetch_array($hsl)){
			$return .= "<b>$title</b><hr>$message";
			mysqli_query($db,"UPDATE app_notifications_status SET status='2',updated_at=NOW(),updated_ip='".$_SERVER["REMOTE_ADDR"]."' WHERE notification_id='$id' AND username='$username'");
		}
		$return .= "<br><br><input type='button' value='BACK' onclick=\"window.location='?mode=notifications_list&username=$username'\">";
	}
	
	if($mode == "notifications_unread"){
		$sql = "SELECT count(0) FROM app_notifications a INNER JOIN app_notifications_status b ON a.id = b.notification_id WHERE b.username='$username' AND b.status < 2";
		$hsl=mysqli_query($db,$sql);
		list($return)=mysqli_fetch_array($hsl);
	}
	
	if($mode == "bookings_list"){
		$return .= "<table class='list'>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Arrival</th>
							<th>Departure</th>
							<th>Room</th>
						</tr>";
		$sql = "SELECT kode,title,nama,arrival,departure,(SELECT nama FROM mst_room WHERE kode=room) FROM trx_booking WHERE departure > DATE(NOW()) ORDER BY arrival";
		$hsl=mysqli_query($db,$sql);
		while(list($kode,$title,$nama,$arrival,$departure,$room)=mysqli_fetch_array($hsl)){
			$no++;
			$return .= "<tr>
				<td align='right'>$no</td>
				<td>$kode</td>
				<td>$title $nama</td>
				<td>".format_tanggal($arrival)."</td>
				<td>".format_tanggal($departure)."</td>
				<td>$room</td>
			</tr>";
		}
		$return .= "</table>";
	}
	
	echo $return;
?>