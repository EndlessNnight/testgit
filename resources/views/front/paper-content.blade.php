
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
                            {{ $title or ''}}
                        </td>
                        <td  class="s12" align="right"></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table width="690" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" valign="top">
        <tbody>
            <tr>
                <td height="60" align="center" style="font-size:25px; font-weight:bold; font-family:Arial, Helvetica, sans-serif">{{ $data['title'] }}</td>
            </tr>
            <tr>
                <td height="18" align="center" bgcolor="#F7F7F7">发布时间：{{ $data['release_time'] }}&nbsp;&nbsp;浏览次数： {{ $data['browse'] }}</td>
            </tr>
            <tr>
                <td height="12">&nbsp;</td>
            </tr>
            <tr>
                <td style="line-height:25px">
                    {!!  $data['content'] !!}
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>

@endsection
