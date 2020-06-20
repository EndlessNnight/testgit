@extends('front.periodical.dashboard')

@section('rcon')
    @include('front.periodical.title',['title' => $type_info->name])
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">
        <tbody>
        @if(!empty($news_list))
            @foreach($news_list as $item)
        <tr>
            <td width="696" height="28" align="left" class="listnews">
                <a style="overflow: hidden; height: 29px; display: inline-block; line-height: 29px; " href="{{route('home.periodical.news.content',['unique' => $data['unique'],'news_id' => $item->id])}}" target="_blank">{{$item->title}}</a>
            </td>
            <td width="98" align="right" class="lineb">{{$item->release_time}}&nbsp;</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @if(!empty($news_list))
        @include('front.public.pages',['data' => $news_list])
    @endif
@endsection


