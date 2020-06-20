<form class="form-inline promotion-list-filter pull-left">


    <div class="form-group">
        <label for="push_mode">推送方式</label>
        <select id="push_mode" name="push_mode" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach( \App\Presenters\NewsPresenter::getPush() as $value => $key)
                <option value="{{ $value }}"{{ $push_mode == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>

    {{--<div class="form-group">--}}
        {{--<label for="region_id">人群</label>--}}
        {{--<select id="region_id" name="region_id" class="form-control select2-region-input" data-placeholder="请选择">--}}
            {{--<option></option>--}}
            {{--@foreach($provinces as $p)--}}
                {{--<option data-level="1" data-has-children="{{ count($p['cities']) > 0 }}" value="{{ $p['id'] }}"{{ $old_value == $p['id'] ? ' selected' : '' }}>{{ $p['name'] }}</option>--}}
                {{--@foreach($p['cities'] as $c)--}}
                    {{--<option data-level="2" data-has-children="{{ count($c['districts']) > 0 }}" value="{{ $c['id'] }}"{{ $old_value == $c['id'] ? ' selected' : '' }}>{{ $c['name'] }}</option>--}}
                    {{--@foreach($c['districts'] as $d)--}}
                        {{--<option data-level="3" value="{{ $d['id'] }}"{{ $old_value == $d['id'] ? ' selected' : '' }}>{{ $d['name'] }}</option>--}}
                    {{--@endforeach--}}
                {{--@endforeach--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}

    <div class="form-group">
        <label for="type_jump">跳转方式</label>
        <select id="type_jump" name="type_jump" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach (\App\Presenters\NewsPresenter::Push() as $value => $key)
                <option value="{{ $value }}"{{  $type_jump == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">发送状态</label>
        <select id="status" name="status" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach (\App\Presenters\NewsPresenter::getState() as $value => $key)
                <option value="{{ $value }}"{{ $state == $value ? ' selected' : '' }}>{{ $key }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group ts_select_timespan">
        <label for="start_time" class="ts_select_from_label">创建时间</label>

        <div class='input-group ts_select_from'>
            <input type='text' id="start_time" name="start_time" class="form-control date datetimepicker" value="" />
            <span class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </span>
        </div>
        <label for="end_time" class="ts_select_to_label">至</label>
        <div class='input-group ts_select_to'>
            <input type='text' id="end_time" name="end_time" class="form-control date datetimepicker" value="" />
            <span class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </span>
        </div>
    </div>

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

