
@extends('front.public.inside')

@section('right-con')
    @include('front.public.type-items',['class_list' => $class_list,'type_info' => isset($type_info)?$type_info:[]])

{{-- 期刊列表 --}}
<table width="690" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" valign="top">
    <tbody>
    @if(!empty($periodical_array))
        @foreach($periodical_array as $items)
            <tr>
                @foreach($items as $item)
                    <td valign="top" width="296" align="center">
                        <table width="340" border="1" cellpadding="0" cellspacing="0" bordercolor="#efefef" bgcolor="#000000" style="margin:5px">
                            <tbody>
                            <tr>
                                <td width="100" height="100" align="center" valign="middle" bgcolor="#F3FDFF" id="hot">
                                    <a href="{{route('home.periodical.content',['unique' => $item['unique']])}}" target="_blank">
                                        <img alt="{{ $item['name']}}" src="{{$item['img_url'] or ''}}" border="0" width="120" height="160">
                                    </a>
                                </td>
                                <td align="center" valign="middle" bgcolor="#FAFAFA">
                                    <span class="STYLE3">
                                        <table width="94%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1">
                                            <tbody>
                                                <tr>
                                                    <td align="left" class="s12">
                                                        <strong>刊名:<a href="{{route('home.periodical.content',['unique' => $item['unique']])}}">{{ $item['name']}}</a></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">级别:{{ \App\Models\Admin\Periodical::LEVEL_ARRAY[$item['level']] }}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">主管:{{$item['responsible']}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">主办:{{$item['sponsor']}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">国内统一刊号:{{$item['internal_ornp']}}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">国际标准刊号:{{$item['international_ornp']}}</td>
                                                </tr>

                                                <tr>
                                                    <td align="left" class="s12" title="收录网站:{!! $item['employ_web_text'] !!}" style="max-width:199px; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">收录网站:{!! $item['employ_web_text'] !!}</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="s12">出版地:{{$item['publication_address']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </span>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td height="2" bgcolor="#FFFFFF"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                @endforeach
            </tr>
        @endforeach
    @else
        <tr>
            <td align="center">暂无信息</td>
        </tr>
    @endif
    </tbody>
</table>
{{-- 分页 --}}
@include('front.public.pages',['data' => $periodical_data])
@endsection
