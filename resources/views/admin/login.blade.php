<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ empty($config['title'])?'登陆':$config['title'].' - 登陆' }}</title>
    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
    </script>
    <script>
        if (window != window.top) top.location.href = self.location.href;
    </script>
    <!-- App stylesheet -->
    <link href="{{ url('static/public/layui/css/layui.css?'.microtime(true)) }}" rel="stylesheet">

    <link href="{{ url('static/public/font-awesome/css/font-awesome.css?'.microtime(true)) }}" rel="stylesheet" />
    <link href="{{ url('static/admin/css/login.css?'.microtime(true)) }}" rel="stylesheet" />
    <link href="{{ url('static/public/sideshow/css/demo.css?'.microtime(true)) }}" rel="stylesheet" />
    <link href="{{ url('static/public/sideshow/css/component.css?'.microtime(true)) }}" rel="stylesheet" />
    <style>
        canvas {
            position: absolute;
            z-index: -1;
        }

        .kit-login-box header h1 {
            line-height: normal;
        }

        .kit-login-box header {
            height: auto;
        }

        .content {
            position: relative;
        }

        .codrops-demos {
            position: absolute;
            bottom: 0;
            left: 40%;
            z-index: 10;
        }

        .codrops-demos a {
            border: 2px solid rgba(242, 242, 242, 0.41);
            color: rgba(255, 255, 255, 0.51);
        }

        .kit-pull-right button,
        .kit-login-main .layui-form-item input {
            background-color: transparent;
            color: white;
        }

        .kit-login-main .layui-form-item input::-webkit-input-placeholder {
            color: white;
        }

        .kit-login-main .layui-form-item input:-moz-placeholder {
            color: white;
        }

        .kit-login-main .layui-form-item input::-moz-placeholder {
            color: white;
        }

        .kit-login-main .layui-form-item input:-ms-input-placeholder {
            color: white;
        }

        .kit-pull-right button:hover {
            border-color: #009688;
            color: #009688
        }
    </style>
</head>
<body class="kit-login-bg">
<div class="container demo-4">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="kit-login-box">
                <header>
                    <h1>{{ empty($config['title'])?'登陆':$config['title'].' - 登陆' }}</h1>
                </header>
                <div class="kit-login-main">
                    <form class="layui-form" id="login" action="post">
                        {{ csrf_field() }}

                        <div class="layui-form-item">
                            <label class="kit-login-icon">
                                <i class="layui-icon">&#xe612;</i>
                            </label>
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="用户名" class="layui-input"  style="border:1px solid rgba(0,150,136,.5);">
                        </div>
                        <div class="layui-form-item">
                            <label class="kit-login-icon">
                                <i class="layui-icon">&#xe642;</i>
                            </label>
                            <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="密码" class="layui-input" style="border:1px solid rgba(0,150,136,.5);">
                        </div>
                        <div class="layui-form-item">
                            <label class="kit-login-icon">
                                <i class="layui-icon">&#xe642;</i>
                            </label>
                            <input type="text" name="captcha" lay-verify="required" autocomplete="off" placeholder="验证码" class="layui-input" style="width:45%;float: left;margin-right:5px;border:1px solid rgba(0,150,136,.5);">
                            <img class="captcha_img" title="点击刷新" src="{{captcha_src()}}" alt="captcha" onclick="this.src='{{captcha_src()}}'+Math.random()" height="37" id="captcha" />
                        </div>
                        <div class="layui-form-item">
                            <div class="kit-pull-left kit-login-remember">
                                <input type="checkbox" value="1" lay-skin="primary" title="记住帐号?" name="remember"  checked="">
                            </div>
                            <div class="kit-pull-right" >
                                <button class="layui-btn layui-btn-primary" lay-submit lay-filter="login" style="border:1px solid rgba(0,150,136,.5);">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> 登录
                                </button>
                            </div>
                            <div class="kit-clear"></div>
                        </div>
                    </form>
                </div>
                <footer>
                    <p>{{ $config['title'] or '后台管理系统' }} 技术支持 @ <a href="javascript:;" style="color:white; font-size:18px;" target="_blank">DONG</a></p>
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- /container -->

<script src="{{ url('static/public/layui/layui.js?'.microtime(true)) }}"></script>
<script src="{{ url('static/public/sideshow/js/TweenLite.min.js?'.microtime(true)) }}"></script>
<script src="{{ url('static/public/sideshow/js/EasePack.min.js?'.microtime(true)) }}"></script>
<script src="{{ url('static/public/sideshow/js/rAF.js?'.microtime(true)) }}"></script>
<script src="{{ url('static/public/sideshow/js/demo-1.js?'.microtime(true)) }}"></script>
<script src="{{ url('static/public/jquery/jquery.min.js?'.microtime(true)) }}"></script>
<script>
    layui.use(['layer', 'form'], function() {
        var layer = layui.layer,
            $ = layui.jquery,
            form = layui.form;
        $(window).on('load', function() {
            form.on('submit(login)', function(data) {
                $.ajax({
                    url:"{{ route('admin.check') }}",
                    data:$('#login').serialize(),
                    type:'post',
                    async: false,
                    success:function(res) {
                        layer.msg(res.msg,{offset: '100px',anim: 4});
                        if(res.code === 200) {
                            setTimeout(function() {
                                location.href = res.url;
                            }, 1000);
                        } else {
                            $('#captcha').click();
                        }
                    }
                })
                return false;
            });
        });
    });
</script>
</body>
</html>
