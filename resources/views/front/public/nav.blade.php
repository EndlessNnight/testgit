<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" height="66" background="{{url('images/dh.gif')}}">
    <tr style="background: #DC4145">
        <td width="714" height="35" align="left" class="dh" style="padding-left: 20px;">
            <a href="{{ route('home') }}" class="dh">首页</a> ·
            <a href="{{ route('home.periodical') }}" class="dh">期刊中心</a> ·
            <a href="{{ route('home.paper') }}" class="dh">论文欣赏</a> ·
            @if($pages[1])
            <a href="{{ route('home.info',['name' => $pages[1]['unique']]) }}" class="dh">{{$pages[1]['name']}}</a> ·
            @endif
            <a href="{{route('home.validate')}}" class="dh">期刊验证</a> ·
            {{--<a href="http://xinyong.baic.gov.cn/qyxy/" target="_blank" class="dh">经营资质</a> ·--}}
            @if($pages[2])
                <a href="{{ route('home.info',['name' => $pages[2]['unique']]) }}" class="dh">{{$pages[2]['name']}}</a>
            @endif
        <td width="246" align="center" class="dh" ><table width="185" border="0" cellspacing="0" cellpadding="0">
                <form action="{{route('home.periodical')}}" method="get" enctype="application/x-www-form-urlencoded" name="form1" id="form1">
                    <tr>
                        <td width="125" align="left"><input name="search" type="text" id="search" style=" text-indent:5px; border:1px dashed #0033FF; height:16px; line-height:16px; width:120px; margin-right:3px" placeholder="请输入期刊名称" value="{{$search or ''}}" onfocus="test();" onblur="recover();" /></td>
                        <td width="71"><input type="submit" name="button2" id="button2" value="找一下"  style="background:#FFFFFF; color:#666666; border:1px solid #cccccc; font-weight:bold; height:20px" /></td>
                    </tr></form>

                <script>
                    function test()
                    {
                        document.form1.search.value="";
                        document.form1.search.style.color="#000000";
                    }
                    function recover()
                    {
                        if(document.form1.search.value=="")
                        {
                            document.form1.search.value="请输入期刊名";
                            document.form1.search.style.color="#000000";
                        }
                    }
                    function yz()
                    {
                        alert(document.form1.search.value);
                    }
                </script>

            </table></td>
    </tr>
    <tr>
        <td height="31" colspan="2"><table width="960" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="621" class="s12">&nbsp;&nbsp;现在是：
                        <script type="text/javascript" src="{{ url('js/date.js') }}"></script>
                    <td width="339" align="right"  class="s12">{{--<a href="#" class="blue">请记住我们的永久网址：{{ $config['web_domain'] or '' }}</a>&nbsp;--}}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
