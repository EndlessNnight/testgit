@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '稿件查询'])

    <table border="0" cellspacing="0" cellpadding="0" width="600"  align="center">
        <tbody>

        <tr>
            <td height="150" class="black" style=" PADDINg: 10px 20px; BORDER-TOP: #d7d7d7 1px solid; line-height:25px ">

                    <table border="0" cellspacing="0" cellpadding="0" width="764" align="center">
                        <tbody>
                        <tr>
                            <td height="80" align="center" valign="bottom" style="BORDER-BOTTOM: #d7d7d7 1px solid;line-height:40px; font-size:16px; font-weight:bold" class="hei org">稿件查询</td>
                        </tr>

                        <tr>
                            <td class="black" style=" PADDINg: 10px 20px;  line-height:25px ">
                                <form action="{{route('home.employ.query',['unique' => $data['unique']])}}" method="get" name="qkform" id="qkform">
                                <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td class="red">请输入查稿编号：
                                    </tr>
                                    <tr>
                                        <td height="30"><label for="search"><span class="red">
          <input type="text" name="search" id="search" style="width:208px">
          </span></label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="button" id="button" value="立刻查询" style=" background:#CC0000; cursor:pointer; color:#FFFFFF; width:80px; border-style:none;">
                                            <input type="reset" name="button2" id="button2" value="重新填写" style=" background:#666666; cursor:pointer; color:#FFFFFF; width:80px; border-style:none; "></td>
                                    </tr>

                                    </tbody>
                                </table>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td height="150" class="black" style=" PADDINg: 10px 20px;  line-height:25px ">
                                @if(!empty($content))
                                    <strong>以下是查询结果：</strong>（为了保护隐私，这里只显示作者部分信息）<br>
                                    <br>姓名：{{$content['name']}}
                                    {{--<br>邮箱：{{$content['email']}}--}}
                                    <br>刊物名称：{{$content['periodicalName']['name'] or '--'}}
                                    <br>进度：<span class="red">{{\App\Models\Contribute::STATUS_ARRAY[$content['status']]}}</span>
                                    <br>
                                    <br>
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
                            <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" valign="top"></td></tr></tbody></table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection


