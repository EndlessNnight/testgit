<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <div class='input-group date'>
      <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
      </div>
      <div class="input-group-date">
        <input type='text' id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control  pull-right date datetimepicker" value="{{ old($field, editing($field)) }} {{ isset($default)?$default:'' }}"{{ isset($decorator) ? ' '.$decorator : '' }} />
      </div>
  </div>
  <span class="help-block">
    <strong>@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
  </span>
</div>
<script>
    //Date picker
    $('.datetimepicker').datepicker({
        autoclose: true,
        language: 'cn',
    })
</script>
