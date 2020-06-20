<div class="modal-content ">
    <form class="form-horizontal validate" data-action="{{ route('admin.setting.store') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">设置内容</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])
            @include('admin.components.editor-form.text',['field' => 'identify','label' => '唯一标示','class' => 'col-sm-8','disabled'=>1,''])
            @include('admin.components.editor-form.text',['field' => 'name','label' => '设置项','class' => 'col-sm-8','disabled'=>1])
            @include('admin.components.editor-form.text',['field' => 'synopsis','label' => '说明','class' => 'col-sm-8','disabled'=>1])
            @include('admin.components.editor-form.textarea',['field' => 'content','label' => '配置内容','class' => 'col-sm-10','validate' => 'required'])
            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left btn-submit" onclick="postData(this)">保存</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
        </div>
    </form>
</div>
