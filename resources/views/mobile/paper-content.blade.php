
@extends('mobile.base')

@section('content')

<div class="lmy1">
    <div class="wzy_t">
        <div class="lmy1_t">
            <h1><p> <img src="{{ url('/images/mobile/pic55.png') }}"></p>
                当前位置：<a href="{{route('mobile.home')}}">首页</a> &gt; <a href="{{route('mobile.paper.list',['top_type' => $data->paperType->topType->id])}}">{{ $data->paperType->topType->name }}</a> &gt;
            </h1>
        </div>
        <div class="wzy">
            <div class="blank1"></div>
            <h2>{{ $data->title }}</h2>
            <div class="blank1"></div>
            <h3>关键词：<span>{{ $data->keyword }}</span> <br>
                浏览量：<span>{{$data->browse}}</span> 时间：<span>{{ $data->release_time }}</span>
            </h3>

            <div class="blank1"></div>
            <div class="nrbody">{!! $data->content !!}</div>
        </div>
    </div>
</div>
    @endsection