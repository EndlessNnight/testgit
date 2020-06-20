<div class="form-group{{  $errors->has($field) ? ' has-error' : ''  }} col-sm-10" id="region-select">
    <label for="region_province">省份</label>
    <select id="region_province" style="width:20%" data-url="{{route('region.province')}}" name="region_province"
            data-value="{{old('province_id', editing('province_id', 0))}}" class="province form-control select2-input"
            data-placeholder="请选择">
        <option></option>
    </select>
    <label for="region_city">城市</label>
    <select id="region_city" style="width:20%" data-url="{{route('region.city')}}" name="region_city"
            data-value="{{old('province_id', editing('city_id', 0))}}" class="city form-control select2-input"
            data-placeholder="请选择">
        <option></option>
    </select>
    <label for="region_districts">区县</label>
    <select id="region_districts" style="width:20%" data-url="{{route('region.districts')}}" name="region_districts"
            class="districts form-control select2-input" data-placeholder="请选择">
        <option></option>
    </select>

    @if ($errors->has($field))
        <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
    </span>
    @endif
</div>

