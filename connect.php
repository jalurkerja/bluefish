<?php 
//echo "<img src='images/under_maintenance.jpg'>"; exit(); 
?>
<?php session_start();
	ini_set ("display_errors","off");
	ob_start();
	$sessionid=session_id();
	include_once "connect_config.php";
	if(!$db=mysqli_connect($host,$user,$pass,$dbname)){echo "DB Not Connect!";}
	function format_tanggal($tanggal){
		$temp=substr($tanggal,8,2)."-".substr($tanggal,5,2)."-".substr($tanggal,0,4);
		return $temp;
	}
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40690422-1', 'bluefish.co.id');
  ga('send', 'pageview');

</script>
<style type="text/css">
	a {text-decoration:none;}
	td{
		font-family:tahoma;
	}
	.mainmenubr {
		font-size:5px;
	}
	.miniwindowlist {
		color:000000;
		font-size:12px;
		font-family:tahoma;
	}
	.content {
		font-size:12px;
		font-family:tahoma;
		background-color:white;
	}
	
	
	.titlecontent {
		color:7d7d7d;
		font-size:12px;
		font-family:tahoma;
		font-weight:bold;
	}
	.titleminiwindow {
		color:236338;
		font-size:11px;
		font-family:tahoma;
		font-weight:bold;
	}
</style>