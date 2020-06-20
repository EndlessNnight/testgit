@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '杂志介绍'])
    <div style="line-height:25px; padding:15px">
        @if(!empty($data['synopsis']))<div class="intro">
	《{{$data['name']}}》杂志介绍 </div>
        <div class="pad100 s14">{!! $data['synopsis'] !!}</div>
	@endif
        @if(!empty($data['employ_impact']))
	<div class="intro">《{{$data['name']}}》收录情况/影响因子 </div>
        <div class="pad100 s14">{!! $data['employ_impact'] !!}</div>
	@endif
        @if(!empty($data['columns']))
	<div class="intro">《{{$data['name']}}》栏目设置 </div>
        <div class="pad100 s14">{!! $data['columns'] !!}</div>
	@endif
        @if(!empty($data['demand']))
	<div class="intro">《{{$data['name']}}》征稿要求 </div>
        <div class="pad100 s14">{!! $data['demand'] !!}</div>
	@endif
    </div>
@endsection
