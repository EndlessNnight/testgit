@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
    @include('admin.libraries.editors')
@endpush


@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="page-header">
                <span>{{ !empty($data['id']) ?  '编辑' : '添加' }}论文</span>

            </div>
        </div>

        <div class="box-body" style="width: 1000px;">
            <form class="form-horizontal" id="news_form" method="post" action="{{ route('admin.paper.store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $data['id'] or '' }}">

                    @include('admin.components.editor-form.text',['field' => 'title','label' => '标题','class' => 'col-sm-8','validate' => 'required','default' => isset($data['title'])?$data['title']:'' ])

                    <div class="clearfix"></div>
                    @include('admin.components.editor-form.text',['field' => 'browse','label' => '浏览量','class' => 'col-sm-8','validate' => 'required','default' => isset($data['browse'])?$data['browse']:'' ])
                    <div class="clearfix"></div>
                    @include('admin.components.editor-form.relation-select',['field' => 'type','label' => '论文分类','class' => 'col-sm-12','list' => $typeList,'old' => $now_type])
                    <div class="clearfix"></div>
                    @include('admin.components.editor-form.select',['field' => 'recommend','label' => '是否推荐','class' => 'col-sm-12','list' => [0 => '不推荐',1=>'推荐'],'old' => isset($data['recommend'])?$data['recommend']:0])
                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.datetime',['field' => 'release_time','label' => '发布时间','class' => 'col-sm-8','default' => isset($data['release_time'])?$data['release_time']:date('Y-m-d')])

                    @include('admin.components.editor-form.text',['field' => 'keyword','label' => '关键词','class' => 'col-sm-10','placeholder' => '可为空，多个关键词用“ ”隔开。 例如：新闻 资讯','default' => isset($data['keyword'])?$data['keyword']:''])
                    @include('admin.components.editor-form.textarea',['field' => 'description','label' => '简介','class' => 'col-sm-12','placeholder' => '新闻简介，可为空。 ','default' => isset($data['description'])?$data['description']:''])
                    @include('admin.components.editor-form.editor',['field' => 'content','label' => '论文内容','class' => 'col-sm-12','default' => isset($data['content'])?$data['content']:''])
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-primary btn-lg submit" >立即保存</button>
                </div>
            </form>
        </div>
    </section>

    <script>

        $('.datepicker').datepicker({
            autoclose: true
        })
        $(".submit").click(function () {
            if(checkInput($("#title"))){
                $("#title").parents('.form-group').removeClass('has-error');
                $("#news_form").submit();
            }else{
                $('html').scrollTop(0);
            }
        })

    </script>
@endsection


@push('head')
    @include('admin.libraries.datepicker')
@endpush

