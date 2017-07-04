<?php include_once "connect.php"; ?>
<html>
	<head>
		<title>BlueFish Hotel - Enjoy your vacation on the blue water beach</title>
		<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
		<meta name="generator" content="warih_logic">
		<meta name="description" content="BlueFish Hotel - Enjoy your vacation on the blue water beach" />
		<meta name="keywords" content="libur, banten, tanjung lesung, ujung kulon, hot vacation, Hotel, Resort, Vacation, BLUEFISH Hotel - Enjoy Your Vacation On The Blue Water Beach, " />
		<meta name="author" content="bts" />
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
			$kode="WEBOOK/".date("ymd")."/";
			$sql="SELECT idseqno FROM trx_booking WHERE kode LIKE '$kode%' ORDER BY idseqno DESC LIMIT 1";
			$hsltemp=mysqli_query($db,$sql);
			list($idseqno)=mysqli_fetch_array($hsltemp);
			$idseqno++;
			$kode.=substr("000",0,3-strlen($idseqno)).$idseqno;
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
				$returnmail=sendmailmulti($arrto,$arrname,$arrcc,$arrccname,$subject,$body);
				
				$arrto2[]=$email;
				$arrname2[]="$_title $nama";
				$subject2="Blue Fish Resort Booking ($kode)";
				$body2="Dear, $_title $nama<br>";
				$body2.="<br>";
				$body2.="Thank You for making reservations at Bluefish Resort via our website.<br>";
				$body2.="Your booking details are as follows:<br>";
				$body2.="<table>";
				$body2.="	<tr>";
				$body2.="		<td>Kode Booking</td><td>:</td><td>$kode</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Tanggal Booking</td><td>:</td><td>".format_tanggal($tanggal)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Arrival</td><td>:</td><td>".format_tanggal($arrival)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Departure</td><td>:</td><td>".format_tanggal($departure)."</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Nama</td><td>:</td><td>$_title $nama</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Person</td><td>:</td><td>$person</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>ID Number</td><td>:</td><td>$idno ($_idtype)</td>";
				$body2.="	</tr>";
				$body2.="	<tr>";
				$body2.="		<td>Alamat</td><td>:</td><td>$alamat</td>";
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
				$returnmail2=sendmailmulti($arrto2,$arrname2,$arrcc2,$arrccname2,$subject2,$body2);
				
			}
		}
	}
