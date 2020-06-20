<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $config['web_title'] or '网站首页'}}</title>
    <meta name="keywords" content="{{ $config['web_keywords'] or ''}}" />
    <meta name="description" content="{{ $config['web_description'] or ''}}" />
    <link href="{{ url('css/css.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('js/ScrollPic.js') }}" type=text/javascript></script>

    @yield('head')

</head>

<body style="margin-top: 7px;" @yield('body-class')>


@include('front.public.head')

@include('front.public.nav')

@yield('content')

@include('front.footer')

@include('tongji.all')

</body>
</html>
