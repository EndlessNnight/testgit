<div class="lb_menu">
    <ul>
        <li> <a href="{{ route('mobile.home') }}">网站首页</a> </li>

        <li> <a href="{{ route('mobile.periodical') }}">期刊发表</a> </li>

        @foreach($topType as $type)
            @if ($loop->index >= 3)
                @break;
            @endif

            <li> <a href="{{route('mobile.paper.list',['top_type' => $type->id??''])}}">{{ $type->name }}</a> </li>
        @endforeach

        <li> <a href="{{ route('mobile.pre.contribute') }}">在线投稿</a> </li>

        <li> <a href="{{ route('mobile.page',['unique' => 'about']) }}">关于我们</a> </li>

        <li> <a href="{{ route('mobile.page',['unique' => 'contact']) }}">联系我们</a> </li>


    </ul>
</div>