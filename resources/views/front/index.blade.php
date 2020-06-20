@extends('front.base')

@section('head')
    <script src="{{ url('/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('css/page.css') }}">
@endsection
@section('content')

    {{--<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7">--}}
        {{--<tr>--}}
            {{--<td height="60"><a href="{{ $config["web_domain"] or route('home')}}" title="{{ $config['web_name'] or ''}}网欢迎您" target='_blank'><img src="{{url('images/adv96060.jpg')}}" width='960'  border='0' /></a></td>--}}
        {{--</tr>--}}
    {{--</table>--}}
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="mar7">
        <tr>
            <td width="300" valign="top">
            <!--banner-->
                @if(!empty($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH]))
                    <div id="carousel" class="carousel slide">
                        <!-- 轮播（Carousel）指标 -->
                        <ol class="carousel-indicators">
                            @foreach($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH] as $item)
                                <li data-target="#carousel" data-slide-to="{{$loop->index}}" class=" @if ($loop->first) active @endif"></li>
                            @endforeach
                        </ol>
                        <!-- 轮播（Carousel）项目 -->
                        <div class="carousel-inner">
                            @foreach($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FLASH] as $item)
                                <div class="item @if ($loop->first) active @endif" style="height: 483px;">
                                    <a href="{{route('home.periodical.content',['unique' => $item['unique']])}}">
                                        <img src="{{$item['img_url']}}" width="300" style="height: 483px;">
                                        <span style="position: absolute;z-index: 999; bottom: 0; left: 0; display: inline-block; padding: 5px 10px; background-color:#000000;  filter:alpha(opacity:70); opacity:0.7;  -moz-opacity:0.7;-khtml-opacity: 0.7; width: 100%; color: #FFF;">{{$item['name']}}杂志</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- 轮播（Carousel）导航 -->
                        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                @endif
            <!-- 轮播（Carousel）导航 -->
            </td>
            <td valign="top" >
                <table width="386" border="0" align="center" cellpadding="0" cellspacing="0" class="bordb4">
                    <tr><td background="{{url('images/BGC.JPG')}}" class="pad4">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                @if(!empty($class_list))
                                    @foreach($class_list as $item)

                                        <tr>
                                            <td width="76" align="right" valign="top"><strong><a class="dblue"  href="{{route('home.periodical',['type_id' => $item['id']])}}">{{ $item['name'] }}</a>：</strong></td>

                                            <td width="292" valign="top">
                                                @if(!empty($item['list']))
                                                    @foreach($item['list'] as $next_item)
                                                        <a href="{{route('home.periodical',['type_id' => $next_item['id']])}}">{{$next_item['name']}}</a>@if(!$loop->last)、@endif
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="386" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7 bordb4">

                    <tr>
                        <td width="26" align="center" bgcolor="#dbdbdb"  style="color:#0000ff; font-weight:bold; " height="149">郑<br />
                            <br />
                            重<br />
                            <br />
                            承<br />
                            <br />
                            诺</td>
                        <td width="358" align="left"  style="padding:8px; color:#FF0000; line-height:17px">
                            （一）正刊保证
                            1.本站所推荐期刊，均为正规、合法、双刊号期刊；<br>
                            2.所有期刊网上可查，并全文收录；<br>
                            3.新闻出版总署:<a href="http://www.gapp.gov.cn" target="_blank">www.gapp.gov.cn</a>可查询，收录期刊；<br>
                            （二）期刊全面<br>
                            <p style="margin: 0; margin-top: 7px; text-indent: 2em;">本站与多个专业，多个级别，不同收费标准的期刊建立着长期及密切的合作关系，覆盖了教育、科技、建筑、农林、畜牧、医学、法律等各个领域。本站遵循作者至上的理念；以客户的需求为首推荐适合的期刊，力求确保收费低、出刊快、级别高的原则服务于每一位作者。</p>
                        </td>
                    </tr>
                </table></td>
            <td width="255" valign="top">
                <table width="255" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb" class="table-border">
                    <tr>
                        <td height="25"  class="titr">在线投稿</td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" class="pad4" style="color:#000000" >
                            <table width="236" border="0" cellpadding="0" cellspacing="0" class="s12">
                                <form name="myform" action="{{ route('home.contribute.post') }}" method="post">
                                    <input type="hidden" value="Save" name="action">
                                    <input type="hidden" value="1" name="id">
                                    <tr>
                                        <td width="54" height="25" align="left" valign="middle" class="s12">真实姓名:</td>
                                        <td align="left" valign="middle" class="s12"><input   name="xingming" type="text" id="xingming" value=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="left" valign="middle" class="s12">联系电话:</td>
                                        <td align="left" valign="middle" class="s12"><input   name="dianhua" type="text" id="dianhua" value=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="left" valign="middle" class="s12">电子邮箱:</td>
                                        <td align="left" valign="middle" class="s12"><input   name="youxiang" type="text" id="youxiang" value=""></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="left" valign="middle" class="s12">期刊级别:</td>
                                        <td align="left" valign="middle" class="s12"><input type="radio" name="jibie" value="省级" checked>省级<input type="radio" name="jibie" value="国家级">国家级<input type="radio" name="jibie" value="核心期刊">核心期刊</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" align="left" valign="top" class="s12"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td height="25" align="left" valign="top" class="s12">文件地址:</td>
                                                </tr>
                                                <tr>
                                                    <td height="25" align="left" valign="top" class="s12">在线上传:</td>
                                                </tr>
                                            </table></td>
                                        <td height="25" align="left" valign="middle" class="s12"><input   name="dizhi" type="text" id="dizhi" value=""></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" class="s12" >
                                            @include('front.public.file-submit')
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="36" colspan="2" align="center" class="s12">
                                            <a href="#" class="contribute_submit"></a>
                                        </td>
                                    </tr>
                                </form>
                                <script>
                                    var base_url = "{{ route('home.contribute') }}";
                                    $("a.contribute_submit").click(function () {
                                        var url = base_url + '?file_id='+$('#file_id').val();
                                        window.location.href = url;
                                    });
                                </script>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="255" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb" class="mar7">
                    <tr>
                        <td height="25"  class="titr">稿件查询</td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" class="pad4" style="color:#000000" >
                            <form action="{{ route('home.query') }}" method="get" name="sform" id="sform">
                            <table width="89%" border="0" align="center" cellpadding="0" cellspacing="0" class="s12">

                                    <tr>
                                        <td width="83" height="25" align="right" valign="middle" class="s12">文章编号
                                        </td>

                                        <td width="100" align="left" valign="middle" class="s12"><input  name="search" type="text" id="search"  style="width:100px; margin: 0 5px;"  value="" /></td>
                                        <td width="42" align="left" valign="middle" class="s12">
                                            <input type="submit" name="button" id="button" value="查询" /> <input type="hidden" value="Save" name="action2" />
                                            <input type="hidden" value="1" name="id2" />
                                        </td>
                                    </tr>
                            </table>
                            </form>

                        </td>
                    </tr>
                </table>
                <table width="255" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb" class="mar7">
                    <tr>
                        <td height="25"  class="titr">联系我们</td>
                    </tr>
                    <tr>
                        <td bgcolor="#FFFFFF" style="color:#000000;padding:5px 10px;line-height:22px; height:124px" >电话：{{ $config['web_telephone'] or ''}}<BR>QQ：{{ $config['web_QQ'] or ''}}&nbsp;&nbsp;&nbsp; <BR>地址：{{ $config['web_address'] or ''}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    @if(!empty($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_TOP]))
        @foreach($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_TOP] as $rem)
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7">
                <tr>
                    <td height="60"><a href="{{route('home.periodical.content',['unique' => $rem['unique']])}}" title="{{$rem['name']}}杂志征稿中..." target='_blank'><img src="{{$rem['recommend_img']}}" width='960' height="90"  border='0' /></a></td>
                </tr>
            </table>
        @endforeach
    @endif
    <div  style="clear: both; height: 7px;"></div>
    {{--  刊物 --}}

    @if(!empty($class_list_group))
        @foreach($class_list_group as $items)
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" @if(!$loop->first) class="mar7" @endif>
                <tr>
                    @foreach($items as $item)
                        @if(!empty($periodical_list[$item['id']]))
                        <td @if($loop->iteration%2  == 0) width="334" align="center" @else width="316"  @endif  valign="top" height="80" >
                            <table width="316" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                                <tr>
                                    <td height="26" class="titl">{{$item['name']}}<a href="{{route('home.periodical',['type_id' => $item['id']])}}">更多&gt;&gt;</a></td>
                                </tr>

                                    <tr>
                                        <td valign="top" bgcolor="#FFFFFF" class="pad4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    @foreach($periodical_list[$item['id']] as $periodical)
                                                        @if ($loop->first)
                                                            <td width="52%" height="200" >
                                                                <a href="{{route('home.periodical.content',['unique' => $periodical['unique']])}}" target=_blank title="{{ $periodical['name'] }}"><img height=200 src="{{ $periodical['img_url'] }}" width=150 border=0 /></a>
                                                            </td>
                                                        @else
                                                            @if($loop->index == 1)<td width="48%" >@endif
                                                                <a class="line" style="max-width: 143px;overflow: hidden;" href="{{route('home.periodical.content',['unique' => $periodical['unique']])}}" target="_blank" title="{{ $periodical['name'] }}">· {{ $periodical['name'] }}</a><br />           @if($loop->last)</td>@endif
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                            </table>
                        </td>
                        @endif
                    @endforeach
                </tr>
            </table>
        @endforeach
    @endif



    @if(!empty($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FOOTER]))
        @foreach($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_FOOTER] as $rem)
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7">
                <tr>
                    <td height="60"><a href="{{route('home.periodical.content',['unique' => $rem['unique']])}}" title="{{$rem['name']}}杂志征稿中..." target='_blank'><img height="90" src="{{$rem['recommend_img']}}" width='960'  border='0' /></a></td>
                </tr>
            </table>
        @endforeach
    @endif
    <div  style="clear: both; height: 7px;"></div>

    {{-- 论文 --}}
    @if(!empty($class_list_group))
        @foreach($class_list_group as $items)
            <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" @if(!$loop->first) class="mar7" @endif>
                <tr>
                    @foreach($items as $item)
                        @if(!empty($paper_list[$item['id']]))
                        <td @if($loop->iteration%2  == 0) width="334" align="center" @else width="316"  @endif height="80" valign="top">
                            <table width="316" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                                <tr>
                                    <td height="26" class="titl" >{{$item['name']}}论文<a href="{{route('home.paper',['type_id' => $item['id']])}}" style="margin-left: 150px;">更多&gt;&gt;</a></td>
                                </tr>

                                    <tr>
                                        <td valign="top" bgcolor="#FFFFFF" class="pad4">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                    @foreach($paper_list[$item['id']] as $value)
                                                        <a style="max-height: 25px; display: inline-block;overflow: hidden; text-overflow: ellipsis;" href="{{route('home.paper.content',['id' => $value['id']])}}" target="_blank" title="{{ $value['title'] }}" >· {{ $value['title'] }}</a><br />
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                            </table>
                        </td>
                        @endif
                    @endforeach
                </tr>
            </table>
        @endforeach
    @endif

    {{-- 期刊资讯 --}}
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="mar7">
        <tr>
            <td height="34" background="{{url('images/titbg_b.jpg')}}" >
                <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="22" valign="bottom" class="tit14b">&nbsp;</td>
                        <td width="604" height="25" valign="bottom" class="tit14b">{{ $news_type[\App\Models\Admin\News::POSITION_HOME_REPORT] }}</td>
                        <td width="324" align="right" class="s12"><a href="{{ route('home.news',['position' => \App\Models\Admin\News::POSITION_HOME_REPORT]) }}">更多&gt;&gt;</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="80" valign="top" class="pad4" style="BORDER-LEFT: #ccc 1px solid;BORDER-righT: #ccc 1px solid; BORDER-bottom: #ccc 1px solid;">
                @if(!empty($news_list))
                    @foreach($news_list as $item)
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="width:450px; float:left; margin:5px 10px;">
                            <tr>
                                <td width="400"><a href="{{ route('home.news.content',['id' => $item['id']]) }}" target="_blank" title="{{$item['title']}}"
                                                   style="display: inline-block; max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">· {{$item['title']}}</a></td>
                                <td width="100" align="center" style="color:#bbbbbb">{{$item['release_time'] or ''}}</td>
                            </tr>
                        </table>
                    @endforeach
                @endif
            </td>
        </tr>
    </table>

    @if(!empty($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_QUALITY]))
        {{-- 精品期刊 --}}
        <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="mar7">
            <tr>
                <td height="34" background="{{url('images/titbg_b.jpg')}}" ><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="22" valign="bottom" class="tit14b">&nbsp;</td>
                            <td width="604" height="25" valign="bottom" class="tit14b">精品期刊</td>
                            <td width="324" align="right" class="s12"><a href="{{ route('home.periodical') }}">更多&gt;&gt;</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="80" style="BORDER-LEFT: #ccc 1px solid;BORDER-righT: #ccc 1px solid; BORDER-bottom: #ccc 1px solid;"><div class="blk_29" style="margin-left:1px;">
                        <div class="LeftBotton" id="LeftArr"></div>
                        <div class="Cont" id="ISL_Cont_1">
                            <!-- 图片列表 begin -->
                            @foreach($recommend_periodical[\App\Models\Admin\Periodical::RECOMMEND_HOME_QUALITY] as $recommend)
                                <div class=box><a href="{{ route('home.periodical.content',['unique' => $recommend['unique']]) }}" target="_blank" title="品牌研究"  class="imgBorder"><img src="{{$recommend['img_url']}}" width="150" height="200" border="0" /></a>
                                    <p>{{$recommend['name']}}</p></a>
                                </div>
                        @endforeach
                        <!-- 图片列表 end -->
                        </div>
                        <div class="RightBotton" id="RightArr"></div>
                    </div>
                    <script language="JavaScript" type="text/javascript">
                        <!--//--><![CDATA[//><!--
                        var scrollPic_02 = new ScrollPic();
                        scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
                        scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
                        scrollPic_02.arrRightId     = "RightArr"; //右箭头ID

                        scrollPic_02.frameWidth     = 908;//显示框宽度
                        scrollPic_02.pageWidth      = 182; //翻页宽度

                        scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
                        scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
                        scrollPic_02.autoPlay       = true; //自动播放
                        scrollPic_02.autoPlayTime   = 2; //自动播放间隔时间(秒)

                        scrollPic_02.initialize(); //初始化

                        //--><!]]>
                    </script>
                    </DIV>
                    <!--滚动图片 end-->
                </td>
            </tr>
        </table>
    @endif


    {{--<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="mar7">--}}
        {{--<tr>--}}
            {{--<td height="150" background="{{url('images/960bt.jpg')}}"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
                    {{--<tr>--}}
                        {{--<td width="8%" height="150">&nbsp;</td>--}}
                        {{--<td width="21%"><div style="line-height:22px; font-size:14px; font-weight:bold; color:#009900; word-break:break-all; height:133px; overflow:hidden; padding-top:17px">{{ $config['web_name'] or '' }}，只收录正规学术杂志，致力于打造中国最大最专业的期刊论文发表网站，诚招组稿编辑和论文代理老师，与您共创期刊界的美好蓝天。…[<A href="{{ route('home.info',['name' => $pages[4]['unique']]) }}">详情</A>]</div></td>--}}
                        {{--<td width="13%" style="line-height:25px; font-size:14px; font-weight:bold; color:#009900">&nbsp;</td>--}}
                        {{--<td width="22%" ><div style="line-height:22px; font-size:14px; font-weight:bold; color:#009900; word-break:break-all; height:110px; overflow:hidden;">抄袭率的高低往往决定一篇论文能否被录用，全自助检测淘宝链接：<a href="https://item.taobao.com/item.htm?spm=a1z38n.10677092.0.0.594c1debeUdJ98&id=565284052592">https://item.taobao.com/item.htm?spm=a1z38n.10677092.0.0.594c1debeUdJ98&id=565284052592</a></div></td>--}}
                        {{--<td width="12%">&nbsp;</td>--}}
                        {{--<td width="21%" style="line-height:25px">--}}
                            {{--<a href="{{ route('home.news',['position' => \App\Models\Admin\News::POSITION_PUBLISH]) }}">--}}
                            {{--<span style="line-height:25px; font-size:14px; font-weight:bold; color:#009900">出版服务：学术专著出版、企业出版、自费出版、撰写指导、书号申请、改编出版等系列出版服务。热忱欢迎合作！--}}
                                {{--<STYLE>--}}
                                {{--#recommended span{margin:0px;padding:0px;}--}}
                                {{--.recommended0{height:auto;width:auto;}--}}
                                {{--.top_series a{ width:99px; height:157px; float:left; display:block; text-align:center; background:#f7f8f8;}--}}
                                {{--.top_series a:hover{background:#f6f5f6; color:#FF0000}--}}
                                {{--.top_series img{ width:95px; height:120px; background:#ccc; border:2px #542 double;}--}}
                                {{--#news{width:100%;}--}}

                                {{--</STYLE>--}}
                            {{--</span>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                        {{--<td width="3%">&nbsp;</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}


    {{--<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="mar7 bordb4">--}}
        {{--<tr>--}}
            {{--<td width="320" height="170" align="center">--}}
                {{--<a href={{ route('home.info',['name' => 'zz']) }} title="组织机构代码证" target='_blank'>--}}
                    {{--<img src="{{url('images/2011104233559.jpg')}}" width='300'  height='220' vspace='5' class='bordb4d'   />--}}
                {{--</a> --}}
            {{--</td>--}}
            {{--<td width="320" align="center" >--}}
                {{--<a href="{{ route('home.info',['name' => 'zz']) }}" title="营业执照" target='_blank'>--}}
                    {{--<img src="{{url('images/2011104233658.jpg')}}" width='300'  height='220' vspace='5' class='bordb4d'   />--}}
                {{--</a>--}}
            {{--</td>--}}
            {{--<td width="320" align="center">--}}
                {{--<a href="{{ route('home.info',['name' => 'zz']) }}" title="税务登记证" target='_blank'>--}}
                    {{--<img src="{{url('images/2011104233751.jpg')}}" width='300'  height='220' vspace='5' class='bordb4d'   />--}}
                {{--</a>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}


@endsection
