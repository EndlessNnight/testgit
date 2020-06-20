@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => '优秀论文'])
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">
        <tbody>
        @if(!empty($paper_list))
            @foreach($paper_list as $item)
        <tr>
            <td width="696" height="28" align="left" class="listnews">
                <a href="{{route('home.periodical.paper.content',['unique' => $data['unique'],'paper_id' => $item->id])}}" target="_blank">{{$item->title}}</a>
            </td>
            <td width="98" align="right" class="lineb">{{$item->release_time}}&nbsp;</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @if(!empty($paper_list))
        @include('front.public.pages',['data' => $paper_list])
    @endif
@endsection


