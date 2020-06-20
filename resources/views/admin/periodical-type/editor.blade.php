<div class="modal-content "  style="width: 700px;">
    <form class="form-horizontal validate" data-action="{{ route('admin.periodical.typeStore') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ editing() ?  '编辑' : '添加' }}分类</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])
            @include('admin.components.editor-form.text',['field' => 'name','label' => '分类名称','class' => 'col-sm-8','validate' => 'required','placeholder' =>'分类名称'])

            <div class="clearfix"></div>

            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="pid">所属分类</label>
                <select id="pid" name="pid" class="form-control select2-input" style="width: 200px;">
                    <option value="0">顶级分类</option>
                    @foreach ($topType as $key => $value)
                        <option value="{{ $value['id'] }}" {{ (isset($data['pid']) && $value['id'] == $data['pid'])  ? ' selected' : '' }} >&nbsp;&nbsp;{{ "&nbsp;&nbsp;".$value['name'] }}</option>
                    @endforeach
                </select>
            </div>

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
