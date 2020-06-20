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
    $(".contribute_submit").click(function () {

        var is_post = 1;
        var validate = $(this).parents('form').find(".validate");

        validate.each(function (k,v) {
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
            $(this).parents('form').submit();
            {{--$.ajax({--}}
                {{--url: "{{ route('mobile.contribute.post') }}",--}}
                {{--type: "POST",--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--data: $(this).parents('form').serialize(),--}}
                {{--success: function (res) {--}}
                    {{--if (res.code === 200) {--}}
                        {{--alert('信息提交成功！');--}}
                    {{--}else{--}}
                        {{--var msg = '信息提交失败，请稍后再试';--}}
                        {{--if(typeof res.msg !== "undefined")  msg = res.msg;--}}
                        {{--alert(msg);--}}
                        {{--submit_status = 0;--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (res) {--}}
                    {{--submit_status = 0;--}}
                    {{--var msg = '信息提交失败，请稍后再试';--}}
                    {{--if(typeof res.msg !== "undefined")  msg = res.msg;--}}
                    {{--alert(msg);--}}
                {{--}--}}
            {{--});--}}
        }else{
            alert('请不要重复提交信息');
        }

        return false;
    });
</script>