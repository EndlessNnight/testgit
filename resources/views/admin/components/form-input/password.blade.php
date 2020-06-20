<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <input type="password" id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control" value="{{ old($field) }}"{{ isset($decorator) ? ' '.$decorator : '' }} />
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
