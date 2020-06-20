@extends('front.base')

@section('head')
    <link rel="stylesheet" href="{{ url('css/page.css') }}">
@endsection

@section('content')
    {{-- 位置信息 --}}
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" background="{{url('images/graybgS.gif')}}" class="bordb4 mar7">
        <tbody>
        <tr>
            <td height="25">
                <table width="951" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td width="695" height="25" background="{{url('images/graybgS.gif')}}" class="s12">
                            <span class="STYLE27">本页位置:首页&gt;&gt;期刊中心&gt;&gt;
                                @if(!empty($type_info))
                                    @if($type_info->pid == 0)
                                        {{ $class_list[$type_info->id]['name'] }}
                                    @else
                                        {{ $class_list[$type_info->pid]['name'] }} - {{ $type_info->name }}
                                    @endif
                                @else {{$title or '所有分类'}} @endif
                            </span>
                        </td>
                        <td width="256" align="right" background="{{url('images/graybgS.gif')}}" class="s12">{{ $config['web_domain'] or '' }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>


    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7">
        <tbody>
        <tr>
            <td width="250" valign="top">
                @include('front.public.type-nav',['class_list' => $class_list])
            </td>
            <td width="710" valign="top">
                <table width="710" border="0" cellpadding="2" cellspacing="1" bgcolor="#CBCBCB">
                    <tbody>
                        <tr>
                            <td width="704" valign="top" bgcolor="#FFFFFF">
                                @yield('right-con')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
