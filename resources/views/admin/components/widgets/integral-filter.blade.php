<form class="form-inline promotion-list-filter pull-left">

    <div class="form-group">
        <label for="task_patter">任务模式</label>
        <select id="task_patter" name="task_patter" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach( \App\Models\IntegralTasks::$PATTER as $value => $key)
                <option value="{{ $value }}"{{ $patter == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="type_jump">任务模块</label>
        <select id="type_jump" name="task_modular" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach (\App\Models\IntegralTasks::$MODULAR as $value => $key)
                <option value="{{ $value }}"{{  $modular == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="type_jump">任务类型</label>
        <select id="type_jump" name="task_type" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach ($task_type  as $value => $key)
                <option value="{{ $value }}"{{  $modular == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>
    @if($type == 'all-list')
    <div class="form-group">
        <label for="status">任务状态</label>
        <select id="status" name="task_statue" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach (\App\Models\IntegralTasks::$TASK_STATUE as $value => $key)
                <option value="{{ $value }}"{{ $task_t == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>
    @endif

    {{--<div class="form-group ts_select_timespan">--}}
        {{--<label for="start_time" class="ts_select_from_label">创建时间</label>--}}

        {{--<div class='input-group ts_select_from'>--}}
            {{--<input type='text' id="start_time" name="start_time" class="form-control date datetimepicker" value="" />--}}
            {{--<span class="input-group-addon">--}}
        {{--<i class="fa fa-clock-o"></i>--}}
      {{--</span>--}}
        {{--</div>--}}
        {{--<label for="end_time" class="ts_select_to_label">至</label>--}}
        {{--<div class='input-group ts_select_to'>--}}
            {{--<input type='text' id="end_time" name="end_time" class="form-control date datetimepicker" value="" />--}}
            {{--<span class="input-group-addon">--}}
        {{--<i class="fa fa-clock-o"></i>--}}
      {{--</span>--}}
        {{--</div>--}}
    {{--</div>--}}

    <button type="submit" class="btn btn-primary pull-right">筛选</button>
</form>

<script>
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        extraFormats: ['YYYY-MM-DD HH:mm:ss'],
        useStrict: true,
        useCurrent: false,
        showClose: true,
        showClear: true
    });
</script>

