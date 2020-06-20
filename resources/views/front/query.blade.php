
@extends('front.public.inside')

@section('right-con')
    <table width="705" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td height="36" background="{{url('images/dbj.jpg')}}">
                <table width="705" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td width="33" height="36"><div align="center"><img src="{{url('images/xiaoj.jpg')}}" width="12" height="17"></div></td>
                        <td width="200" class="tit14b">
                            稿件查询
                        </td>
                        <td  class="s12" align="right"></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table border="0" cellspacing="0" cellpadding="0" width="600" align="center">
        <tbody>
        <tr>
            <td height="80" align="center" valign="bottom" style="BORDER-BOTTOM: #d7d7d7 1px solid"><h1>稿件查询</h1></td>
        </tr>

        <tr>
            <td height="150" class="black" style=" PADDINg: 10px 20px; BORDER-TOP: #d7d7d7 1px solid; line-height:25px ">
                @if(!empty($content))
                <strong>以下是查询结果：</strong>（为了保护隐私，这里只显示作者部分信息）<br>
                    <br>姓名：{{$content['name']}}
                    {{--<br>邮箱：{{$content['email']}}--}}
                    <br>稿件名称：{{$content['periodicalName']['name'] or '--'}}
                    {{--<br>邮箱：{{$content['email']}}--}}
                    <br>进度：<span class="red">{{\App\Models\Contribute::STATUS_ARRAY[$content['status']]}}</span><br>
                <br>
                @else
                    没有相关记录
                @endif
            </td>
        </tr>
        <tr>
            <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" height="12" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="80%" align="center">
                    <tbody>
                    <tr>
                        <td class="org">近期检索较多，检索出错，请重新检索或避开高峰期。    </td>
                    </tr></tbody></table></td></tr>
        <tr>
            <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" valign="top" height="100"></td></tr></tbody></table>

@endsection
