@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '优秀论文'])
    <div style="line-height:25px; padding:15px">
        <div align="center" style="font-size:16px; font-weight:bold; line-height:40px; border-bottom:1px dotted #cccccc; color:#cc0000 ">{{$paper_content['title']}}</div>
        <div class="pad10" style="min-height:500px;">
            {!! $paper_content['content'] !!}
        </div>
        <div class="gry" align="right" style="border-top:1px dotted #cccccc; line-height:35px">发布日期:{{$paper_content['release_time']}}&nbsp;&nbsp;已经浏览 {{$paper_content['browse']}} 次</div>
    </div>
@endsection


