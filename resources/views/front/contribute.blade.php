
@extends('front.public.inside')

@section('head')
    <script src="{{ url('/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

@endsection

@section('right-con')
    @include('front.public.type-items',['default' => '在线投稿'])

    @include('front.public.contribute',['file' => $file_data,'class' => 'per_input'])
@endsection
