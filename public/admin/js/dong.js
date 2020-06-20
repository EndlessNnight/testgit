
var validates = {
    password : { reg : /^[a-zA-Z0-9_·~!@#$%^&*()+-=.?]{6,20}$/ , error : '密码长度为6~20位'},
    required : { reg :  /\S/ , error : '不能为空'},
    reorder  : { reg :  /^(?:[0-9]?\d|100)$/ , error : '取值范围 0~100' },
    letter   : { reg :  /^[a-zA-Z]{2,20}$/ , error : '只能输入字母 且长度不能小于2位' }
};

var ajax_error_code = 422;
var e  = 'has-error',
    m  = 'modal',
    es = 'error-show',
    vt = 'validate',
    fg = 'form-group',
    bs = 'btn-submit',
    ed = 'demoded',
    t = true;

/**
 * 图片编辑框
 * */
$(".editor_img").hover(function (h) {
    $(this).children('span.hide-info').fadeIn(200);
},function (h) {
    $(this).children('span.hide-info').fadeOut(200);
});

$('.'+bs).click(function () {
    var __this = $(this);
    if(__this.hasClass(ed)) return false;
    __this.addClass(ed);
    postData(this);
});


var postData = function (_this) {
    __this = $(_this);
    var f = __this.parents('form');
    var d = f.serialize();
    var i = f.find('input');
    $.each(i,function (k,v) {
        if($(v).attr(vt) && !checkInput(v)) t= false;
    });
    if(t){
        t = false;
        // $(this).parents('.modal').hide();
        $.ajax({
            method : 'post',
            url : f.data('action'),
            data : d,
            success : function (res) {
                t = true;
                // console.log(res);
                if(res.code !== 200){
                    __this.removeClass(ed);
                    if(typeof res.errors === "object"){
                        handleError(res.errors,f);
                    }else{
                        showMsg('error',res.msg);
                    }
                }else{
                    var url = res.url || null;
                    showMsg('success',res.msg,res.url);
                }
            },
            error: function (error) {
                t = true;
                if(error.status === ajax_error_code){
                    var res = $.parseJSON(error.responseText);
                    if(typeof res.errors === "object"){
                        handleError(res.errors,f );
                    }
                }
                // else{
                //     console.log(error);
                // }
            }
        })
    }
}



$(document).on("blur","form.validate .check",function(){
    // console.log($(this));
    if(checkInput($(this))) $(this).parents('.'+e).removeClass(e)
});


var check_input =  $("form.validate .check").blur(function () {
    if(checkInput($(this))) $(this).parents('.'+e).removeClass(e)
});

function handleError(errors,form) {
    // console.log(form);
    $.each(errors,function (k,v) {
        var o = form.find('#'+k).parents('.'+fg);
        // console.log(o);
        o.addClass(e);
        o.find('.'+es).text(v);
    })
}

function validate(type,val) {
    if(typeof validates[type] === "object"){
        var reg = new RegExp( validates[type].reg );
        if(reg.test(val)){
            t = true;
            return true;
        }else{
            t = true;
            return validates[type];
        }
    }
}

function checkInput(input) {
    var i = $(input);
    var v = i.attr(vt);
    if(v !== undefined && v !== ''){
        var isV = validate(v,i.val());
        if(isV !== true){
            var g = i.parents('.'+fg);
            g.find('.'+es).text(isV.error);
            g.addClass(e);
            return false;
        }
        return true
    }else{
        return true;
    }
}

function showMsg(type,msg,url=null,callback,options={}) {
    var timeOut = 1000;
    toastr.options =  $.extend({
        closeButton: false,
        debug: false,
        progressBar: true,
        positionClass: "toast-top-center",
        onclick: null,
        showDuration: "200",
        hideDuration: "200",
        timeOut: timeOut,
        extendedTimeOut: "0",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    }, options);

    switch (type) {
        case  'success' :
            toastr.success(msg);
            if(url !== null){
                timeOutRedirect(url,timeOut);
            }
            break;
        case  'error' :
            toastr.options = $.extend(toastr.options,{
                closeButton : true,
                timeOut : 99999,
            });
            toastr.error(msg);
            break;
        case  'info' :
            toastr.success(msg);
            break;
        case  'warning' :
            toastr.warning(msg);
            break;
    }

}

function redirect(url) {
    window.location.href = url
}

function timeOutRedirect(url,time){
    setTimeout(function (){
        redirect(url);
    },time);
}

function sc(imgfile){
    var animateimg = $(imgfile).val(); //获取上传的图片名 带//
    var imgarr=animateimg.split('\\'); //分割
    var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
    var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
    var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

    var file = $(imgfile).get(0).files[0]; //获取上传的文件
    var fileSize = file.size;           //获取上传的文件大小
    var maxSize = 1048576;              //最大1MB
    var restrictType = ['png','gif','jpg','jpeg','bmp'];

    if(!restrictType.indexOf(ext)){
        showMsg('error','文件类型错误,请上传图片类型');
        return false;
    }else if(parseInt(fileSize) >= parseInt(maxSize)){
        showMsg('error','上传的文件不能超过1MB');
        return false;
    }else{
        var data = new FormData($('#form1')[0]);
        $.ajax({
            url: "{:url('User/uppic')}",
            type: 'POST',
            data: data,
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false
        }).done(function(ret){
            if(ret['isSuccess']){
                var result = '';
                var result1 = '';
                // $("#show").attr('value',+ ret['f'] +);
                result += '<img src="' + '__ROAD__' + ret['f']  + '" width="100">';
                result1 += '<input value="' + ret['f']  + '" name="user_headimg" style="display:none;">';
                $('#result').html(result);
                $('#show').html(result1);
                layer.msg('上传成功');
            }else{
                layer.msg('上传失败');
            }
        });
        return false;
    }
}
