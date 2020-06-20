<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }} {{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}" class="col-sm-3 control-label">{{ $label }}</label>

    <div class="col-sm-6">
        <input type="password" autocomplete="off" @if(isset($validate)) validate="{{ $validate }}" @endif class="form-control check" id="{{ $field }}" name="{{ php_data_key($field) }}" placeholder="{{ $placeholder or '' }}"
               value="{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}"{{ isset($decorator) ? ' '.$decorator : '' }}>

        <span class="help-block">
            <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
        </span>

    </div>
</div>
