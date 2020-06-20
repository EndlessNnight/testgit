<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <select id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control select2-input" style="width: 100%"{{ isset($decorator) ? ' '.$decorator : '' }}>
    @set($old_value, old($field, editing($field)))
    @if (!isset($notnull))
    <option selected></option>
    @endif
    @foreach ($values as $value => $key)
    <option value="{{ $value }}"{{ ($value == $old_value) || (isset($default) && $value==$default) ? ' selected' : '' }} >{{ $key }}</option>
    @endforeach
  </select>
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
