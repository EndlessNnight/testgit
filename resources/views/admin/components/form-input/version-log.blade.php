<div class="form-group{{ isset($class) ? ' '.$class : '' }}">
    @set($old_value, old($field, editing($field)))
    <label class="placeholder">{{ isset($label) ? ' '.$label : '' }} </label>
    <div class="checkbox input-group checkbox_{{$field}}" style="width: 100%;"></div>
    <div class="input-group" >
        <button onclick="addItem()" class="form-control" type="button">+</button>
    </div>
    <script>
        var index = 0;
        var old_value = {!! json_encode($old_value) !!}
            console.log(old_value);
        var item_box = '.checkbox_{{$field}}';
        null === old_value && addItem();
        if(typeof old_value === 'object'){
            $.each(old_value,function (k,v) {
                addItem(v.title,v.log);
            });
        }
        function deleteItem(_this) {
            $(_this).parents('div.extend_item').hide(200,function () {
                $(this).remove()
            });
        }
        function addItem(title='',log='') {
            var item_html = '<div class="extend_item" style="border-top: 1px #f4f4f4 solid; padding: 20px 0 10px 0;">\n' +
                '                <div class="form-group col-sm-2" style="font-size: 16px; font-weight: bold; width: 55px; padding-right: 0;">标题</div>\n' +
                '                <div class="form-group col-sm-8">\n' +
                '                    <input type="text" autocomplete="off" name="{{$field}}['+index+'][title]" class="form-control " value="'+title+'" />\n' +
                '                </div>\n' +
                '                <div class="form-group col-sm-2">' +
                '                     <button onclick="deleteItem(this)" class="form-control" type="button">移除</button>' +
                '                </div>' +
                '                <div class="clearfix"></div>\n' +
                '                <div class="form-group col-sm-2" style="font-size: 16px; font-weight: bold; width: 55px;  padding-right: 0;">内容</div>\n' +
                '                <div class="form-group col-sm-10">\n' +
                '                    <textarea rows="4" autocomplete="off" name="{{$field}}['+index+'][log]" class="form-control" >'+log+'</textarea>\n' +
                '                </div>\n' +
                '                <div class="clearfix"></div>\n' +
                '            </div>';
            $(item_box).append(item_html);
            index++;
            return true;
        }
    </script>
</div>
