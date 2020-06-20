@push('head')
@include('libraries.datetimepicker')
@endpush
<form class="clearfix" method="post" action="{{ route('sign.store')}}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">{{ editing() ?  '编辑' : '添加' }} 签到任务</h4>
    </div>
    <div class="modal-body clearfix">
        {{ csrf_field() }}
        @include('components.form-input.id', ['field' => 'id', ])
        @include('components.form-input.text', ['field' => 'task_name', 'label' => '任务名称', 'class' => 'col-sm-10', ])
        @include('components.form-input.text', ['field' => 'task_day', 'label' => '任务天数', 'class' => 'col-sm-10', ])
        @include('components.form-input.text', ['field' => 'prize_name', 'label' => '奖品名称', 'class' => 'col-sm-10', ])
        @include('components.form-input.text', ['field' => 'specification', 'label' => '奖品规格', 'class' => 'col-sm-10', ])
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>
<script>

    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        extraFormats: ['YYYY-MM-DD  HH:mm:ss'],
        useStrict: true,
        useCurrent: false,
        showClose: true,
        showClear: true
    });
    ;
</script>