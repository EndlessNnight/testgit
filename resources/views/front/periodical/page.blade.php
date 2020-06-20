@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => $page['name']])
    <div style="line-height:25px; padding:15px">
        {!! str_replace('{%name}',$data['name'],$page['content']) !!}
    </div>
@endsection
