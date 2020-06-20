<div class="modal-content "  style="width: 700px;">
    <form class="form-horizontal validate" data-action="{{ route('admin.periodical.store') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ editing() ?  '编辑' : '添加' }}期刊</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])

            @include('admin.components.editor-form.text',['field' => 'name','label' => '期刊名称','class' => 'col-sm-8','validate' => 'required','placeholder' =>'期刊名称'])
            @include('admin.components.editor-form.text',['field' => 'unique','label' => '唯一标示(链接显示名称)','class' => 'col-sm-8','validate' => 'letter','placeholder' =>'刊物首拼'])

            <div class="clearfix"></div>
            @include('admin.components.editor-form.img-input',['field' => 'img_url','title' => '期刊封面',
            'class' => 'col-sm-10','validate' => 'required','type' => 'images','value' => isset($data->img_url)?$data->img_url:'',
            'img_class' => 'periodical_img',
            'info' => '* 图片类型：png | gif | jpeg | jpg <br/>* 图片大小：800*1078 或 同比例<br/>* 大小不得超过2M'])

            <div class="clearfix"></div>
            @include('admin.components.editor-form.check',['field' => 'recommend','label' => '推荐位置','class' => 'col-sm-12 recommend','value' => $recommendData])
            <div class="clearfix"></div>

            @include('admin.components.editor-form.img-input',['field' => 'recommend_img','title' => '首页广告推荐图片(勾选首页广告推荐后有效)',
            'class' => 'col-sm-10','type' => 'images','value' => isset($data->recommend_img)?$data->recommend_img:'',
            'img_class' => 'recommend_img',
            'info' => '* 图片类型：png | gif | jpeg | jpg <br/>* 图片大小：960*90 <br/>* 大小不得超过2M'])

            <div class="clearfix"></div>

            <div class="form-group" style="margin: 0 0 15px 0;">
                <label for="level">期刊等级</label>
                <select id="level" name="level" class="form-control select2-input" style="width: 200px;">
                    @foreach (\App\Models\Admin\Periodical::LEVEL_ARRAY as $value => $key)
                        <option value="{{ $value }}" {{ (isset($data['level']) && $value == $data['level'])  ? ' selected' : '' }} >{{ $key }}</option>
                    @endforeach
                </select>
            </div>

            <div class="clearfix"></div>
            @include('admin.components.editor-form.relation-select',['field' => 'type_id','label' => '期刊分类','class' => 'col-sm-12','list' => $typeList,'old' => $now_type])
            <div class="clearfix"></div>

            @include('admin.components.editor-form.text',['field' => 'responsible','label' => '主管单位','class' => 'col-sm-8',])
            @include('admin.components.editor-form.text',['field' => 'sponsor','label' => '主办单位','class' => 'col-sm-8',])
            @include('admin.components.editor-form.text',['field' => 'international_ornp','label' => '国际刊号','class' => 'col-sm-8',])
            @include('admin.components.editor-form.text',['field' => 'internal_ornp','label' => '国内刊号','class' => 'col-sm-8',])
            @include('admin.components.editor-form.text',['field' => 'postal_code','label' => '邮发代号','class' => 'col-sm-8',])
            <div class="clearfix"></div>

            @include('admin.components.editor-form.check',['field' => 'employ_web','label' => '收录网站','class' => 'col-sm-12','value' => $employData])
            <div class="clearfix"></div>

            @include('admin.components.editor-form.textarea',['field' => 'synopsis','label' => '杂志介绍','class' => 'col-sm-12',])
            @include('admin.components.editor-form.textarea',['field' => 'employ_impact','label' => '收录情况/影响因子','class' => 'col-sm-12',])
            @include('admin.components.editor-form.textarea',['field' => 'columns','label' => '栏目设置','class' => 'col-sm-12',])
            @include('admin.components.editor-form.textarea',['field' => 'demand','label' => '征稿要求','class' => 'col-sm-12',])

            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left btn-submit" onclick="postData(this)">保存</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
        </div>
    </form>

</div>

