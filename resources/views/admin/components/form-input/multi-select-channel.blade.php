<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <select id="{{ $field }}" name="{{ php_data_key($field) }}[]" class="form-control select2-input channel-selector" multiple="multiple" style="width: 100%"{{ isset($decorator) ? ' '.$decorator : '' }}>
        @set($old_value, old($field, editing($field)))
        @foreach ($values as $value => $key)
            <option value="{{ $value }}"{{ is_array($old_value) && in_array($value, $old_value) ? ' selected' : '' }}>{{ $key }}</option>
        @endforeach
    </select>
    @if ($errors->has($field))
        <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
    @endif
</div>
