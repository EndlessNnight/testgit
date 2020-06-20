<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <textarea id="{{ $field }}" validate="{{ $validate or '' }}" class="form-control check" clos="20" rows="4" placeholder="{{ $placeholder or '' }}"  name="{{$field}}"  style="resize:none; margin-left: 12px"  >{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}</textarea>
    <span class="help-block">
        <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
    </span>
</div>
