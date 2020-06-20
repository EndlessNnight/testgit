<div class="modal-content ">
    <form class="form-horizontal validate" data-action="{{ route('admin.contribute.store') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ !empty($data['id']) ?  '编辑' : '添加' }}稿件</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])
            @include('admin.components.editor-form.text',['field' => 'identifier','label' => '稿件编号','class' => 'col-sm-8','disabled' => 1])
            <div class="clearfix"></div>
            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="status">稿件状态</label>
                <select id="status" name="status" class="form-control select2-input" style="width: 200px;">
                    @foreach (\App\Models\Contribute::STATUS_ARRAY as $value => $key)
                        <option value="{{ $value }}" {{ (isset($data['status']) && $value == $data['status'])  ? ' selected' : '' }} >{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="level">稿件等级</label>
                <select id="level" name="level" class="form-control select2-input" style="width: 200px;">
                    @foreach (\App\Models\Admin\Periodical::LEVEL_ARRAY as $value => $key)
                        <option value="{{ $value }}" {{ (isset($data['level']) && $value == $data['level'])  ? ' selected' : '' }} >{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="clearfix"></div>
            @include('admin.components.editor-form.relation-select',['field' => 'type_id','label' => '稿件分类','class' => 'col-sm-12','list' => $typeList,'old' => $now_type])

            <div class="clearfix"></div>
            @include('admin.components.editor-form.text',['field' => 'name','label' => '投稿人姓名','class' => 'col-sm-6','validate' => 'required'])
            @include('admin.components.editor-form.text',['field' => 'tel','label' => '投稿人电话','class' => 'col-sm-8'])
            @include('admin.components.editor-form.text',['field' => 'phone','label' => '投稿人手机','class' => 'col-sm-8'])
            @include('admin.components.editor-form.text',['field' => 'email','label' => '投稿人邮箱','class' => 'col-sm-10'])
            @include('admin.components.editor-form.textarea',['field' => 'address','label' => '寄件地址','class' => 'col-sm-12'])
            @include('admin.components.editor-form.text',['field' => 'QQ','label' => '投稿人QQ','class' => 'col-sm-8'])
            @include('admin.components.editor-form.text',['field' => 'expect_time','label' => '预期见刊时间','class' => 'col-sm-10'])

            <div class="clearfix"></div>

            {{--  1 普通投稿   2 职称、评级、毕业论文等 --}}
            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="level">投稿目的</label>
                <select id="purpose" name="purpose" class="form-control select2-input" style="width: 200px;">
                    @foreach (\App\Models\Contribute::PURPOSE_ARRAY as $value => $key)
                        <option value="{{ $value }}" {{ (isset($data['level']) && $value == $data['level'])  ? ' selected' : '' }} >{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            @include('admin.components.editor-form.textarea',['field' => 'comment','label' => '备注信息','class' => 'col-sm-12'])

            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left btn-submit" onclick="postData(this)">保存</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
        </div>
    </form>
</div>
