<style>
.textstyle {
	/* style attributes for the comments */
	font-family:Arial;
	font-size:8pt;
	color:#aaaaaa;
	background-color:#FFFFFF;
	text-align:center;
	vertical-align:middle;
}
.boxstyle{
	/* style attributes for the slideshow-box */
	overflow:hidden;
	border-style:solid;
	border-width:1px;
	border-color:white;

	/* shadow for Firefox */
	-moz-box-shadow: 5px 5px 8px #AAAAAA;

	/* shadow for Safari and Chrome */
	-webkit-box-shadow: 5px 5px 8px #AAAAAA;

	/* shadow for Opera */
	box-shadow: 5px 5px 5px #AAAAAA;

	/* shadow for Internet Explorer */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=5, Direction=135, Color='#AAAAAA');
}
</style>

<script language="javascript">

var a_imgurl= new Array();
// Your images. Add as many images as you like
a_imgurl[0]="slideimg2/01.jpg";
a_imgurl[1]="slideimg2/02.jpg";
a_imgurl[2]="slideimg2/03.jpg";
a_imgurl[3]="slideimg2/04.jpg";
a_imgurl[4]="slideimg2/05.jpg";
a_imgurl[5]="slideimg2/06.jpg";
a_imgurl[6]="slideimg2/07.jpg";
a_imgurl[7]="slideimg2/08.jpg";

var a_imglink= new Array();
// Add the links corresponding to the images above. Enter "#" if you don't want to add a link
// imglink[0]="http://www.fabulant.com"
// imglink[1]="http://www.hotscripts.com"
// imglink[2]="#"
// imglink[3]="http://www.google.com"

var a_message=new Array();
// Add the messages corresponding to the images above
// message[0]="Do you love Mary?"
// message[1]="I like Nina as well!"
// message[2]="Tonight I'll date Gina, tough"
// message[3]="Don't tell granny, please!" 

// Set the number of bluring layers. A high value will stretch the transition effect
var a_number_blur_layers=30;

// Set the width of image, pixels
var a_img_width=420;

// Set the height of images, pixels
var a_img_height=300;

// Set the height of textbox below image, pixels
var a_text_height=25;

// Set the stillstand, seconds
var a_pause=2;


var i_a_span=a_number_blur_layers-1;
var i_a_opacity=1;
var i_a_imgurl=0;
var a_timer;
var a_low_range=0;
var a_high_range=12;
var a_total_height=a_img_height+a_text_height;
a_pause*=3500;
var a_ie=document.all?1:0;

function a_sharpen(){
	if (i_a_span>=1) {
		document.getElementById('a_span'+i_a_span).style.visibility="hidden";
		if (a_ie) {
			document.getElementById('a_span0').filters.alpha.opacity=i_a_opacity;
		} else {
			document.getElementById('a_span0').style.opacity=i_a_opacity/100;
		}
		i_a_span--;
		i_a_opacity+=100/a_number_blur_layers;
		
		a_timer=setTimeout("a_sharpen()",30);
	} else {
		document.getElementById('a_span0').style.visibility="visible";
		clearTimeout(a_timer);
		i_a_span=1;
		i_a_imgurl++;
		if (i_a_imgurl>=a_imgurl.length) {i_a_imgurl=0;}
		i_a_opacity=100;
		a_timer=setTimeout("a_doblur()",a_pause);
	}
}


function a_doblur(){
	if (i_a_span<a_number_blur_layers) {
		document.getElementById('a_textbox').innerHTML="";
		document.getElementById('a_span'+i_a_span).innerHTML="<img src='"+a_imgurl[i_a_imgurl]+"'>";
		document.getElementById('a_span'+i_a_span).style.visibility="visible";
		if (a_ie) {
			document.getElementById('a_span0').filters.alpha.opacity=i_a_opacity;
		} else {
			document.getElementById('a_span0').style.opacity=i_a_opacity/100;
		}
		i_a_opacity-=100/a_number_blur_layers;
		i_a_span++;
		a_timer=setTimeout("a_doblur()",30);
	} else {
		document.getElementById('a_span0').innerHTML="<a href='"+a_imglink[i_a_imgurl]+"'><img src='"+a_imgurl[i_a_imgurl]+"' border=0></a>";
		clearTimeout(a_timer);
		i_a_span=a_number_blur_layers-1;
		i_a_opacity=0;
		a_sharpen();
	}
}

document.write("<div id='a_roof' class='boxstyle' style='position:relative; width:"+a_img_width+"px; height:"+a_total_height+"px;overflow:hidden;'>");
document.write("<div id='a_span0' style='position:absolute;top:0px;left:0px;filter:alpha(opacity=0);opacity:0;'><a href="+a_imglink[0]+"><img src='"+a_imgurl[0]+"' border=0></a></div>");
for (i=1;i<a_number_blur_layers;i++) {
	var x_ran=(Math.round(Math.random()*a_high_range)+a_low_range)-(a_high_range/2);
	var y_ran=(Math.round(Math.random()*a_high_range)+a_low_range)-(a_high_range/2);
    document.write("<div id='a_span"+i+"' class='ticker' style='position:absolute;top:"+y_ran+"px;left:"+x_ran+"px;filter:alpha(opacity=2);opacity:0.02;'><img src='"+a_imgurl[0]+"'></div>");
}
document.write("<div id='a_textbox' class='textstyle' style='position:absolute;top:"+a_img_height+"px;left:0px;height:"+a_text_height+"px;width:"+a_img_width+"px;'><table height="+a_text_height+" width="+a_img_width+"><tr><td class='textstyle'></td></tr></table></div>");
document.write("</div");

window.onload=a_sharpen;

</script>
