<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <select id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control select2-region-input" style="width: 100%"{{ isset($decorator) ? ' '.$decorator : '' }}>
    @set($old_value, old($field, editing($field)))
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
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
