@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '稿件录用公告'])

    @if(!empty($contribute_list))
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">

        <tbody>
        @foreach($contribute_list as $v)
        <tr>
            <td height="28" align="left" class="listnews">编号：<span class="lan1">{{$v['identifier']}}</span> &nbsp; 作者：<span class="green">{{$v['name']}}</span> &nbsp; 状态：<span class="red">{{\App\Models\Contribute::STATUS_ARRAY[$v['status']]}}</span></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @include('front.public.pages',['data' => $contribute_list])
    @endif
@endsection


