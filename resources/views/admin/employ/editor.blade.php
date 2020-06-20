<div class="modal-content ">
    <form class="form-horizontal validate" data-action="{{ route('admin.employ.store') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ !empty($data['id']) ?  '编辑' : '添加' }}收录</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])
            @include('admin.components.editor-form.text',['field' => 'name','label' => '收录网站名称','class' => 'col-sm-10','validate' => 'required','placeholder' =>'收录网站全名   例:中国知网数据库（CNKI）全文收录期刊'])
            @include('admin.components.editor-form.text',['field' => 'short_name','label' => '网站短名称','class' => 'col-sm-8','validate' => 'required','placeholder' =>'收录网站短名称   如:知网'])
{{--            @include('admin.components.editor-form.text',['field' => 'reorder','label' => '排序(越小越靠前)','class' => 'col-sm-8','validate' => 'reorder','placeholder' =>'范围0~100 值越小越靠前'])--}}

            <div class="clearfix"></div>
            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="reorder">排序(越小越靠前)</label>
                <select id="reorder" name="reorder" class="form-control select2-input" style="width: 200px;">
                    @for ($i=0;$i<=100;$i++)
                        <option value="{{ $i }}" {{ (isset($data['reorder']) && $i == $data['reorder'])  ? ' selected' : '' }} >{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left btn-submit" onclick="postData(this)">保存</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
        </div>
    </form>
</div>
