<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    <label class="placeholder">{{ isset($label) ? ' '.$label : '' }} </label>

    <div class="checkbox input-group">
        @foreach( $data as $k => $v)
            <label for="{{ $v }}" style="padding-left: 0; margin-left: 10px ;margin-right: 20px">
                <input type="checkbox" class = "{{ $v }}" id="{{ $v}}"
                       name="{{ php_data_key($field) }}[]" value="{{ $k }}" {{ old($k,editing($k)) ? ' checked' : ''}}{{ isset($decorator) ? ' '.$decorator : '' }} />
                <i>✔</i>
                {{ $v}}</label>
        @endforeach
    </div>
</div>
