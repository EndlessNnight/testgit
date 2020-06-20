<div class="form-group" {{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }} style="margin-left: 0">
    <div id="{{ $field }}">
        <label for="{{ $field }}">{{ $label }}</label>
        <div class="clearfix" style="margin-bottom: 5px;"></div>
        @foreach($value as $v => $name)
        <label>
            <input type="checkbox" id="{{$field.'_'.$v}}" name="{{ $field }}[]" value="{{$v}}" class="minimal" @if(in_array($v,explode(',',old($field, editing($field))) )) checked @endif> {{ $name }}
        </label><br>
        @endforeach
    </div>
    <span class="help-block">
        <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
    </span>
</div>
<script>

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    })
</script>
