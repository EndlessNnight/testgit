<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <input type="text" id="{{ $field }}" autocomplete="off" name="{{ php_data_key($field) }}" {{ isset($dis) ? 'disabled="disabled"' : '' }} class="form-control" value="{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}"{{ isset($decorator) ? ' '.$decorator : '' }} />

    @if ($errors->has($field))
    <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
