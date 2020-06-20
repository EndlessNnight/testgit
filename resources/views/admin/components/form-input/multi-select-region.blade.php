<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <select id="{{ $field }}" name="{{ php_data_key($field) }}[]" class="form-control select2-region-input" multiple="multiple" style="width: 100%"{{ isset($decorator) ? ' '.$decorator : '' }}>
    @set($old_value, old($field, editing($field)))
    @set($old_value, is_array($old_value) ? $old_value : [] )
    @foreach($provinces as $p)
      <option data-level="1" data-has-children="{{ count($p['cities']) > 0 }}" value="{{ $p['id'] }}" {{ in_array($p['id'], $old_value) ? ' selected' : '' }}>{{ $p['name'] }}</option>
      @foreach($p['cities'] as $c)
        <option data-level="2" data-has-children="{{ count($c['districts']) > 0 }}" value="{{ $c['id'] }}"{{ in_array($c['id'], $old_value) ? ' selected' : '' }}>{{ $c['name'] }}</option>
        @foreach($c['districts'] as $d)
          <option data-level="3" value="{{ $d['id'] }}"{{ in_array($d['id'], $old_value) ? ' selected' : '' }}>{{ $d['name'] }}</option>
        @endforeach
      @endforeach
    @endforeach
  </select>
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
