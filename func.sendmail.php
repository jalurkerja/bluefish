<?php
require("phpmailer/class.phpmailer.php");
function sendmail($email,$name,$subject,$body,$arrattachment=array()){
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; 
	$mail->Username = "info@kag.co.id";
	$mail->Password = "infokag123";
	$webmaster_email = "marketing@bluefish.co.id";
	$mail->From = $webmaster_email;
	$mail->FromName = "BLUEFISH SYSTEM";
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"BLUEFISH SYSTEM");
	$mail->WordWrap = 50; 
	if(count($arrattachment)>0){
		foreach($arrattachment as $key => $fileattachment){
			if($fileattachment){$mail->AddAttachment($fileattachment);}
		}
	}
	$mail->IsHTML(true); 
	$mail->Subject = $subject;
	$mail->Body = $body;
	if(!$mail->Send()){
		return "Mailer Error: " . $mail->ErrorInfo;
	}else{
		return "OK";
	}
}

function sendmailmulti($arrto,$arrname,$arrcc,$arrccname,$subject,$body,$arrattachment=array()){
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host       =  "mail.bluefish.co.id";
	$mail->Port       = 465;
	$mail->Username = "marketing@bluefish.co.id";
	$mail->Password = "R2h2s12*";
	$webmaster_email = "marketing@bluefish.co.id";
	$mail->SMTPKeepAlive = true;  
	$mail->From = $webmaster_email;
	$mail->FromName = "BLUEFISH SYSTEM";
	$mail->AddReplyTo($webmaster_email,"BLUEFISH SYSTEM");
	$mail->SetFrom($webmaster_email,"BLUEFISH SYSTEM");
	$mail->Mailer = "smtp"; 
	$mail->CharSet = 'utf-8';  
	$mail->WordWrap = 50; 
	if(count($arrto)>0){
		foreach($arrto as $key => $to){
			$name=$arrname[$key];
			if($to){$mail->AddAddress($to,$name);}
		}
	}
	if(count($arrcc)>0){
		foreach($arrcc as $key => $cc){
			$ccname=$arrccname[$key];
			if($to){$mail->AddCC($cc,$ccname);}
		}
	}
	if(count($arrattachment)>0){
		foreach($arrattachment as $key => $fileattachment){
			if($fileattachment){$mail->AddAttachment($fileattachment);}
		}
	}
	$mail->IsHTML(true); 
	$mail->Subject = $subject;
	$mail->Body = $body;
	if(!$mail->Send()){
		return "Mailer Error: " . $mail->ErrorInfo;
	}else{
		return "OK";
	}
}
?>