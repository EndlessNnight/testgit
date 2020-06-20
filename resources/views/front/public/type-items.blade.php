<table width="705" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td height="36" background="{{url('images/dbj.jpg')}}">
            <table width="705" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td width="33" height="36"><div align="center"><img src="{{url('images/xiaoj.jpg')}}" width="12" height="17"></div></td>
                    <td width="200" class="tit14b">
                        @if(!empty($type_info))
                            @if($type_info->pid == 0)
                                {{ $class_list[$type_info->id]['name'] }}
                            @else
                                {{ $class_list[$type_info->pid]['name'] }} - {{ $type_info->name }}
                            @endif
                        @elseif(!empty($search))
                            {{$search_title or ''}}
                        @else
                            {{ $default or '所有分类' }}
                        @endif
                    </td>
                    <td  class="s12" align="right">
                        @if(!empty($search))
                            以下是标题中含有关键词“<span class="red">{{$search}}</span>”的所有信息&nbsp;&nbsp;&nbsp;
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
