@extends('front.periodical.base')

@section('head')
    <script src="{{ url('/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('css/page.css') }}">
@endsection

@section('content')

<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" class="mart" style="display:none">
    <tr>
        <td height="300" background="{{url('images/pre/ban.jpg')}}"></td>
    </tr>
</table>

<table width="1100" border="0" align="center" cellpadding="0" cellspacing="15" bgcolor="#FFFFFF" id="main">
    <tr>
        <td valign="top"><table width="810" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="titright">时事报道 <span>/ CURRENT EVENTS</span></td>
                    <td class="titrightm"><a href="{{route('home.periodical.news',['unique'=>$data['unique'],'news_type' => 2])}}">+更多</a></td>
                </tr>
            </table>
            <table width="810" border="0" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td width="360" height="250" style="padding-right: 15px;">
                        <!--banner-->
                        @if(!empty($recommend_news))
                            <div id="carousel" class="carousel slide">
                                <!-- 轮播（Carousel）指标 -->
                                <ol class="carousel-indicators">
                                    @foreach($recommend_news as $item)
                                        <li data-target="#carousel" data-slide-to="{{$loop->index}}" class=" @if ($loop->first) active @endif"></li>
                                    @endforeach
                                </ol>
                                <!-- 轮播（Carousel）项目 -->
                                <div class="carousel-inner" style="width: 360px; height: 250px;">
                                    @foreach($recommend_news as $item)
                                        <div class="item @if ($loop->first) active @endif" style="height: 250px;">
                                            <a href="{{route('home.periodical.news.content',['unique' => $data['unique'],'news_id' => $item['id']])}}">
                                                <img src="{{$item['recommend_img']}}" width="360" height="250">
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
                    <td class="newslist" style="vertical-align:top">
                        @if(!empty($news_list))
                            @foreach($news_list as $item)
                        <a href="{{ route('home.periodical.news.content',['unique' => $data['unique'],'news_id' => $item['id']]) }}" target="_blank" >{{$item['title']}}</a><span>{{$item['release_time']}}</span>
                            @endforeach
                        @endif

                    </td>
                </tr>
            </table>
            <table width="810" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td width="413" valign="top"><table width="397" border="0" cellpadding="0" cellspacing="0" class="bor4">
                            <tr>
                                <td class="titright">国家新闻出版广电总局备案信息</td>
                            </tr>
                            <tr>
                                <td width="504" height="180" class="pad10"><a href="http://www.gapp.gov.cn/govservice/108.shtml" target="_blank"><img src="{{url('images/per/ju.jpg')}}" width="375" height="180" border="0" /></a></td>
                            </tr>
                        </table></td>
                    <td width="397" valign="top"><table width="397" border="0" align="right" cellpadding="0" cellspacing="0" class="bor4">
                            <tr>
                                <td class="titright">投稿须知 <span>/ NOTICE</span></td>
                            </tr>
                            <tr>
                                <td width="504" height="178" class="pad1015"><p style="text-indent: 2em; margin: 0;">请各位投稿作者注意，凡是投稿《{{$data['name']}}》正在审核期的文章，请勿一稿多投，审稿期一般二个工作日以内，作者可以随时在本站上输入文章编号查询稿件审核情况。稿件录用后，《{{$data['name']}}》编辑部在通知作者的情况下有权适当修改文章，以便适应期刊的定位要求。</p></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
            <table width="810" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td valign="top"><img src="{{url('images/per/heng.jpg')}}" width="810" height="65" /></td>
                </tr>
            </table>
            <table width="810" border="0" align="center" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td width="260" valign="top"><table width="245" border="0" cellpadding="0" cellspacing="0" class="bor4">
                            <tr>
                                <td class="titright">联系我们 <span>/ CONTACT</span></td>
                            </tr>

                            <tr>
                                <td width="504" height="250" class="lbg">
                                    <strong>《{{$data['name']}}》杂志 <br></strong>
                                    <img src="{{url('images/per/tel.gif')}}" width=15 height=15> 电话：{{$config['web_telephone'] or ''}} <br>
                                    <img src="{{url('images/per/mobi.gif')}}" width=20 height=17> 手机：{{$config['web_phone'] or ''}}<br><br>
                                    <img src="{{url('images/per/mail.gif')}}" width=18 height=12> 邮箱：<a href="mailto:{{$config['web_email'] or ''}}" style="display: inline-block;
    width: 148px;">{{$config['web_email'] or ''}}</a><br>
                                    <img src="{{url('images/per/addr.gif')}}" width=16 height=16> 地址：{{$config['web_address'] or ''}}
                                </td>
                            </tr>
                        </table></td>
                    <td width="550" valign="top"><table width="550" border="0" align="right" cellpadding="0" cellspacing="0" class="bor4">
                            <tr>
                                <td class="titright">优秀论文 <span>/ ARTICLES</span></td>
                                <td class="titrightm"><a href="{{route('home.periodical.paper',['unique' => $data['unique']])}}">+更多</a></td>
                            </tr>
                            <tr>
                                <td height="250" colspan="2" valign="top" style="padding:4px 15px 10px 15px">
                                    @if(!empty($recommend_paper))
                                        @foreach($recommend_paper as $item)
                                    <div class="wen"><strong>{{$item['title']}}</strong><br />[<a href="{{route('home.periodical.paper.content',['unique' => $data['unique'],'paper_id' => $item['id']])}}">在线阅读</a>] <span class="gry">[已有{{$item['browse']}}人阅读]</span></div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </td>
        <td width="245" valign="top"><table width="245" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="180" height="40" class="titleft">稿件录用公告</td>
                    <td width="65" align="center" class="titleft">
                        <a href="{{ route('front.periodical.employ_list',['unique' => $data['unique']]) }}"><img src="{{url('images/per/more.gif')}}" width="38" height="13" border="0" /></a>
                    </td>
                </tr>
                <tr>
                    <td height="247" colspan="2" valign="top" class="bor3org pad1015">
                        @include('front.periodical.employ')
                    </td>
                </tr>
            </table>
            <table width="245" border="0" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td height="40" class="titleft">稿件录用查询</td>
                </tr>
                <tr>
                    <td valign="top" class="bor3org pad1015">
                        <form action="{{ route('home.employ.query',['unique' => $data['unique']]) }}" method="get" name="qkform" id="qkform">
                            <table width="213" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="red">请输入查稿编号：<input name="id" type="hidden" value="407" /></td>
                                    </tr>
                                    <tr>
                                        <td height="30"><label for="search"></label>
                                            <input type="text" name="search" id="search" style="width:208px" /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="button" id="button" value="立刻查询" style=" background:#CC0000; cursor:pointer; color:#FFFFFF; width:80px; border-style:none;" />
                                            <input type="reset" name="button2" id="button2" value="重新填写" style=" background:#666666; cursor:pointer; color:#FFFFFF; width:80px; border-style:none; " /></td>
                                    </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
            <table width="245" border="0" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td height="40" class="titleft">版权信息</td>
                </tr>
                <tr>
                    <td valign="top" class="bor3org pad1015 l25" style="font-weight:bold; color:#FF9933" height="175">
                        <div style="height:175px; overflow:auto; ">
                            主管单位：{{$data['responsible']}}<br />
                            主办单位：{{$data['sponsor']}}<br />
                            国际刊号：{{$data['international_ornp']}}<br />
                            国内刊号：{{$data['internal_ornp']}}<br />
                        </div>
                    </td>
                </tr>
            </table>
            <table width="245" border="0" cellpadding="0" cellspacing="0" class="mart15">
                <tr>
                    <td height="40" class="titleft">友情链接</td>
                </tr>
                <tr>
                    <td height="136" valign="top" class="bor3org pad10"><div id="demox" style="overflow:hidden;height:182px;width:223px;">
                            <div id="demox1"><a href="http://www.sda.gov.cn/WS01/CL0001/" target="_blank"><img src="{{url('images/per/f1.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.moe.edu.cn/" target="_blank"><img src="{{url('images/per/f2.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.most.gov.cn/" target="_blank"><img vspace="3" src="{{url('images/per/f4.jpg')}}" width="223" height="40" border="0"/></a><br />
                                <a href="http://www.nhfpc.gov.cn/" target="_blank"><img src="{{url('images/per/f5.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.gov.cn/" target="_blank"><img src="{{url('images/per/f6.gif')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.who.int/zh/" target="_blank"><img src="{{url('images/per/f7.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.nlc.gov.cn/" target="_blank"><img src="{{url('images/per/f8.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.sapprft.gov.cn/" target="_blank"><img src="{{url('images/per/f9.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.cnki.net/" target="_blank"><img src="{{url('images/per/f10.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://new.wanfangdata.com.cn/" target="_blank"><img src="{{url('images/per/f11.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.cqvip.com/" target="_blank"><img src="{{url('images/per/f3.png')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                                <a href="http://www.qikan.com.cn/" target="_blank"><img src="{{url('images/per/f12.jpg')}}" width="223" height="40" vspace="3" border="0" /></a><br />
                            </div>
                            <div id="demox2"></div>
                        </div>
                        <script>
                            var speedx=50
                            demox2.innerHTML=demox1.innerHTML
                            function Marqueex(){
                                if(demox2.offsetTop-demox.scrollTop<=0)
                                    demox.scrollTop-=demox1.offsetHeight
                                else{
                                    demox.scrollTop++
                                }
                            }
                            var MyMarx=setInterval(Marqueex,speedx)
                            demox.onmouseover=function() {clearInterval(MyMarx)}
                            demox.onmouseout=function() {MyMarx=setInterval(Marqueex,speedx)}
                        </script></td>
                </tr>
            </table></td>
    </tr>
</table>
@include('front.periodical.recommend')
@endsection
