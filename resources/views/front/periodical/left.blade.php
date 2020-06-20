<table width="245" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td valign="top">
            <a href="{{route('home.periodical.content',['unique' => $data['unique']])}}">
                <img src="{{$data['img_url']}}" alt="《{{$data['name']}}》杂志" width="239" height="320" class="picbox">
            </a>
        </td>
    </tr>
    </tbody>
</table>
<table width="245" border="0" cellpadding="0" cellspacing="0" class="mart15">
    <tbody><tr>
        <td height="40" class="titleft">版权信息</td>
    </tr>
    <tr>
        <td valign="top" class="bor3org pad1015 l25" style="font-weight:bold; color:#FF9933">
            @if(!empty($data['responsible']))主管单位：{{$data['responsible']}}<br />@endif
            @if(!empty($data['sponsor']))主办单位：{{$data['sponsor']}}<br />@endif
            @if(!empty($data['international_ornp']))国际刊号：{{$data['international_ornp']}}<br />@endif
            @if(!empty($data['internal_ornp']))国内刊号：{{$data['internal_ornp']}}<br />@endif
            @if(!empty($data['postal_code']))邮发代号：{{$data['postal_code']}}@endif
        </td>
    </tr>
    </tbody>
</table>
<table width="245" border="0" cellpadding="0" cellspacing="0" class="mart15">
    <tbody><tr>
        <td class="titleft">联系我们 <span>/ CONTACT</span></td>
    </tr>
    <tr>
        <td width="504" height="180" class="lbg bor3org pad1015 l25">
            <strong>《{{$data['name']}}》杂志 <br></strong>
            <img src="http://www.zazhishe123.com/ima/tel.gif" width=15 height=15> 电话：{{$config['telephone'] or ''}} <br>
            <img src="{{url('images/per/mobi.gif')}}" width=20 height=17> 手机：{{$config['web_phone'] or ''}}<br><br>
            <img src="{{url('images/per/mail.gif')}}" width=18 height=12> 邮箱：<a href="mailto:{{$config['web_email'] or ''}}">{{$config['web_email'] or ''}}</a> <br>
            <img src="{{url('images/per/addr.gif')}}" width=16 height=16> 地址：{{$config['web_address'] or ''}}
        </td>
    </tr>
    </tbody>
</table>
