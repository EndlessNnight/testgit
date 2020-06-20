<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    <label class="placeholder">{{ $label}}</label>
    <div class="checkbox input-group">
        @foreach($data as $b)
        <input type="checkbox" id="{{ $field}}" name="{{ php_data_key($field) }}"{{ old($b) ? ' checked' : ''}}{{ isset($decorator) ? ' '.$decorator : '' }} />
        <label for="{{ $b }}" style="padding-left: 5px; margin-right:5px">{{ $b }}</label>
        @endforeach
    </div>
</div>
