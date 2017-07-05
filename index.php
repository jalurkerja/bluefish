<?php include_once "connect.php"; ?>
<html>
	<head>
		<title>BlueFish Hotel - Enjoy your vacation on the blue water beach</title>
		<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
		<meta name="generator" content="warih_logic">
		<meta name="description" content="BlueFish Hotel - Enjoy your vacation on the blue water beach" />
		<meta name="keywords" content="libur, banten, tanjung lesung, ujung kulon, hot vacation, Hotel, Resort, Vacation, BLUEFISH Hotel - Enjoy Your Vacation On The Blue Water Beach, " />
		<meta name="author" content="bts" />
		<script src="jquery-1.10.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
<?php
	include_once "func.sendmail.php";
	include_once "func.openwin.php";
	include_once "func_createinput.php";
	if($_POST["booking"]){
		$errormessage="";
		$arrival=$_POST["arrival"];
		$arrival=substr($arrival,6,4)."-".substr($arrival,3,2)."-".substr($arrival,0,2);
		$departure=$_POST["departure"];
		$departure=substr($departure,6,4)."-".substr($departure,3,2)."-".substr($departure,0,2);
		if(strtolower($_POST["captcha"])!=strtolower($_SESSION["captcha"])){$errormessage="Captcha Invalid!!";}
		$sql="SELECT DATEDIFF('$departure','$arrival')";
		$hsltemp=mysqli_query($db,$sql);
		list($numdate)=mysqli_fetch_array($hsltemp);
		if($numdate>31 || $numdate<1){$errormessage="Invalid arrival or departure date!";}
		if($errormessage==""){
			$title=$_POST["title"];
			$nama=$_POST["nama"];
			$idtype=$_POST["idtype"];
			$idno=$_POST["idno"];
			$alamat1=$_POST["alamat1"];
			$alamat2=$_POST["alamat2"];
			$alamat=$alamat1.chr(13).$alamat2;
			$phone=$_POST["phone"];
			$email=$_POST["email"];
			$company=$_POST["company"];
			$notes=$_POST["notes"];
			$person=$_POST["person"];
			
			$tanggal=date("Y-m-d");
			$kode="BOOK/".date("ymd")."/";
			$sql="SELECT idseqno FROM trx_booking WHERE kode LIKE '".$kode."%WEB' ORDER BY idseqno DESC LIMIT 1";
			$hsltemp=mysqli_query($db,$sql);
			list($idseqno)=mysqli_fetch_array($hsltemp);
			$idseqno++;
			$kode.=substr("000",0,3-strlen($idseqno)).$idseqno."WEB";
			$periode=date("Y-m-01");
			$sql="INSERT INTO trx_booking (kode,idseqno,tanggal,title,nama,idtype,idno,alamat,phone,email,company,arrival,departure,person,notes) VALUES ";
			$sql.="('$kode','$idseqno','$tanggal','$title','$nama','$idtype','$idno','$alamat','$phone','$email','$company','$arrival','$departure','$person','$notes')";
			mysqli_query($db,$sql);
			if(mysqli_affected_rows($db)>0){
				$successmessage="Your booking was succesfull, we will immediately process your order, Thank You!";
				$_title=getvaldb("mst_name_title","kode",$title,"description");
				$_idtype=getvaldb("mst_id_type","kode",$idtype,"description");
				$arrto[]="marketing@bluefish.co.id";
				$arrname[]="BLUEFISH Marketing";
				$subject="Web Booking $kode";
				$body="<h3><b>Web Booking $kode </b></h3><br>";
				$body.="<table>";
				$body.="	<tr>";
				$body.="		<td>Kode Booking</td><td>:</td><td>$kode</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Tanggal Booking</td><td>:</td><td>".format_tanggal($tanggal)."</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Arrival</td><td>:</td><td>".format_tanggal($arrival)."</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Departure</td><td>:</td><td>".format_tanggal($departure)."</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Nama</td><td>:</td><td>$_title $nama</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Person</td><td>:</td><td>$person</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>ID Number</td><td>:</td><td>$idno ($_idtype)</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Alamat</td><td>:</td><td>$alamat</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Phone</td><td>:</td><td>$phone</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Email</td><td>:</td><td>$email</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Company</td><td>:</td><td>$company</td>";
				$body.="	</tr>";
				$body.="	<tr>";
				$body.="		<td>Notes</td><td>:</td><td>$notes</td>";
				$body.="	</tr>";
				$body.="</table>";
				// $returnmail=sendmailmulti($arrto,$arrname,$arrcc,$arrccname,$subject,$body);
				
				$sql="INSERT INTO app_notifications (title,message,created_at,created_by) VALUES ('WEBOOK $_title $nama checkin at ".format_tanggal($arrival)."','$body',NOW(),'$email')";
				mysqli_query($db,$sql);
				
				$arrto2[]=$email;
				$arrname2[]="$_title $nama";
				$subject2="Blue Fish Resort Booking ($kode)";
				$body2="Dear, $_title $nama<br>";
				$body2.="<br>";
				$body2.="Thank You for making reservations at Bluefish Resort via our website.<br>";
				$body2.="Your booking details are as follows:<br>";
				$body2.="<table>";
				$body2.="	<tr>";
				$body2.="		<td>Booking Code</td><td>:</td><td>$kode</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Booking Date</td><td>:</td><td>".format_tanggal($tanggal)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Arrival</td><td>:</td><td>".format_tanggal($arrival)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Departure</td><td>:</td><td>".format_tanggal($departure)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Name</td><td>:</td><td>$_title $nama</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Person</td><td>:</td><td>$person</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>ID Number</td><td>:</td><td>$idno ($_idtype)</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Address</td><td>:</td><td>$alamat</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Phone</td><td>:</td><td>$phone</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Email</td><td>:</td><td>$email</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Company</td><td>:</td><td>$company</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Notes</td><td>:</td><td>$notes</td>";
				$body2.="	</tr>";
				$body2.="</table>";
				$body2.="<br>";
				$body2.="Please wait, our team will call you immediately to process your order, Thank You!";
				$body2.="<br>";
				$body2.="Best Regards,";
				$body2.="<br><br><br><br>";
				$body2.="BlueFish Resort";
				// $returnmail2=sendmailmulti($arrto2,$arrname2,$arrcc2,$arrccname2,$subject2,$body2);
				
			}
		}
	}
