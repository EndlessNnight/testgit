<form class="form-inline promotion-list-filter">

  <input type="hidden" name="type" value="{{ $type }}" />

  <div class="form-group">
    <label for="operator_id">运营商</label>
    @set($old_value, data_get($filter, "$type.operator_id"))
    <select id="operator_id" name="operator_id" class="form-control select2-input" data-placeholder="请选择">
      <option></option>
      @foreach($operators as $value => $key)
        <option value="{{ $value }}"{{ $old_value == $value ? ' selected' : '' }}>{{ $key }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="region_id">区域</label>
    @set($old_value, data_get($filter, "$type.region_id"))
    <select id="region_id" name="region_id" class="form-control select2-region-input" data-placeholder="请选择">
      <option></option>
      @foreach($provinces as $p)
        <option data-level="1" data-has-children="{{ count($p['cities']) > 0 }}" value="{{ $p['id'] }}"{{ $old_value == $p['id'] ? ' selected' : '' }}>{{ $p['name'] }}</option>
        @foreach($p['cities'] as $c)
          <option data-level="2" data-has-children="{{ count($c['districts']) > 0 }}" value="{{ $c['id'] }}"{{ $old_value == $c['id'] ? ' selected' : '' }}>{{ $c['name'] }}</option>
          @foreach($c['districts'] as $d)
            <option data-level="3" value="{{ $d['id'] }}"{{ $old_value == $d['id'] ? ' selected' : '' }}>{{ $d['name'] }}</option>
          @endforeach
        @endforeach
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="ad_space">广告位置</label>
    @set($old_value, data_get($filter, "$type.ad_space"))
    <select id="ad_space" name="ad_space" class="form-control select2-input" data-placeholder="请选择">
      <option></option>
      @foreach (\App\Presenters\BannerPresenter::getAdSpaceOptions() as $value => $key)
        <option value="{{ $value }}"{{ is_numeric($old_value) && ($old_value == $value) ? ' selected' : '' }}>{{ $key }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="ad_status">广告状态</label>
    @set($old_value, data_get($filter, "$type.ad_space"))
    <select id="ad_status" name="ad_status" class="form-control select2-input" data-placeholder="请选择">
      <option></option>
      @foreach (\App\Presenters\BannerPresenter::getAdStatusOptions() as $value => $key)
        <option value="{{ $value }}"{{ is_numeric($old_value) && ($old_value == $value) ? ' selected' : '' }}>{{ $key }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group ts_select_timespan">
    <label for="start_time" class="ts_select_from_label">生效时间</label>
    @set($old_value, data_get($filter, "$type.start_time"))
    <div class='input-group ts_select_from'>
      <input type='text' id="start_time" name="start_time" class="form-control date datetimepicker" value="{{ $old_value }}" />
      <span class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </span>
    </div>
    <label for="end_time" class="ts_select_to_label">至</label>
    @set($old_value, data_get($filter, "$type.end_time"))
    <div class='input-group ts_select_to'>
      <input type='text' id="end_time" name="end_time" class="form-control date datetimepicker" value="{{ $old_value }}" />
      <span class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </span>
    </div>
  </div>

  <button type="submit" class="btn btn-primary pull-right">筛选</button>
</form>

