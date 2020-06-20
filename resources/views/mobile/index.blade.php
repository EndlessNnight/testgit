@extends('mobile.base')

@section('content')

    {{-- 期刊&论文 分类 --}}
    @if(!empty($topType))
    <div class="one">
        <dl class="one_mar1">
            <dt class="left"> <img src="{{ url('/images/mobile/pic9.png') }}"></dt>
            <dd class="right" style="height: auto;">
                @foreach($topType as $k => $type)
                    <p> <a href="{{route('mobile.periodical.list',['top_type' => $type->id])}}">{{ $type->name }}</a> </p>
                    @if($k >= 5)
                        @break
                    @endif
                @endforeach
            </dd>
        </dl>
        <div class="blank"></div>
        <dl class="one_mar2">
            <dt class="left"> <img src="{{ url('/images/mobile/pic10.png') }}"></dt>
            <dd class="right" style="height: auto;">
                @foreach($topType as $type)
                    @if($loop->index <= 2)
                        @continue
                    @endif
                    <p> <a href="{{route('mobile.paper.list',['top_type' => $type->id])}}">{{ $type->name }}</a> </p>
                    @if($loop->index >= 8)
                        @break
                    @endif
                @endforeach
            </dd>
        </dl>

        <div class="blank"></div>
    </div>
    @endif
    <div class="blank2"></div>

    {{--  期刊推荐 --}}
    @if(!empty($recommend))
    <div class="two">
        <div class="two_t">
            <h1>推荐期刊</h1>
            <p> <a href="{{route('mobile.periodical.list')}}"> <img src="{{ url('/images/mobile/pic13.png') }}"></a> </p>
        </div>
        @foreach($recommend as $per)
            <dl>
                <dt class="left"> <a href="{{route('mobile.periodical.content',['id' => $per['unique']])}}"> <img width="180" height="250"  src="{{$per['img_url']}}"></a> </dt>
                <dd class="right"> <h1>《{{$per['name']}}》</h1>
                    <div class="blank"></div>
                    <p style="overflow: hidden;white-space: normal; text-overflow: ellipsis"> 简介: {{mb_substr($per['synopsis'], 0, 85)}}……</p>
                    <div class="blank"></div>
                    <h3> <a href="{{route('mobile.periodical.content',['id' => $per['unique'] ])}}">查看详情</a> </h3>
                </dd>
            </dl>
        @endforeach
    </div>
    @endif

    {{-- 最新论文 --}}
    @if(!empty($papers))
    <section style="background: none;">
        <div id="lw_box">
            <div class="lw_list">
                <h5><span>最新论文</span></h5>
                <a class="more" href="{{ route('mobile.paper.list') }}">更多</a>
                <ul>
                    @foreach($papers as $paper)
                    <li class="paper-list">
                        <a href="{{ route('mobile.paper.content',['id' => $paper->id]) }}"
                           >· {{$paper->title}}</a><span>{{$paper->release_time}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif


@endsection