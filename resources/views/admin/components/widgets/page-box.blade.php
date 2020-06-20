
@if( editing('push_mode') == 1 )
    <div class="top-div" style="">
        <div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
        @include('components.form-input.text', ['field' => 'top_title', 'label' => '顶部标题', 'class' => 'col-sm-4 ',])
        <div class="clearfix"></div>
        @include('components.widgets.news-textarea' ,['field' => 'top_content','label' => '顶部内容' ,'class' => 'col-sm-5'])
    </div>
    <div class="msg-div" style="">

        <div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
        @include('components.form-input.select', ['field' => "msg_type", 'label' => '消息中心类型', 'class' => 'col-sm-4', 'values' => \App\Presenters\NewsPresenter::getType(), ])
        @include('components.form-input.text', ['field' =>'msg_title', 'label' => '消息中心标题', 'class' => 'col-sm-4',])
        <div class="clearfix"></div>
        @include('components.widgets.news-textarea' ,['field' =>'msg_content','label' => '消息中心内容' ,'class' => 'col-sm-5'])

        <div class="clearfix"></div>
        @include('components.form-input.dropzone', ['id' => 'modal-uploader', 'field'=>'file','label'=>'图片上传' ,'type'=>'news' ,'class'=>'col-lg-5 news-push'])
    </div>

@else

    <div class="top-div" style="{{ editing('push_mode') == 2 ? "display: block" : "display: none"}}">
        <div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
        @include('components.form-input.text', ['field' => 'top_title', 'label' => '顶部标题', 'class' => 'col-sm-4 ',])
        <div class="clearfix"></div>
        @include('components.widgets.news-textarea' ,['field' => 'top_content','label' => '顶部内容' ,'class' => 'col-sm-5'])
    </div>
    <div class="msg-div" style="{{ editing('push_mode') == 3 ? "display: block" : "display: none"}}">

        <div class="clearfix"></div><hr style="height:1px;border:none;border-top:1px dashed #5e5e5e;"/>
        @include('components.form-input.select', ['field' => "msg_type", 'label' => '消息中心类型', 'class' => 'col-sm-4', 'values' => \App\Presenters\NewsPresenter::getType(), ])
        @include('components.form-input.text', ['field' =>'msg_title', 'label' => '消息中心标题', 'class' => 'col-sm-4',])
        <div class="clearfix"></div>
        @include('components.widgets.news-textarea' ,['field' =>'msg_content','label' => '消息中心内容' ,'class' => 'col-sm-5'])

        <div class="clearfix"></div>
        @include('components.form-input.dropzone', ['id' => 'modal-uploader', 'field'=>'file','label'=>'图片上传' ,'type'=>'news' ,'class'=>'col-lg-5 news-push'])
    </div>
@endif

