
@extends('mobile.base')

@section('content')

<div class="lmy1">
    <div class="wzy_t">
        <div class="lmy1_t1">
            <h1>
                <p><img src="{{ url('/images/mobile/pic55.png') }}"></p>
                当前位置：<a href="{{ route('mobile.home') }}">首页</a> &gt; <a href="{{ route('mobile.pre.contribute') }}">在线投稿</a> &gt;
            </h1>

        </div>
        <div class="wzy">
            <div class="blank1"></div>
            <h2>在线投稿</h2>

            <div class="blank1"></div>
            <div class="nrbody">
                <div class="seven_ca">
                    <form method="post" enctype="multipart/form-data" action="{{ route('mobile.contribute.post') }}">
                        <ul>
                            <li>
                                <h1>投稿刊物</h1>
                                <input name="periodical_name" id="periodical_name" type="text" class="seven_mar1" onfocus="if(this.value=='请输入投稿刊物'){this.value='';}" onblur="if(this.value==''){this.value='请输入投稿刊物';}" value="请输入投稿刊物" style="color:#A4A4A4">
                            </li>

                            <li>
                                <h1>*作者姓名</h1>
                                <input name="name" id="name" type="text" class="seven_mar1" onfocus="if(this.value=='请输入作者姓名'){this.value='';}" onblur="if(this.value==''){this.value='请输入作者姓名';}" value="请输入作者姓名" style="color:#A4A4A4">
                            </li>
                            <li>
                                <h1>*联系电话</h1>
                                <input name="tel" id="tel" type="text" class="seven_mar1 validate" onfocus="if(this.value=='请输入您的联系电话'){this.value='';}" onblur="if(this.value==''){this.value='请输入您的联系电话';}" value="请输入您的联系电话" style="color:#A4A4A4">
                            </li>

                            <li>
                                <h1>联系QQ</h1>
                                <input name="QQ" id="QQ" type="text" class="seven_mar1" onfocus="if(this.value=='请输入QQ'){this.value='';}" onblur="if(this.value==''){this.value='请输入QQ';}" value="请输入QQ" style="color:#A4A4A4">
                            </li>
                            <li>
                                <h1>*上传稿件</h1>
                                <input name="file" id="file" type="file" class="seven_mar1" >
                            </li>
                            <h2>
                                <input name="" class="contribute_submit" type="image" src="{{ url('/images/mobile/pic42a.png') }}">
                            </h2>

                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
