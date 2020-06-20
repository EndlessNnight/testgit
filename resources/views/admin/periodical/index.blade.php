@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
    <link rel="stylesheet" href="{{ url('/admin/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ url('/admin/css/fileinput.min.css') }}">
    <script src="{{ url('/admin/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ url('/admin/js/fileinput.min.js') }}"></script>
    <script src="{{ url('/admin/js/fileinput_locale_zh.js') }}"></script>


@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="page-header">
                <span>期刊管理</span>

                <a class="btn btn-primary btn-sm pull-right" data-backdrop="false" data-toggle="modal" data-target="#periodical-editor" data-load-url="{{ route('admin.periodical.editor',['id' => 0]) }}">
                    <i class="fa fa-plus"></i> 添加
                </a>
            </div>
        </div>
        @include('admin.periodical.detail',['show_data' => $data])

        <div class="modal fade" id="periodical-editor">
            <div class="modal-dialog">
                @include('admin.periodical.editor')
            </div>
        </div>

        <div class="modal fade" id="covers-editor">
            <div class="modal-dialog">
                @include('admin.periodical.covers')
            </div>
        </div>

    </section>

@endsection
