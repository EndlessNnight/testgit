@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '在线投稿'])
    @include('front.public.contribute')
@endsection
