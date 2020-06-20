<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <input type="text" id="{{ $field }}" class="form-control" value="{{ data_get($model, $field) }}" disabled{{ isset($decorator) ? ' '.$decorator : '' }} />
</div>
