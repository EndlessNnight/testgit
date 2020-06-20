<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $config['title'] or '后台管理系统' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('admin.libraries.admin-lte')
    @stack('head')

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        $(function() {
            $('a[data-toggle=modal]').on('click', function(e) {
                var $a = $(e.currentTarget);
                var target = $a.data('target');
                var url = $a.data('load-url');

                if (url) {
                    $(target).find('.modal-content').load(url);
                }
            });
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini @yield('body-class')">
<div class="wrapper  ">
@yield('app')
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
@include('admin.libraries.js')
</body>
</html>
