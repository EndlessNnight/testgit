<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }} {{ isset($class) ? ' '.$class : '' }}" >
    <label for="{{$field}}">{{ $label }}</label>
    <div class="clearfix"></div>
    <div class="relation-box">
        <select id="{{$field}}" name="{{$field}}" class="form-control select1-input" style="width: 200px;">
            @foreach($list as $v => $name)
                <option value="{{$v}}" @if(!empty($old) && $v == $old)  selected @endif>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <span class="help-block">
        <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
    </span>
</div>
