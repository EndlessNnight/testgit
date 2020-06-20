<form class="form-inline promotion-list-filter">

    <input type="hidden" name="type" value="" />

    <div class="form-group">
        <label for="operator_id">运营商</label>
        <select id="operator_id" name="operator_id" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach($operatorList  as $value)
            <option value="{{ $value['value'] }}">{{ $value['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="region_id">区域</label>
        @set($old_value, 0)
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
        <label for="app_list">标识</label>
        <select id="app_list" name="app_list" class="form-control select2-input" data-placeholder="请选择">
            <option></option>
            @foreach ($appList as $value)
                <option value="{{ $value['value'] }}" }}>{{ $value['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary pull-right">筛选</button>
</form>