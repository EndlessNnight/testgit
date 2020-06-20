<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
  <label for="{{ $field }}">{{ $label }}</label>
  <input type="text" id="{{ $field }}" name="{{ php_data_key($field) }}" class="form-control" value="{{ \Ramsey\Uuid\Uuid::uuid4()->toString()  }}" readonly{{ isset($decorator) ? ' '.$decorator : '' }} />
</div>
