<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    <label for="{{ $field }}">{{ $label }}</label>
    <textarea id="{{ $field }}" class="form-control" clos="20" rows="3"  name="{{$field}}"  style="resize:none; margin-left: 12px"  >{{ old($field, editing($field)) ?? (isset($default) ? $default : '') }}</textarea>
</div>
