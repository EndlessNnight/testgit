<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <textarea id="{{ $field }}" class="form-control" rows="3" disabled{{ isset($decorator) ? ' '.$decorator : '' }}>{!! data_get($model, $field) !!}</textarea>
</div>
