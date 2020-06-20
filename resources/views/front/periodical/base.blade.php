
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="{{ url('css/per.css') }}" rel="stylesheet" type="text/css">
    <meta name="keywords" content="{{ $data['keyword'] }}" />
    <meta name="description" content="{{ $data['description']}}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>《{{ $data['name']}}》杂志【官网】-《{{ $data['name']}}》杂志在线投稿-《{{ $data['name']}}》杂志论文发表</title>
    <script type="text/javascript" src="{{ url('js/jquery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/js.js')}}"></script>
    <link href="{{ url('css/page.css') }}" rel="stylesheet" type="text/css">

    @yield('head')

</head>
<body>
<div id="bigpic"><IMG src="{{url('images/per/loading.gif')}}" border=0></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td background="{{url('images/per/tbg.jpg')}}"><table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="528" height="29">欢迎光临<span class="red">《{{$data['name']}}》杂志！</span>现在是：<script src="{{url('js/date2.js')}}"></script></td>
                    <td width="322"><iframe width="310" scrolling="no" height="25" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&amp;id=40&amp;icon=1&amp;num=3"></iframe></td>
                    <td width="250" align="right" style="cursor:pointer">
                        <a  onmousedown="window.external.addFavorite(window.location.href,'《{{ $data['name']}}》杂志【官方网站】')">收藏本站</a> |
                        <a  onclick="this.style.behavior='url(#default#homepage)';this.setHomePage(window.location.href);"  >设为首页</a>
                        <SCRIPT type="text/javascript" src="{{url('js/webj2f.js')}}" ></SCRIPT></td>
                </tr>
            </table></td>
    </tr>
</table>

<div  class="top">
    <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            {{--<td width="120" height="125" align="left">--}}
                {{--<a href="{{ route('home') }}" target="_blank">--}}
                    {{--<img height="100" width="100" src="{{url('images/per/logo.png')}}" alt="《{{$data['name']}}》杂志"  border="0" />--}}
                {{--</a>--}}
            {{--</td>--}}
            <td width="536" align="left" class="title" title="{{$data['name']}}">《{{$data['name']}}{{--{{mb_strlen($data['name'])>6?mb_substr($data['name'],0,6).'…':$data['name']}}--}}》杂志</td>
            <td width="205" align="left" class="hei" style="padding-right:10px; white-space:nowrap">
                @if(!empty($data['responsible']))主管单位：{{$data['responsible']}}<br />@endif
                @if(!empty($data['sponsor']))主办单位：{{$data['sponsor']}}<br />@endif
                @if(!empty($data['international_ornp'])) 国际刊号：{{$data['international_ornp']}}<br />@endif
                @if(!empty($data['internal_ornp']))国内刊号：{{$data['internal_ornp']}}<br />@endif
		@if(!empty($data['postal_code']))邮发代号：{{$data['postal_code']}}@endif
            </td>

            <td width="239" align="left" class="hei" style="padding-left:13px; background:url({{url('images/per/line.jpg')}}) center left no-repeat; white-space:nowrap">{!! $data['employ_web_text'] !!}</td>
        </tr>
    </table>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ff6600" >
    <tr>
        <td>
            <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="58">
                        @include('front.periodical.nav')
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


@yield('content')


<div class="foot">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:1px solid #ff9900">

        <tr>
            <td height="13" align="center" ></td>
        </tr>
        <tr>
            <td align="center" class="l30 s14 white hei">  版权所有 &copy;
                《{{$data['name']}}》杂志 &copy; {{date('Y-m-d')}} All rights reserved.</td>
        </tr>
    </table>
</div>
{{--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF6600" >--}}
    {{--<tr>--}}
        {{--<td height="56" align="center" valign="top" class="borr">--}}
            {{--<img src="{{url('images/per/r7.gif')}}" width="96" height="31"  />--}}
            {{--<img src="{{url('images/per/r5.gif')}}" width="80" height="31"  />--}}
            {{--<img src="{{url('images/per/r1.gif')}}" width="89" height="31"  />--}}
            {{--<img src="{{url('images/per/r3.gif')}}" width="95" height="31"  />--}}
            {{--<img src="{{url('images/per/r8.gif')}}" width="95" height="31"  />--}}
            {{--<img src="{{url('images/per/r4.gif')}}" width="88" height="31"  />--}}
            {{--<img src="{{url('images/per/r6.gif')}}" width="79" height="31"  />--}}
            {{--<img src="{{url('images/per/r2.gif')}}" width="109" height="31"  />--}}
        {{--</td>--}}
    {{--</tr>--}}
{{--</table>--}}


@include('tongji.all')
</body>
</html>