?>
	</head>
	<body topmargin="0" leftmargin="0">
		<header class="fixedHeader">
			<table width="100%">
				<tr>
					<td align="right" width="20%">
						<img src="images/logo.jpg" width="70">
					</td>
					<td style="width:20px;"></td>
					<td valign="middle">
						<div class="mainmenu">
							<a onclick="scrollto(0);">About Us</a>
							<a onclick="scrollto(1);">Facilities</a>
							<a onclick="scrollto(7);">Rate & Special Offer</a>
							<a onclick="scrollto(8);">Activities</a>
							<a onclick="scrollto(14);">Contact Us</a>
							<?php if($_GET["dsjfkhdfasfajks"] == "jdsklfjdasklfjdsk"){ ?>
							<a onclick="scrollto(15);">Booking</a>
							<?php } ?>
							<a onclick="scrollto(16);">Thanks</a>
						</div>
					</td>
				</tr>
			</table>
		</header>
		
		<script language="javascript">
			function scrollto(indexmenu){
				var topval = indexmenu * 800;
				$('html, body').animate({scrollTop : topval},800);
			}
			
			function submitbooking(){
				var errormessage="";
				arrival=document.getElementById("arrival").value;
				departure=document.getElementById("departure").value;
				title=document.getElementById("title").value;
				nama=document.getElementById("nama").value;
				idtype=document.getElementById("idtype").value;
				idno=document.getElementById("idno").value;
				alamat1=document.getElementById("alamat1").value;
				alamat2=document.getElementById("alamat2").value;
				phone=document.getElementById("phone").value;
				email=document.getElementById("email").value;
				company=document.getElementById("company").value;
				captcha=document.getElementById("captcha").value;
				if(captcha==""){errormessage="Please enter required field - captcha!";}
				if(email==""){errormessage="Please enter required field - Email!";}
				if(phone==""){errormessage="Please enter required field - Phone!";}
				if(alamat2==""){errormessage="Please enter required field - Address!";}
				if(alamat1==""){errormessage="Please enter required field - Address!";}
				if(idno==""){errormessage="Please enter required field - ID Number!";}
				if(idtype==""){errormessage="Please enter required field - Id Type!";}
				if(nama==""){errormessage="Please enter required field - Name!";}
				if(title==""){errormessage="Please enter required field - Title!";}
				if(departure==""){errormessage="Please enter required field - Departure!";}
				if(arrival==""){errormessage="Please enter required field - Arrival!";}
				if(errormessage){alert(errormessage);return false;}else{return true;}
			}
		</script>
		<div class="big_fixed_image" style="background-image: url('images/aboutus01.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
						<?php
							$hsl = mysqli_query($db,"SELECT content FROM mst_menuweb WHERE kode=2");
							list($content) = mysqli_fetch_array($hsl);
							echo $content;
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities01.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<h1>Facilities :</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities02.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<ul><li>Bed Rooms</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities03.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<ul><li>Swimming Pool</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities04.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<ul><li>Garden in front of the room</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities05.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<ul><li>Restaurant</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/facilities06.jpg');"></div>
		<div class="big_fixed_image" style="background-image: url('images/rate01.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<div class="scrolling_div">
								<?php
									$hsl = mysqli_query($db,"SELECT content FROM mst_menuweb WHERE kode=7");
									list($content) = mysqli_fetch_array($hsl);
									echo $content;
								?>
							</div>
							<!--iframe scrolling="auto" id="main_frame" name="main_frame" src="webcontent.php?idcontent=7" width="475" height="450" frameborder="0" marginwidth="0" marginheight="0"></iframe-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities01.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<h1>Activities :</h1>
							<ul><li>Banana Boat</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities02.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<ul><li>Kayaking</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities03.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<ul><li>Snorkling</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities04.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<ul><li>Jetsky</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities05.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<ul><li>Fishing</li></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/activities06.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content">
						<div class="b-parallax__content__body">
							<ul><li>Tanjung Lesung Bike Park</li></ul><br>
							<div id="ytplayer"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big_fixed_image" style="background-image: url('images/contactus01.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content" style="position:relative;top:-150px;">
						<div class="b-parallax__content__body">
						<h1>Contact Us :</h1>
						<?php
							$hsl = mysqli_query($db,"SELECT content FROM mst_menuweb WHERE kode=5");
							list($content) = mysqli_fetch_array($hsl);
							echo $content;
						?></div>
						<br>
						<a href="https://www.google.co.id/maps/place/Blue+Fish+Hotel/@-6.6134872,106.3288599,9.21z/data=!4m13!1m7!3m6!1s0x0:0x0!2zNsKwMjknMzguNCJTIDEwNcKwNDAnMzMuNSJF!3b1!8m2!3d-6.49401!4d105.675972!3m4!1s0x0:0x200ebdab38b3929b!8m2!3d-6.4940235!4d105.6759875?hl=id" target="_BLANK">
							<img src="images/bluefish_map.jpg">
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php if($_GET["dsjfkhdfasfajks"] == "jdsklfjdasklfjdsk"){ ?>
		<div class="big_fixed_image" style="background-image: url('images/booking.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box">
					<div class="b-parallax__content" style="position:relative;top:-150px;">
						<div class="b-parallax__content__body">
						<h1>Booking</h1>
						<fieldset style="background-color: rgb(232, 232, 255);">
								
							<?php
								if($successmessage!=""){
									echo "<table id=\"successmessage\" style=\"color:#0865F1;font-size:14px;text-shadow: 1px 1px #A9A9A9;\">";
									echo "<tr><td colspan='3'><h2><b>$successmessage</b></h2></td></tr>";
									?><tr><td align="center" colspan="3"><?php echo formsubmit("booking","OK","onclick=\"bookingform.style.display='block';successmessage.style.display='none';\""); ?></td></tr><?php
									echo "</table>";
									$bookingformhide = "display:none;";
								}
							?>
							<form method="POST" onsubmit="return submitbooking();">
								<table id="bookingform" style="<?=$bookingformhide;?> color:#0865F1;font-size:14px;text-shadow: 1px 1px #A9A9A9;">
									<?php
										if($errormessage!=""){
											?> <tr><td colspan='3' style="color:red"><h2><b><?=$errormessage;?></b></h2></td></tr> <?php
										}
									?>
									<tr>
										<td>Arrival</td>
										<td>:</td>
										<td><?php formtanggal("arrival",$_POST["arrival"]); ?></td>
									</tr>
									<tr>
										<td>Departure</td>
										<td>:</td>
										<td><?php formtanggal("departure",$_POST["departure"]); ?></td>
									</tr>
									<tr>
										<td>Person</td>
										<td>:</td>
										<td>
											<?php echo formtext("person","2",null,false,"","",$_POST["person"]); ?>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>:</td>
										<td>
											<?php echo formselect("title","mst_name_title","kode","description","","description","","","title",$_POST["title"]); ?>
											<?php echo formtext("nama","32",null,false,"","",$_POST["nama"]); ?>
										</td>
									</tr>
									<tr>
										<td nowrap>ID Number</td>
										<td>:</td>
										<td>
											<?php echo formselect("idtype","mst_id_type","kode","description","","description","","","id type",$_POST["idtype"]); ?>
											<?php echo formtext("idno","29",null,false,"","",$_POST["idno"]); ?>
										</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td><?php echo formtext("alamat1","40",null,false,"","",$_POST["alamat1"]); ?></td>
									</tr>
									<tr>
										<td></td>
										<td>:</td>
										<td><?php echo formtext("alamat2","40",null,false,"","",$_POST["alamat2"]); ?></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td><?php echo formtext("phone","20",null,false,"","",$_POST["phone"]); ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><?php echo formtext("email","40",null,false,"","",$_POST["email"]); ?></td>
									</tr>
									<tr>
										<td>Company</td>
										<td>:</td>
										<td><?php echo formtext("company","20",null,false,"","",$_POST["company"]); ?></td>
									</tr>
									<tr>
										<td>Notes</td>
										<td>:</td>
										<td><?php echo formtext("notes","40",null,false,"","",$_POST["notes"]); ?></td>
									</tr>
									<tr>
										<td><img width="60" height="25"  src="loadcaptcha.php"></td>
										<td>:</td>
										<td><?php echo formtext("captcha","8"); ?></td>
									</tr>
									<tr>
										<td align="center" colspan="3"><br><?php echo formsubmit("booking","Submit"); ?></td>
									</tr>
								</table>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="big_fixed_image" style="background-image: url('images/thanks.jpg');">
			<div class="b-parallax">
				<div class="i-parallax__overlay"></div>
				<div class="b-parallax__content-box2">
					<div class="b-parallax__content2">
						<div class="b-parallax__content__body">
							<h1>Thank You</h1>
							we look forward to seeing you soon
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			if($_POST["booking"]){
				?><script language="javascript"> scrollto(15); </script> <?php
			}
		?>
		<script>
			// Load the IFrame Player API code asynchronously.
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			// Replace the 'ytplayer' element with an <iframe> and
			// YouTube player after the API code downloads.
			var player;
			function onYouTubePlayerAPIReady() {
				player = new YT.Player('ytplayer', {
					height: '390',
					width: '640',
					playerVars : {
						autoplay : 0
					},
					videoId: 'zD0SYxkAqYU'
				});
			}

			$(window).scroll(function() {
				$("iframe").each( function() {
					if( $(window).scrollTop() > $(this).offset().top - 500 && $(window).scrollTop() < $(this).offset().top + 400) {
						$(this).css('opacity',1);
						player.playVideo();
					} else {
						$(this).css('opacity',0);
						player.stopVideo();
					}
				}); 
			});
		</script>
	</body>
</html>