<?php
	include_once "header.php";
	$kode=$_GET["idcontent"];
	$sql="SELECT kode,caption,url,target,content FROM mst_menuweb WHERE kode='$kode'";
	$hsltemp=mysqli_query($db,$sql);
	list($kode,$caption,$url,$target,$content)=mysqli_fetch_array($hsltemp);
?>
<table width="450" height="450">
	<tr>
		<td class="titlecontent" style="width:440px;height:23px;background-image:url('images/header_subtitle.png');">&nbsp;&nbsp;<?php echo $caption; ?></td>
	</tr>
	<tr><td class="content" valign="top"><?php echo $content; ?></td></tr>
</table>
<?php include_once "footer.php"; ?>