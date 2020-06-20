<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    @set($old_value, old($field, editing($field)))
    <label class="placeholder">{{ isset($label) ? ' '.$label : '' }} </label>
    <div class="checkbox input-group">
        <label for="{{$field}}-check-all" class="checkbox-label">
            <input type="checkbox" class = "checkbox_input {{ php_data_key($field) }}_check-all" id="{{$field}}-check-all"
                   name="{{ php_data_key($field) }}_all" value="all"  />
            <span class="checkbox-text">全部</span></label>
        @foreach( $data as $k => $v)
            <label for="{{ $v }}"  class="checkbox-label">
                <input type="checkbox" class = "checkbox_input {{ php_data_key($field) }}_check-item {{ $v }}" id="{{ $v}}"
                       name="{{ php_data_key($field) }}[]"  value="{{ $k }}" {{ isset($old_value[$k]) ? ' checked' : ''}}{{ isset($decorator) ? ' '.$decorator : '' }} />
                <span class="checkbox-text">{{ $v}}</span></label></label>
        @endforeach
    </div>
    <script>
        var check_all = '.{{ php_data_key($field) }}_check-all',item = ".{{ php_data_key($field) }}_check-item";
        var all_checked = true;
        $.each($(item),function (k,v) {
            if(!$(v).is(':checked')) all_checked = false;
        });
        if(all_checked && $(item).length > 0 ){
            $(check_all).prop("checked",true);
        }
        $(check_all).change(function () {
            if($(this).is(':checked')){
                $(item).prop("checked",true);
            }else{
                $(item).prop("checked",false);
            }
        })
    </script>
</div>
