@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '联系我们'])
    <div style="line-height:25px; padding:15px">
        <strong>《{{$data['name']}}》杂志 <br></strong>
        <img src="{{url('images/per/tel.gif')}}" width=15 height=15> 电话：{{$config['web_telephone'] or ''}} <br>
        <img src="{{url('images/per/mobi.gif')}}" width=20 height=17> 手机：{{$config['web_phone'] or ''}}<br><br>
        <img src="{{url('images/per/mail.gif')}}" width=18 height=12> 邮箱：<a href="mailto:{{$config['web_email'] or ''}}">{{$config['web_email'] or ''}}</a> <br>
        <img src="{{url('images/per/addr.gif')}}" width=16 height=16> 地址：{{$config['web_address'] or ''}}
    </div>
@endsection


