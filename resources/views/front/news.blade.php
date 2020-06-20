
@extends('front.public.inside')

@section('right-con')
    @include('front.public.type-items',['default' => $type_name])

    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody><tr>
            <td height="10">
                @if(isset($show_type) && !empty($class_list))
                    <div style="padding: 10px 10px;">
                    <strong class="blue">
                        <a href="{{ route('home.paper') }}" class="org">全部</a>&nbsp;&nbsp;
                        @foreach($class_list as $class)
                            <a href="{{ route('home.paper',['type_id' => $class['id']]) }}" class="org" style="display: inline-block;">{{$class['name']}}</a>&nbsp;&nbsp;
                        @endforeach
                    </strong>
                    </div>
                @endif
            </td>
        </tr>
        <tr>
            <td style="line-height:22px">
                <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                    @if(!empty($data))
                        @foreach($data as $item)
                        <tr>
                            <td width="615" height="26" background="{{url('images/ddian.jpg')}}">
                                <a href="{{ route($url_name,['id' => $item['id']]) }}" target="_blank" title="{{ $item['title'] }}" style="max-width: 550px; height: 26px; display: inline-block; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                                    <img src="{{url('images/dot4.gif')}}" hspace="5" align="absmiddle" >
                                    <span>{{ $item['title'] }}</span>
                                </a>
                            </td>
                            <td width="100" background="{{url('images/ddian.jpg')}}"> {{ $item['release_time'] }} </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td height="5"></td>
        </tr>
        </tbody>
    </table>
    @include('front.public.pages',['data' => $data])
@endsection
