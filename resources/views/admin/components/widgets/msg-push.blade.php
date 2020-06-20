<div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
@include('components.form-input.select', ['field' => "msg_type", 'label' => '消息中心类型', 'class' => 'col-sm-4', 'values' => \App\Presenters\NewsPresenter::getType(), ])
<div class="clearfix"></div>
@include('components.form-input.text', ['field' => 'msg_title', 'label' => '消息中心标题', 'class' => 'col-sm-4',])
<div class="clearfix"></div>
@include('components.widgets.news-textarea' ,['field' => 'msg_content','label' => '消息中心内容' ,'class' => 'col-sm-5'])
@if($type != "draft-list")
    <div class="clearfix"></div>
    @include('components.widgets.msg-dropzone', ['id' => 'modal-uploader', ])
@endif()

{{--<div class="clearfix"></div>--}}
{{--@include('components.form-input.text', ['field' => 'top_title', 'label' => '消息有效期', 'class' => 'col-sm-2 ',])--}}

@if($type != "draft-list")
    <div class="clearfix"></div>
    @include('components.form-input.text', ['field' => 'link', 'label' => '跳转地址', 'class' => 'col-sm-4',])
@endif()

