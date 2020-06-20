<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <input type="text" id="{{ $field }}" validate="{{ $validate or '' }}" autocomplete="off" placeholder="{{ $placeholder or '' }}" name="{{ php_data_key($field) }}" {{ isset($disabled) ? 'disabled="disabled"' : '' }} class="form-control check" value="{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}"{{ isset($decorator) ? ' '.$decorator : '' }} />

    <span class="help-block">
        <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
    </span>
</div>
