<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tr>
        <td width="306" height="30" valign="middle" class="s12 red">{{--您好，欢迎光临{{ $config['web_name'] or ''}}【官网】！--}}</td>
        <td width="654" align="right" valign="middle" class="s12">
            <a onclick="javascript:window.external.addfavorite('{{ $config["web_domain"] or ""}}','{{ $config["web_name"] or ""}}【官网】');" href="#" target="_self" >加为收藏</a> |
            <a onclick="this.style.behavior='url(#default#homepage)';this.sethomepage('{{ $config["web_domain"] or ""}}')" href="#" >设为首页</a> </td>
    </tr>
    <tr>
        <td height="80"><a href="{{ route('home') }}" title=logo target='_blank'><img src="{{url('images/logosj.jpg')}}" width='356'   border='0' /></a></td>
        <td align="right" ><a href=# title=banner target='_blank'><img src="{{url('images/banner.jpg')}}" width='570'   border='0' /></a></td>
    </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tr>
        <td height="5"></td>
    </tr>
</table>