?>
	</head>
	<body topmargin="0" leftmargin="0">
		<script language="javascript">
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
		<table width="1000" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" background="images/background.png" style="width:1000px;height:966px;background-repeat:no-repeat;">
					<div style="position: absolute;top:90px;left:200px;"><img src="images/tagline1.jpg"></div>
					<div style="position: absolute;top:115px;left:360px;"><img src="images/tagline2.jpg"></div>
					<div style="position: absolute;top:55px;left:60px;"><img src="images/logo.jpg" width="100" height="100"></div>
					<div style="position: absolute;top:100px;left:675px;"><?php include_once "slideimg1.php"; ?></div>
					<div style="position: absolute;top:135px;left:-145px;">
						<iframe scrolling="no" src="slideimg2.php" width="420" height="300" frameborder="0" marginwidth="0" marginheight="0"></iframe>
					</div>
					<div style="position: absolute;top:83px;left:-625px;">
						<table cellspacing="0" cellpadding="0" width="620" style="font-size:12px;">
							<tr>
								<td align="center" valign="top" width="1%" nowrap>&nbsp;</td>
								<!--MENU ATAS-->
								<?php
									$sql="SELECT kode,caption,url,target,content FROM mst_menuweb ORDER BY seqno";
									$hslmenu=mysqli_query($db,$sql);
									while(list($kode,$caption,$url,$target,$content)=mysqli_fetch_array($hslmenu)){
										if(!$url){$url="webcontent.php?idcontent=$kode";}
								?>
								<td align="center" valign="top" width="1%" nowrap>
									<a href="<?php echo $url; ?>" class="mainmenu" target="<?php echo $target; ?>"><?php echo $caption; ?></a>
								</td>
								<?php
									}
								?>
								<!--MENU ATAS END-->
								<td align="center" valign="top" width="1%" nowrap>&nbsp;</td>
							</tr>
						</table>
					</div>
					<div style="position: absolute;top:135px;left:-625px;">
						<iframe scrolling="auto" id="main_frame" name="main_frame" src="webcontent.php?idcontent=1" width="475" height="450" frameborder="0" marginwidth="0" marginheight="0"></iframe>
					</div>
					<div style="position: absolute;top:590px;left:-625px;">
						<table style="height:185px;width:474px;color:white;">
							<tr>
								<td style="background-image:url(images/win_sw.png);background-repeat:no-repeat;" valign="top">
									<table width="474" style="color:white;font-size:12px;">
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td width="130">&nbsp;</td>
											<td valign="top">
												<ul>
													<li>Ocean View</li>
													<li>Oversized Rm</li>
													<li>Connecting Rm</li>
													<li>TV</li>
													<li>Air Conditioner</li>
													<li>Deluxe Shower</li>
													<li>Private Balcony</li>
													<li>24 Hr Rm Service</li>
													<li>Personal Seafood Menu</li>
												</ul>
											</td>
											<td valign="top">
												<ul>
													<li>BBQ Facility</li>
													<li>Meeting Room</li>
													<li>Salt Water Pool</li>
													<li>Hot Spot</li>
													<li>Beach Club Activities</li>
													<li>Fun Fishing</li>
													<li>Mountain Biking</li>
													<li>Game Fishing</li>
													<li>Group Rates</li>
												</ul>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div style="position: absolute;top:440px;left:-148px;">
						<table style="height:335px;width:424px;color:white;"><tr><td style="background-image:url(images/win_booking.png);background-repeat:no-repeat;" valign="top">&nbsp;</td></tr></table>
					</div>
					
					<div style="position: absolute;top:445px;left:-20px;">
						<!--form method="POST" onsubmit="return submitbooking();">
							<table style="color:white;font-size:12px;">
								<tr>
									<td>Arrival</td>
									<td>:</td>
									<td><?php formtanggal("arrival"); ?></td>
								</tr>
								<tr>
									<td>Departure</td>
									<td>:</td>
									<td><?php formtanggal("departure"); ?></td>
								</tr>
								<tr>
									<td>Person</td>
									<td>:</td>
									<td>
										<?php echo formtext("person","2"); ?>
									</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td>
										<?php echo formselect("title","mst_name_title","kode","description","","description","","","title"); ?>
										<?php echo formtext("nama","20"); ?>
									</td>
								</tr>
								<tr>
									<td nowrap>ID Number</td>
									<td>:</td>
									<td>
										<?php echo formselect("idtype","mst_id_type","kode","description","","description","","","id type"); ?>
										<?php echo formtext("idno","25"); ?>
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td><?php echo formtext("alamat1","40"); ?></td>
								</tr>
								<tr>
									<td></td>
									<td>:</td>
									<td><?php echo formtext("alamat2","40"); ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td><?php echo formtext("phone","20"); ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo formtext("email","40"); ?></td>
								</tr>
								<tr>
									<td>Company</td>
									<td>:</td>
									<td><?php echo formtext("company","20"); ?></td>
								</tr>
								<tr>
									<td>Notes</td>
									<td>:</td>
									<td><?php echo formtext("notes","40"); ?></td>
								</tr>
								<tr>
									<td><img width="60" height="25"  src="loadcaptcha.php"></td>
									<td>:</td>
									<td><?php echo formtext("captcha","8"); ?></td>
								</tr>
								<tr>
									<td align="center" colspan="3"><?php echo formsubmit("booking","Booking"); ?></td>
								</tr>
							</table>
						</form-->
					</div>
				</td>
			</tr>
		</table>
		<?php
			if($successmessage!=""){
				?><script language="javascript"> alert("<?php echo $successmessage; ?>"); </script> <?php
			}
			if($errormessage!=""){
				?><script language="javascript"> 
					alert("<?php echo $errormessage; ?>"); 
					document.getElementById("arrival").value="<?php echo $_POST["arrival"]; ?>";
					document.getElementById("departure").value="<?php echo $_POST["departure"]; ?>";
					document.getElementById("title").value="<?php echo $_POST["title"]; ?>";
					document.getElementById("nama").value="<?php echo $_POST["nama"]; ?>";
					document.getElementById("idtype").value="<?php echo $_POST["idtype"]; ?>";
					document.getElementById("idno").value="<?php echo $_POST["idno"]; ?>";
					document.getElementById("alamat1").value="<?php echo $_POST["alamat1"]; ?>";
					document.getElementById("alamat2").value="<?php echo $_POST["alamat2"]; ?>";
					document.getElementById("phone").value="<?php echo $_POST["phone"]; ?>";
					document.getElementById("email").value="<?php echo $_POST["email"]; ?>";
					document.getElementById("company").value="<?php echo $_POST["company"]; ?>";
					document.getElementById("person").value="<?php echo $_POST["person"]; ?>";
					document.getElementById("notes").value="<?php echo $_POST["notes"]; ?>";
				</script><?php
			}
		?>
	</body>
</html>