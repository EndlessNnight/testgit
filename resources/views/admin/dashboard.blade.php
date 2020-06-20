@extends('admin.base')



@section('body-class', 'hold-transition skin-blue sidebar-mini')

@section('app')

    @include('admin.layout.header')
    @include('admin.layout.aside')
    @include('admin.layout.content')
    @include('admin.layout.footer')

@endsection
