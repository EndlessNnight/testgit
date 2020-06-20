@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="page-header">
                <span>收录管理</span>

                <a class="btn btn-primary btn-sm pull-right" data-backdrop="false"  data-toggle="modal" data-target="#employ-editor" data-load-url="{{ route('admin.employ.editor',['id' => 0]) }}">
                    <i class="fa fa-plus"></i> 添加
                </a>
            </div>
        </div>
        @include('admin.employ.detail',['show_data' => $data])

        <div class="modal fade" id="employ-editor" >
            <div class="modal-dialog">
                @include('admin.employ.editor')
            </div>
        </div>

    </section>

@endsection
