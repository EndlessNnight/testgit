<ul class="dh" id="per_nav">
    <li class=" per_nav">
        <a href='{{route('home.periodical.content',['unique' => $data['unique']])}}' class="m1">首 页</a>
    </li>
    <li class=" per_nav">
        <a href='{{route('home.periodical.introduction',['unique' => $data['unique']])}}' class="m2">杂志简介</a>
        <div>
            <a href="{{route('home.periodical.introduction',['unique' => $data['unique']])}}">杂志介绍</a>
            <a href="{{route('home.periodical.info',['unique' => $data['unique'],'page' => $pages[5]['unique']])}}">{{$pages[5]['name']}}</a>
        </div>
    </li>
    <li class=" per_nav">
        <a href='{{route('home.periodical.contribute',['unique' => $data['unique']])}}' class="m3">在线投稿</a>
        <div>
            <a href="{{route('home.periodical.contribute',['unique' => $data['unique']])}}">在线投稿</a>
            <a href="{{route('home.periodical.info',['unique' => $data['unique'],'page' => $pages[6]['unique']])}}">投稿须知</a>
        </div>
    </li>
    <li class=" per_nav"><a href='{{route('home.periodical.info',['unique' => $data['unique'],'page' => $pages[7]['unique']])}}' class="m4">编委会</a></li>
    <li class=" per_nav"><a href='{{route('home.periodical.info',['unique' => $data['unique'],'page' => $pages[8]['unique']])}}' class="m5">{{$pages[8]['name']}}</a></li>
    <li class=" per_nav"><a href='{{route('home.periodical.news',['unique' => $data['unique'],'news_type' => 2])}}' class="m6">时事报道</a></li>
    <li class=" per_nav"><a href='{{route('home.periodical.news',['unique' => $data['unique'],'news_type' => 3])}}' class="m7">政策法规</a></li>
    <li class=" per_nav"><a href='{{route('home.periodical.info',['unique' => $data['unique'],'page' => $pages[10]['unique']])}}' class="m8">{{$pages[10]['name']}}</a></li>
</ul>
<script>
    $('#per_nav a').each(function (k,v) {
        var url = window.location.href;
        var nav_url = $(v).attr('href');

        if(url == nav_url){
            $(v).parents('.per_nav').addClass('no');
        }
    })

</script>
