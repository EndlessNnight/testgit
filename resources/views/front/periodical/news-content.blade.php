@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '时事报道'])
    <div style="line-height:25px; padding:15px">
        <div align="center" style="font-size:16px; font-weight:bold; line-height:40px; border-bottom:1px dotted #cccccc; color:#cc0000 ">{{$news_content['title']}}</div>
        <div class="pad10" style="min-height:500px;">
            {!! $news_content['content'] !!}
        </div>
        <div class="gry" align="right" style="border-top:1px dotted #cccccc; line-height:35px">发布日期:{{$news_content['release_time']}}&nbsp;&nbsp;已经浏览 {{$news_content['browse']}} 次</div>
    </div>
@endsection


