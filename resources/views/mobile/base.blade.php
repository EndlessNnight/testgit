<html>
<head>
    <meta charset="gb2312">
    <meta http-equiv="Cache-Control" content="must-revalidate,no-cache">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=no;">
    <title>{{ $config['web_title'] or '网站首页'}}</title>
    <meta name="keywords" content="{{ $config['web_keywords'] or ''}}" />
    <meta name="description" content="{{ $config['web_description'] or ''}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ url('css/mobile.css') }}" rel="stylesheet" type="text/css">
    <!-- jQuery 3 -->
    <script src="{{ url('/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<body>
@include('mobile.top-pic')
@include('mobile.header')
@include('mobile.banner-pic')

<div class="blank"></div>

<div class="lmy1">
    @yield('content')
</div>

@include('mobile.contribute')

@include('mobile.footer')

@include('mobile.form-submit')

@include('tongji.tj')
</body>
</html>