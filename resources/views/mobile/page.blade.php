@extends('mobile.base')

@section('content')

    <div class="lmy1">
        <div class="lmy1_t">
            <h1><p> <img src="{{ url('/images/mobile/pic55.png') }}"></p>
                当前位置：<a href="{{route('mobile.home')}}">首页</a> &gt; <a href="{{route('mobile.periodical')}}">{{$pageContent->name}}</a> &gt;
            </h1>
        </div>
        <div class="wzy">
            <div class="blank1"></div>
            <h2>{{$pageContent->name}}</h2>

            <div class="blank1"></div>
            <div class="nrbody">{!! $pageContent->content !!}</div>
        </div>
    </div>
@endsection