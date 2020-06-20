<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }} {{ isset($class) ? ' '.$class : '' }}" >
    <label for="{{$field}}">期刊分类</label>
    <div class="clearfix"></div>
    <div class="relation-box">
        <select id="{{$field}}" name="{{$field}}" class="form-control select1-input relation" style="width: 200px;">
            @foreach($list as $item)
                <option value="{{$item['id']}}" @if(!empty($old) && $item['id'] == $old['pid'])  selected @endif>{{$item['name']}}</option>
            @endforeach
        </select>
        @if(!empty($old))
            <select  name="{{$field}}" class="form-control select2-input relation" style="width: 200px;">
                @foreach($list[$old['pid']]['list'] as $item)
                    <option value="{{$item['id']}}" @if($item['id'] == $old['id'])  selected @endif>{{$item['name']}}</option>
                @endforeach
            </select>
        @else
            <select  name="{{$field}}" class="form-control select2-input relation" style="width: 200px;">
                @foreach(array_shift($list)['list'] as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        @endif
    </div>
    <span class="help-block">
        <strong class="error-show">@if ($errors->has($field)){{ $errors->first($field) }}@endif</strong>
    </span>
</div>
<script>
    var data = {!! json_encode($list) !!}

    $(document).on('change',".relation",function () {
        _this = $(this);
        _this.parents('.form-group').removeClass('has-error');
        $.each(data,function (k,v) {
            if(v.id == _this.val()){
                _this.nextAll().remove();
                setNext(v.list)
            }
        })
    });

    function setNext(data) {
        var options = '';
        $.each(data,function (k,v) {
            options += '<option value="'+v.id+'">'+v.name+'</option>';
        });
        var html = '<select name="{{$field}}" class="form-control select2-input relation" style="width: 200px;">'+options+'</select>';
        $(".relation-box").append(html);
    }
</script>
