//图片等比例缩小
function DrawImage(ImgD,kw,kh)
{
var image=new Image();
image.src=ImgD.src;
if(image.height<image.width)//说明宽》高＝＝》以宽为标准
{
   if(image.width>kw)
   {
     ImgD.width=kw;
     ImgD.height=(image.height*kw)/image.width;
   }
}
else//以高为标准
{
   if(image.height>kh)
   {
     ImgD.height=kh;
     ImgD.width=(image.width*kh)/image.height;
   }
}
}



var picid=document.getElementById("bigpic");

function picon(thetext){picid.style.visibility='visible';picid.style.top=event.clientY;picid.style.left=event.clientX;  picid.innerHTML="<img src='"+thetext+"'  onload='DrawImage(this,800,600)'>";}



function picmove(){

if (event.clientY >(document.documentElement.clientHeight)/2){
	
     if (event.clientX >(document.documentElement.clientWidth)/2){	
        picid.style.top=(document.documentElement.scrollTop+event.clientY-picid.offsetHeight)+"px";
        picid.style.left=(document.documentElement.scrollLeft+event.clientX-picid.offsetWidth)+"px";}

   else
        {picid.style.top=(document.documentElement.scrollTop+event.clientY-picid.offsetHeight)+"px";
        picid.style.left=(document.documentElement.scrollLeft+event.clientX+15)+"px";}

}



else
{	
    if (event.clientX >(document.documentElement.clientWidth)/2)
	    { picid.style.top=(document.documentElement.scrollTop+event.clientY+15)+"px";
		picid.style.left=(document.documentElement.scrollLeft+event.clientX-picid.offsetWidth)+"px";
       }
    else
         {picid.style.top=(document.documentElement.scrollTop+event.clientY+15)+"px";
           picid.style.left=(document.documentElement.scrollLeft+event.clientX+15)+"px";}
}	
	
     }




function picoff(){picid.style.visibility='hidden';}



function aamove(){
if (event.clientY >(document.documentElement.clientHeight)/2){	
picid.style.top=(document.documentElement.scrollTop+event.clientY-picid.offsetHeight)+"px";
picid.style.left=(document.documentElement.scrollLeft+event.clientX+10)+"px";}
else
{
picid.style.top=(document.documentElement.scrollTop+event.clientY+10)+"px";
picid.style.left=(document.documentElement.scrollLeft+event.clientX+10)+"px";	
	}

	}


document.onmousemove=picmove

