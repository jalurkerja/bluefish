
<script language="javascript">
	function resizeframe(){
		window.parent.document.getElementById('main_frame').width="";
		window.parent.document.getElementById('main_frame').height="";
		var iframe_height=content_body_id.scrollHeight;
		var iframe_width=content_body_id.scrollWidth;
		iframe_height=iframe_height+20;
		iframe_width=iframe_width+20;
		if(iframe_height>450){
			window.parent.document.getElementById('main_frame').height=iframe_height;
		} else {
			window.parent.document.getElementById('main_frame').height=iframe_height;
		}
		if(iframe_width>763){
			window.parent.document.getElementById('main_frame').width=iframe_width;
		}else{
			<?php if($_SESSION["loggedin"]) {?>
			window.parent.document.getElementById('main_frame').width=iframe_width;
			<?php }else{ ?>
			window.parent.document.getElementById('main_frame').width=iframe_width;
			<?php } ?>
		}
	}
	//setTimeout("resizeframe()",1000);
</script>
