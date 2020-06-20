<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <input type="file" id="{{ $field }}" name="{{ php_data_key($field) }}"{{ isset($decorator) ? ' '.$decorator : '' }} />
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
