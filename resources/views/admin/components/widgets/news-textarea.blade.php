<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <textarea id="{{ $field }}" name="{{ php_data_key($field)}}" class="form-control" rows="4"  style="resize:none;" >{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}</textarea>
</div>
