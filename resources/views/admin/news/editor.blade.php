@extends('admin.dashboard')

@push('head')
    @include('admin.scripts.modal-editor')
    @include('admin.libraries.editors')
    <link rel="stylesheet" href="{{ url('/admin/plugins/iCheck/all') }}.css">
    <script src="{{ url('/admin/plugins/iCheck/icheck.min.js') }}"></script>
@endpush


@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="page-header">
                <span>{{ !empty($data['id']) ?  '编辑' : '添加' }}新闻</span>

            </div>
        </div>

        <div class="box-body" style="width: 1000px;">
            <form class="form-horizontal" id="news_form" method="post" action="{{ route('admin.news.store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $data['id'] or '' }}">

                    @include('admin.components.editor-form.text',['field' => 'title','label' => '标题','class' => 'col-sm-8','validate' => 'required','default' => isset($data['title'])?$data['title']:'' ])


                    <div class="clearfix"></div>
                    <div class="form-group"  style="margin-left: 0">
                        <div id="recommend">
                            <label for="recommend">是否推荐</label>
                            <div class="clearfix" style="margin-bottom: 5px;"></div>
                            @foreach(\App\Models\Admin\News::$recommend as $v => $name)
                                <label>
                                    <input type="checkbox" id="recommend_{{$v}}" name="recommend" value="{{$v}}" class="minimal" @if(!empty($data['recommend']) && $v == $data['recommend']) checked @endif> {{ $name }}
                                </label><br>
                            @endforeach
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.img-input',['field' => 'recommend_img','title' => '首页广告推荐图片(勾选推荐后有效)',
                    'class' => 'col-sm-10','type' => 'images','value' => isset($data->recommend_img)?$data->recommend_img:'',
                    'img_class' => 'news_recommend_img',
                    'info' => '* 图片类型：png | gif | jpeg | jpg <br/>* 图片大小：360*250 <br/>* 大小不得超过2M'])

                    <div class="clearfix"></div>
                    <div class="form-group" style="margin: 0 0 15px 0;">
                        <label for="type">新闻分类</label>
                        <select id="type" name="type" class="form-control select2-input" style="width: 200px;">
                            @foreach ($news_type as $value => $key)
                                <option value="{{ $value }}" {{ (isset($data['type']) && $value == $data['type'])  ? ' selected' : '' }} >{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.text',['field' => 'browse','label' => '浏览量','class' => 'col-sm-8','validate' => 'required','default' => isset($data['browse'])?$data['browse']:'' ])

                    <div class="clearfix"></div>

                    @include('admin.components.editor-form.datetime',['field' => 'release_time','label' => '发布时间','class' => 'col-sm-8','default' => isset($data['release_time'])?$data['release_time']:date('Y-m-d')])

                    @include('admin.components.editor-form.text',['field' => 'keyword','label' => '关键词','class' => 'col-sm-10','placeholder' => '可为空，多个关键词用“ ”隔开。 例如：新闻 资讯','default' => isset($data['keyword'])?$data['keyword']:''])
                    @include('admin.components.editor-form.textarea',['field' => 'description','label' => '简介','class' => 'col-sm-12','placeholder' => '新闻简介，可为空。 ','default' => isset($data['description'])?$data['description']:''])
                    @include('admin.components.editor-form.editor',['field' => 'content','label' => '新闻内容','class' => 'col-sm-12','default' => isset($data['content'])?$data['content']:''])
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-primary btn-lg submit" >立即保存</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })

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

