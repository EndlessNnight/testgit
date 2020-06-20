@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
    @include('admin.libraries.editors')
@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="page-header">
                <span>论文管理</span>

                <a class="btn btn-primary btn-sm pull-right" href="{{ route('admin.paper.editor') }}">
                    <i class="fa fa-plus"></i> 添加
                </a>
            </div>
        </div>
        @include('admin.paper.detail',['show_data' => $data])


    </section>

@endsection
