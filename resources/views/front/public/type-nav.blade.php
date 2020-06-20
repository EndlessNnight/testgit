<table width="241" border="0" cellpadding="0" cellspacing="1" bgcolor="#CBCBCB">
    <tbody>
    <tr>
        <td height="36" background="{{url('images/dbj.jpg')}}" class="tit14b"> &nbsp;※&nbsp;期刊导航</td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF">
            @if(!empty($class_list))
                @foreach($class_list as $items)
                    <table width="220" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px">
                        <tbody>
                        <tr>
                            <td height="22" align="left">
                                <a href="{{route('home.periodical',['type_id' => $items['id']])}}">
                                    <span class="red s12">【<strong>{{$items['name']}}</strong>】</span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td align="left" class="s12" style="line-height:22px; padding:0px 8px">
                                @if(!empty($items['list']))
                                    @foreach($items['list'] as $item)
                                        <div class="div100"><a href="{{route('home.periodical',['type_id' => $item['id']])}}">{{$item['name']}}</a></div>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endforeach
            @endif
        </td>
    </tr>

    </tbody>
</table>
