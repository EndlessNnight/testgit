@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
    @include('admin.libraries.editors')
@endpush


@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="page-header">
                <span>{{ !empty($data['id']) ?  '编辑' : '添加' }}单页</span>

            </div>
        </div>

        <div class="box-body validate" style="width: 1000px;">
            <form class="form-horizontal validate" id="page_form" method="post" action="{{ route('admin.page.store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $data['id'] or '' }}">

                    @include('admin.components.editor-form.text',['field' => 'name','label' => '单页名称','class' => 'col-sm-8 check','validate' => 'required','default' => isset($data['name'])?$data['name']:'' ])

                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.text',['field' => 'unique','label' => '单页链接','class' => 'col-sm-8','validate check' => 'letter','default' => isset($data['unique'])?$data['unique']:''])
                    <div class="clearfix"></div>

                    {{--@include('admin.components.editor-form.textarea',['field' => 'keyword','label' => '关键词','class' => 'col-sm-8','default' => isset($data['keyword'])?$data['keyword']:''])--}}
                    {{--<div class="clearfix"></div>--}}

                    {{--@include('admin.components.editor-form.textarea',['field' => 'description','label' => '简介','class' => 'col-sm-8','default' => isset($data['description'])?$data['description']:''])--}}
                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.editor',['field' => 'content','label' => '单页内容','class' => 'col-sm-12','default' => isset($data['content'])?$data['content']:''])
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-primary btn-lg submit" >立即保存</button>
                </div>
            </form>
        </div>
    </section>

    <script>

        var error = '{!! $error_text or '' !!}';
        if(error !== ''){
            var f = $("#unique").parents('.form-group');
            f.find('.error-show').text(error);
            f.addClass('has-error');
        }

        $(".submit").click(function () {
            if(checkInput($("#unique")) && checkInput($("#name"))){
                $("#unique").parents('.form-group').removeClass('has-error');
            }else if (checkInput($("#name"))){
                $("#name").parents('.form-group').removeClass('has-error');
            }else{
                $('html').scrollTop(0);
                return false;
            }

            $("#page_form").submit();
        })

    </script>
@endsection


