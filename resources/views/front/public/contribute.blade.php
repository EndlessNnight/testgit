<div style="line-height:25px; padding:15px 0;">
    <form action="{{ route('home.contribute') }}" method="post" enctype="multipart/form-data" name="myform" id="contribute_form">
    <input type="hidden" id="periodical_id" name="periodical_id" value="{{ !empty($data['id'])?$data['id']:'0' }}">
    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="2">
        <tbody>
        <tr class="tdbg">
            <td width="12%" align="right" class="lefttdbg ">真实姓名：</td>
            <td width="88%" align="left"><input name="name" class="upfile" id="name"  style="width: 200px">
                <font color="red"> *（请填写第一作者或通讯作者名称）</font></td>
        </tr>
        <tr class="tdbg">
            <td class="lefttdbg" align="right">联系电话：</td>
            <td align="left"><input name="tel" class="upfile" id="tel"  style="width: 200px">
                <font color="red"> *（请正确填写您的电话或者手机）</font></td>
        </tr>
        {{--<tr class="tdbg">--}}
            {{--<td class="lefttdbg" align="right">手机：</td>--}}
            {{--<td align="left"><input name="phone" class="upfile" id="phone" style="width: 200px">--}}
                {{--<font color="red">* </font> </td>--}}
        {{--</tr>--}}
        <tr class="tdbg">
            <td class="lefttdbg" align="right">电子邮箱：</td>
            <td align="left"><input name="email" class="upfile validate" id="email"  style="width: 200px">
                <font color="red"> *（请正确填写您的常用邮箱）</font></td>
        </tr>
        <tr class="tdbg">
            <td class="lefttdbg" align="right">快递地址：</td>
            <td align="left"><input name="address" class="upfile" id="address" size="60">
                {{--<font color="red">*必填，否则不能提交</font>--}}</td>
        </tr>
        @if(empty($data['unique']))
        @if(!empty($class_list))
        <tr class="tdbg">
            <td class="lefttdbg" align="right">发表科目：</td>
            <td align="left">
                <select name="kemu" class="upfile" id="kemu" style="WIDTH: 200px">
                    @foreach($class_list as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                *（请选择您预期的期刊类别）</td>
        </tr>
        <tr class="tdbg">
            <td class="lefttdbg" align="right">期刊级别：</td>
            <td align="left">
                @foreach(\App\Models\Admin\Periodical::LEVEL_ARRAY as $k => $v)
                <label><input value="{{$k}}" @if($loop->first) checked="checked" @endif() type="radio" name="level">{{$v}}</label>
                @endforeach
                <font color="red"> *（请选择您预期的期刊级别）</font></td>
        </tr>
        @endif
        @endif
        <tr class="tdbg">
            <td class="lefttdbg" align="right">QQ：</td>
            <td align="left"><input name="qq" class="upfile" id="qq" style="WIDTH: 200px">
                （请正确填写您的常用QQ） </td>
        </tr>

        <tr class="tdbg">
            <td class="lefttdbg" align="right">文件地址：</td>
            <td align="left">
                <input name="file_url" class="upfile" id="file_url" value="{{ isset($file['url'])?'http://'.$_SERVER['SERVER_NAME'].$file['url']:'' }}" style="width: 600px;">
            </td>
        </tr>

        <tr class="tdbg">
            <td class="lefttdbg" align="right"></td>
            <td align="left">
                @include('front.public.file-submit',['file' => isset($file)?$file:[]])
            </td>
        </tr>
        <tr class="tdbg">
            <td class="lefttdbg" align="right">&nbsp;</td>
            <td align="left"><font style="color:#0000ff">*（请先选择文件，然后点击“上传”按钮，显示“上传成功”后传输完毕）</font></td>
        </tr>

        <tr class="tdbg">
            <td class="lefttdbg" align="right">见刊时间：</td>
            <td align="left"><input name="expect_time" class="upfile" id="expect_time" style="WIDTH: 200px">
                （请填写您预期的见刊时间） </td>
        </tr>
        {{--<tr class="tdbg">--}}
            {{--<td class="lefttdbg" align="right">文章题目：</td>--}}
            {{--<td align="left"><input name="article_title" class="upfile validate" id="article_title" style="WIDTH: 400px">--}}
                {{--<font color="red">*（请填写您的文章题目）</font> </td>--}}
        {{--</tr>--}}

        <tr class="tdbg">
            <td class="lefttdbg" align="right">投稿目的：</td>
            <td align="left">
                <label>
                    <input value="普通投稿" checked="checked" type="radio" name="purpose">
                    普通投稿
                </label>
                <label>
                <input value="职称、评级、毕业论文等" type="radio" name="purpose">
                职称、评级、毕业论文等
                </label>
            </td>
        </tr>
        <tr class="tdbg">
            <td class="lefttdbg" align="right">备注：</td>
            <td align="left"><textarea name="comment" rows="5" id="comment" style="WIDTH: 600px; HEIGHT: 240px"></textarea>                </td>
        </tr>
        <tr>
            <td class="subtdbg" colspan="2" align="center">
                <input value="确认提交" type="button" name="contribute_submit" id="contribute_submit">
            </td>
        </tr>
        </tbody>

        <tbody>
        <tr>
            <td></td>
        </tr>
        </tbody>

    </table>
    </form>
    <script>
        var reg_obj = {
            name : {reg : /^[\u4e00-\u9fa5]{2,20}$/,error:'请正确填写姓名'},
            tel  : {reg : /^(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14}$/,error:'请正确填写电话或手机号码'},
            phone : {reg : /^1[345678]\d{9}$/,error:'请正确填写电话或手机号码'},
            email : {reg : /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/,error:'请正确填写邮箱'},
            address : {reg : /^.{5,300}/,error:'请正确填写快递地址'},
            article_title : {reg : /^.{2,500}/,error:'请正确填写文章目的'},
        }
        var submit_status = 0;
        $(".validate").change(function () {
            $(this).removeClass('error');
        });
        $("input").change(function () {
            submit_status = 0;
        });
        $("#contribute_submit").click(function () {
            if(!reg_obj.tel.reg.test($("#tel").val()) && !reg_obj.phone.reg.test($("#phone").val())){
                alert('请正确填写电话或手机号码');
                return false;
            }
            var is_post = 1;
            $(".validate").each(function (k,v) {
                var validate_name = $(this).attr('name');
                var _reg = reg_obj[validate_name].reg;
                if(!_reg.test($(v).val())){
                    $(v).addClass('error');
                    alert(reg_obj[validate_name].error);
                    is_post = 0;
                    return false;
                }
            });
            if(is_post == 0){ return false;}
            if(submit_status == 0){
                submit_status = 1;
                $.ajax({
                    url: "{{ route('home.contribute.post') }}",
                    type: "POST",
                    data: $("#contribute_form").serialize(),
                    success: function (res) {
                        if (res.code === 200) {
                            alert('信息提交成功！');
                        }else{
                            var msg = '信息提交失败，请稍后再试';
                            if(typeof res.msg !== "undefined")  msg = res.msg;
                            alert(msg);
                            submit_status = 0;
                        }
                    },
                    error: function (res) {
                        submit_status = 0;
                        var msg = '信息提交失败，请稍后再试';
                        if(typeof res.msg !== "undefined")  msg = res.msg;
                        alert(msg);
                    }
                });
            }else{
                alert('请不要重复提交信息');
            }
        });
    </script>
</div>

