@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="page-header">
                <span>设置内容</span>

                <a class="btn btn-primary btn-sm pull-right" data-backdrop="false" data-toggle="modal" data-target="#periodical-editor" data-load-url="{{ route('admin.periodical.editor',['id' => 0]) }}">
                    <i class="fa fa-plus"></i> 添加
                </a>
            </div>
        </div>
        @include('admin.setting.detail',['show_data' => $settings])

        <div class="modal fade" id="setting-editor" >
            <div class="modal-dialog">
                @include('admin.setting.editor')
            </div>
        </div>
    </section>
@endsection
