@extends('mobile.base')

@section('content')

        <div class="lmy1">
            <div class="lmy1_t">
                <h1><p> <img src="{{ url('/images/mobile/pic55.png') }}"></p>
                    当前位置：<a href="{{route('mobile.home')}}">首页</a> &gt;
                    <a href="{{route('mobile.periodical',['top_type' => $typeInfo->id??''])}}"> @if(!empty($typeInfo)) {{ $typeInfo->name }}</a> @else 期刊发表 @endif </a> &gt;
                </h1>
            </div>
            <div class="zjy1 pl_nr">
            @foreach($periodical as $per)
                <dl>
                    <dt class="left"> <a href="#"> <img width="180" height="250"  src="{{$per['img_url']}}"></a> </dt>
                    <dd class="right"> <h2>《{{$per['name']}}》</h2>
                        <div class="blank"></div>
                        <p style="overflow: hidden;white-space: normal; text-overflow: ellipsis"> 简介: {{mb_substr($per['synopsis'], 0, 85)}}……</p>
                        <div class="blank"></div>
                        <h4> <a href="{{route('mobile.periodical.content',['unique' => $per['unique'] ])}}">查看详情</a> </h4>
                    </dd>
                </dl>
            @endforeach
                <div class="blank2"></div>
                <div class="skil_c2">{{$periodical->links()}}</div>
            </div>
        </div>
@endsection