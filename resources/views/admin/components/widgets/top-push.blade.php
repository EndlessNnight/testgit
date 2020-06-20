<div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
@include('components.form-input.text', ['field' => 'top_title', 'label' => '顶部标题', 'class' => 'col-sm-4 ',])
<div class="clearfix"></div>
@include('components.widgets.news-textarea' ,['field' => 'top_content','label' => '顶部内容' ,'class' => 'col-sm-5'])

@if($type == "draft-list")
    <div class="clearfix"></div>
    @include('components.form-input.text', ['field' => 'link', 'label' => '跳转地址', 'class' => 'col-sm-4',])
@endif()
