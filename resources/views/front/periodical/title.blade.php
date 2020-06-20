<table width="794" border="0" cellpadding="0" cellspacing="0" class="t">
    <tbody><tr>
        <td width="433" height="40" class="titr">{{$title or ''}}</td>
        <td width="361" align="right">
            <img src="{{url('images/per/position.jpg')}}" width="13" height="11" align="absmiddle"> 当前位置：
            <a href="{{route('home.periodical.content',['unique' => $data['unique']])}}">首页</a> - {{$title or ''}}
        </td>
    </tr>
    </tbody>
</table>
