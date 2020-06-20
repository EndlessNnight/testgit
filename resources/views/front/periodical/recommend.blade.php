@if(!empty($covers))
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="15" bgcolor="#FFFFFF" id="main">
    <tr>
        <td valign="top"><table width="1070" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="titright">杂志图片 <span>/ PICTURES</span></td>
                    <td class="titrightm">&nbsp;</td>
                </tr>
            </table>
            <table width="1070" border="0" align="center" cellpadding="0" cellspacing="0" >
                <tr>
                    <td width="20" align="left"><img src="{{url('images/per/left.jpg')}}" alt="点击向左滚动" name="r_l" hspace="0" class="hand" id="r_l" onclick="r_left()" /></td>
                    <td align="center" valign="top" style="padding:3px 7px" ><!--------------------demo start------------------>
                        <div id="demo" style="overflow:hidden;height:216px;width:990px; padding:8px 0; ">
                            <table border="0" align="left" cellpadding="0" cellspacing="0" cellspace="0">
                                <tr>
                                    <td id="demo1" >
                                        <table width="600" border="0" align="center" cellpadding="7" cellspacing="0">
                                            <tr>
                                                @foreach($covers as $cover)
                                                <td  align="center"><div><img src="{{$cover['url']}}"  class="picbox"  width="150" height="200" onerror="this.src='{{url('images/per/nopic.jpg')}}'"  /><br /><img src="{{$cover['url']}}" width="150" height="10" /></div>
                                                </td>
                                                @endforeach

                                            </tr>
                                        </table>
                                    </td>
                                    <td id="demo2" ></td>
                                </tr>
                            </table>
                        </div>
                        <!--------------------demo end------------------>
                        <script>
                            var dir=1//每步移动像素，大＝快
                            var speed=20//循环周期（毫秒）大＝慢
                            demo2.innerHTML=demo1.innerHTML
                            function Marquee(){//正常移动
                                //alert(demo2.offsetWidth+"\n"+demo.scrollLeft)
                                if (dir>0  && (demo2.offsetWidth-demo.scrollLeft)<=0) demo.scrollLeft=0
                                if (dir<0 &&(demo.scrollLeft<=0)) demo.scrollLeft=demo2.offsetWidth
                                demo.scrollLeft+=dir

                                demo.onmouseover=function() {clearInterval(MyMar)}//暂停移动
                                demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}//继续移动
                            }
                            function r_left(){if (dir=-1)dir=1}//换向左移
                            function r_right(){if (dir=1)dir=-1}//换向右移


                            var MyMar=setInterval(Marquee,speed)

                        </script>
                    </td>
                    <td width="20" align="right" ><img src="{{url('images/per/right.jpg')}}" alt="点击向右滚动" name="r_r" class="hand"  id="r_r" onclick="r_right()"  /></td>
                </tr>
            </table></td>
    </tr>
</table>
@endif
