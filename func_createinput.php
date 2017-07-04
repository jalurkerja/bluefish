<?php
	function reformattanggal($tanggal,$mode){
		if($mode=="1"){ //d/m/y ==> Y-m-d
			$tgl=substr($tanggal,0,2);
			$bln=substr($tanggal,3,2);
			$thn=substr($tanggal,6,4);
			$tanggal="$thn-$bln-$tgl";
		}
		if($mode=="2"){//Y-m-d ==> d/m/Y
			$tgl=substr($tanggal,8,2);
			$bln=substr($tanggal,5,2);
			$thn=substr($tanggal,0,4);
			$tanggal="$tgl/$bln/$thn";
		}
		return $tanggal;
	}
	function formsubmit($name,$value="",$javascript=""){
		echo "<input type=\"submit\" name=\"$name\" id=\"$name\" value=\"$value\" style=\"font-size:10px;\" $javascript>";
	}
	function formupload($name,$accept){
		echo "<input type=\"file\" name=\"$name\" accept=\"$accept/*\">";
	}
	function formsearch($title,$javafunction){
		echo "<img src=\"images/b_search.png\" title=\"$title\" border=\"0\" width=\"13\" height=\"13\"  onclick=\"$javafunction\">";
	}
	function formcheckbox($nama,$caption,$checked,$disabled){
		echo "<input type=\"checkbox\" id=\"chk$nama\" name=\"$nama\" value=\"1\" $checked $disabled>$caption";
	}
	function formtext($name,$size="",$mode="",$isreadonly=false,$align="",$javafunction="",$value=""){
		$return="";
		if(!$mode){$mode="input";}
		if($mode=="input"){
			if(!$size){$size="30";}			
			if($isreadonly){$readonly="readonly";}else{$readonly="";}
			$return="<input type=\"text\" value=\"$value\" id=\"$name\" name=\"$name\" $readonly size=\"$size\" style=\"text-align:$align;font-size:10px;\" $javafunction>";
		}
		if($mode=="span"){
			$return="<span id=\"$name\"></span>";
		}
		echo $return;
	}
	function formtanggal($name = "",$tanggal = "",$mode = "",$isreadonly = false){
		$return="";
		if(!$mode){$mode="input";}
		if($mode=="input"){
			if($isreadonly){$readonly="readonly";}else{$readonly="";}
			$return="<input id=\"$name\" type=\"text\" name=\"$name\" value=\"$tanggal\" size=\"12\" style=\"font-size:10px;\">";
			$return.="<img src=\"images/calendar.png\" title=\"Calendar\" border=\"0\" width=\"13\" height=\"13\" onclick=\"showCalendar('$name')\">";
		}
		if($mode=="inputperiode"){
			if($isreadonly){$readonly="readonly";}else{$readonly="";}
			$return="<input id=\"$name\" type=\"text\" name=\"$name\" value=\"$tanggal\" size=\"12\" style=\"font-size:10px;\">";
			$return.="<img src=\"images/calendar.png\" title=\"Calendar\" border=\"0\" width=\"13\" height=\"13\" onclick=\"showCalendar('$name','periode')\">";
		}
		if($mode=="span"){
			$return="<span id=\"$name\">".format_tanggal($tanggal)."</span>";
		}
		echo $return;
	}
	function formtextarea($name,$cols,$rows,$mode,$isreadonly,$value){
		$return="";
		if(!$mode){$mode="input";}
		if($mode=="input"){
			if(!$rows){$rows="3";}			
			if(!$cols){$cols="30";}			
			if($isreadonly){$readonly="readonly";}else{$readonly="";}
			$return="<textarea name=\"$name\" id=\"$name\" cols=\"$cols\" rows=\"$rows\" $readonly style=\"font-size:10px;\">$value</textarea>";
		}
		if($mode=="span"){
			$return="<span id=\"$name\"></span>";
		}
		echo $return;
	}
	
	function formselectyesno($name,$value,$isreadonly,$javafunction){
		global $db;
		$return="";
		$return.="<select name=\"$name\" id=\"$name\" $javafunction style=\"font-size:10px;\">";
		$selected="";if($value==1){$selected="selected";}
		$return.="<option value=\"1\" $selected>Ya</option>";
		$selected="";if($value==0){$selected="selected";}
		$return.="<option value=\"0\" $selected>Tidak</option>";
		$return.="</select>";
		echo $return;
	}
	
	function formselect_closeopen($name,$value,$isreadonly,$javafunction){
		global $db;
		$return="";
		$return.="<select name=\"$name\" id=\"$name\" $javafunction style=\"font-size:10px;\">";
		$selected="";if($value==1){$selected="selected";}
		$return.="<option value=\"1\" $selected>Closed</option>";
		$selected="";if($value==0){$selected="selected";}
		$return.="<option value=\"0\" $selected>Open</option>";
		$return.="</select>";
		echo $return;
	}
	
	function formselect($name,$tablename,$kode,$caption1,$caption2,$order,$isreadonly,$javafunction,$noselectcap){
		global $db;
		if(!$noselectcap){$noselectcap="Pilih";}
		$return="";
		$return.="<select name=\"$name\" id=\"$name\" $javafunction style=\"font-size:10px;\">";
		$return.="<option value=\"\">-$noselectcap-</option>";
		if($caption2){
			$sql="SELECT $kode,$caption1,$caption2 FROM $tablename";
		}else{
			$sql="SELECT $kode,$caption1 FROM $tablename";
		}
		if($order){
			$sql.=" ORDER BY $order";
		}
		$hsltemp=mysqli_query($db,$sql);
		while(list($kode,$caption1,$caption2)=mysqli_fetch_array($hsltemp)){
			if($caption2){
				$caption=$caption1." ".$caption2;
			}else{
				$caption=$caption1;
			}
			$return.="<option value=\"$kode\">$caption</option>";
		}
		$return.="</select>";
		echo $return;
	}
	function getvaldb($table,$kode,$key,$returnfield1,$returnfield2){
		global $db;
		if($returnfield2){
			$sql="SELECT $returnfield1,$returnfield2 FROM $table WHERE $kode='$key'";
			$hsltemp=mysqli_query($db,$sql);
			list($returnfield1,$returnfield2)=mysqli_fetch_array($hsltemp);
			$return=$returnfield1." ($returnfield2)";
		}else{
			$sql="SELECT $returnfield1 FROM $table WHERE $kode='$key'";
			$hsltemp=mysqli_query($db,$sql);
			list($returnfield1)=mysqli_fetch_array($hsltemp);
			$return=$returnfield1;
		}
		return $return;
	}
?>