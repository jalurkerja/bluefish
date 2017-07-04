<script language="javascript">

var imgurl= new Array()
// Your images. Add as many images as you like
imgurl[0]="slideimg1/01.png";
imgurl[1]="slideimg1/02.png";
imgurl[2]="slideimg1/03.png";
imgurl[3]="slideimg1/04.png";
imgurl[4]="slideimg1/05.png";
imgurl[5]="slideimg1/06.png";

var imglink= new Array();
// Add the links corresponding to the images above. Enter "#" if you don't want to add a link
// imglink[0]="http://www.fabulant.com"
// imglink[1]="http://www.hotscripts.com"
// imglink[2]="#"
// imglink[3]="http://www.google.com"

var message=new Array();
// Add the messages corresponding to the images above
// message[0]="Do you love Mary?"
// message[1]="I like Nina as well!"
// message[2]="Tonight I'll date Gina, tough"
// message[3]="Don't tell granny, please!" 

// Set the number of bluring layers. A high value will stretch the transition effect
var number_blur_layers=30;

// Set the width of image, pixels
var img_width=227;

// Set the height of images, pixels
var img_height=100;

// Set the height of textbox below image, pixels
var text_height=25;

// Set the stillstand, seconds
var pause=2;


var i_span=number_blur_layers-1;
var i_opacity=1;
var i_imgurl=0;
var timer;
var low_range=0;
var high_range=12;
var total_height=img_height+text_height;
pause*=5000;
var ie=document.all?1:0;

function sharpen(){
	if (i_span>=1) {
		document.getElementById('span'+i_span).style.visibility="hidden";
		if (ie) {
			document.getElementById('span0').filters.alpha.opacity=i_opacity;
		} else {
			document.getElementById('span0').style.opacity=i_opacity/100;
		}
		i_span--;
		i_opacity+=100/number_blur_layers;
		
		timer=setTimeout("sharpen()",30);
	} else {
		document.getElementById('span0').style.visibility="visible";
		clearTimeout(timer);
		i_span=1;
		i_imgurl++;
		if (i_imgurl>=imgurl.length) {i_imgurl=0;}
		i_opacity=100;
		timer=setTimeout("doblur()",pause);
	}
}


function doblur(){
	if (i_span<number_blur_layers) {
		document.getElementById('textbox').innerHTML="";
		document.getElementById('span'+i_span).innerHTML="<img src='"+imgurl[i_imgurl]+"'>";
		document.getElementById('span'+i_span).style.visibility="visible";
		if (ie) {
			document.getElementById('span0').filters.alpha.opacity=i_opacity;
		} else {
			document.getElementById('span0').style.opacity=i_opacity/100;
		}
		i_opacity-=100/number_blur_layers;
		i_span++;
		timer=setTimeout("doblur()",30);
	} else {
		document.getElementById('span0').innerHTML="<a href='"+imglink[i_imgurl]+"'><img src='"+imgurl[i_imgurl]+"' border=0></a>";
		clearTimeout(timer);
		i_span=number_blur_layers-1;
		i_opacity=0;
		sharpen();
	}
}

document.write("<div id='roof' xclass='boxstyle' style='position:relative; width:"+img_width+"px; height:"+total_height+"px;overflow:hidden;'>");
document.write("<div id='span0' style='position:absolute;top:0px;left:0px;filter:alpha(opacity=0);opacity:0;'><a href="+imglink[0]+"><img src='"+imgurl[0]+"' border=0></a></div>");
for (i=1;i<number_blur_layers;i++) {
	var x_ran=(Math.round(Math.random()*high_range)+low_range)-(high_range/2);
	var y_ran=(Math.round(Math.random()*high_range)+low_range)-(high_range/2);
    document.write("<div id='span"+i+"' xclass='ticker' style='position:absolute;top:"+y_ran+"px;left:"+x_ran+"px;filter:alpha(opacity=2);opacity:0.02;'><img src='"+imgurl[0]+"'></div>");
}
//document.write("<div id='textbox' xclass='textstyle' style='position:absolute;top:"+img_height+"px;left:0px;height:"+text_height+"px;width:"+img_width+"px;'><table height="+text_height+" width="+img_width+"><tr><td xclass='textstyle'>"+message[0]+"</td></tr></table></div>")
document.write("<div id='textbox' xclass='textstyle' style='position:absolute;top:"+img_height+"px;left:0px;height:"+text_height+"px;width:"+img_width+"px;'><table height="+text_height+" width="+img_width+"><tr><td xclass='textstyle'></td></tr></table></div>");
document.write("</div");

window.onload=sharpen;

</script>
