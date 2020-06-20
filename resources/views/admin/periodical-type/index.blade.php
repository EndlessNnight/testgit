@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
@endpush


@section('content')
    <section class="content">
        <form class="form-inline promotion-list-filter" method="get" action="{{ route('admin.periodical.type') }}">
            <div class="form-group" >
                <label for="pid">选择分类</label>
                <select id="pid" name="pid" class="form-control select2-input" style="width: 200px;">
                    <option value="0">全部分类</option>
                    @foreach ($topType as $key => $value)
                        <option value="{{ $value['id'] }}" {{ (isset($pid) && $value['id'] == $pid)  ? ' selected' : '' }} >&nbsp;&nbsp;{{ "&nbsp;&nbsp;".$value['name'] }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">筛选</button>
            </div>

            <a class="btn btn-primary btn-sm pull-right" style="margin-right: 15px;" data-backdrop="false" data-toggle="modal" data-target="#type-editor" data-load-url="{{ route('admin.periodical.typeEditor',['id' => 0]) }}">
                <i class="fa fa-plus"></i> 添加
            </a>
        </form>

        @include('admin.periodical-type.detail',['show_data' => $topType,'data' => $data])

        <div class="modal fade" id="type-editor">
            <div class="modal-dialog">
                @include('admin.periodical-type.editor')
            </div>
        </div>
    </section>

@endsection
