<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <div class='input-group'>
    <input type='text' id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control date datetimepicker" value="{{ old($field, editing($field)) }} {{ isset($default)?$default:'' }}"{{ isset($decorator) ? ' '.$decorator : '' }} />
    <span class="input-group-addon">
      <span class="fa fa-clock-o"></span>
    </span>
  </div>
  @if ($errors->has($field))
  <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
  @endif
</div>
