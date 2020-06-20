@extends('mobile.base')

@section('content')
<div class="lmy1">
    <div class="lmy1_t">
        <h1><p> <img src="{{ url('/images/mobile/pic55.png') }}"></p>
            当前位置：<a href="{{route('mobile.home')}}">首页</a> &gt;
            <a href="{{route('mobile.paper.list',['top_type' => $typeInfo->id??''])}}"> @if(!empty($typeInfo)) {{ $typeInfo->name }}</a> @else 论文列表 @endif &gt;
        </h1>
        <ul class="lmy1_t2">
            @foreach($papers as $paper)
            <li class="paper-list">
                <p>
                    <img src="{{ url('/images/mobile/pic74.png') }}">{{$paper->browse}}人浏览</p> <i><img src="{{ url('/images/mobile/pic73.png') }}"></i>
                <a href="{{ route('mobile.paper.content',['id' => $paper->id]) }}">{{$paper->title}}</a>
            </li>
            @endforeach

        </ul>
        <div class="blank2"></div>
        <div class="skil_c2">{{ $papers->links() }}</div>
    </div>
</div>
    @endsection