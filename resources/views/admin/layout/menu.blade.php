<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">功能菜单</li>
    <li ><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i><span>后台首页</span></a></li>
    <li ><a href="{{ route('admin.contribute') }}"><i class="fa fa-file-text-o"></i><span>稿件管理</span></a></li>

    <li ><a href="{{ route('admin.periodical') }}"><i class="fa fa-reorder"></i><span>刊物管理</span></a></li>
    <li ><a href="{{ route('admin.periodical.type') }}"><i class="fa  fa-tags"></i><span>期刊分类</span></a></li>
    <li ><a href="{{ route('admin.employ') }}"><i class="fa fa-list-alt"></i><span>收录管理</span></a></li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i> <span><span>新闻管理</span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li ><a href="{{ route('admin.news.editor') }}"><i class="fa fa-pencil"></i>添加新闻</a></li>
            <li ><a href="{{ route('admin.news') }}"><i class="fa fa-list-alt"></i>新闻列表</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-word-o"></i> <span><span>论文管理</span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li ><a href="{{ route('admin.paper.editor') }}"><i class="fa fa-pencil"></i>添加论文</a></li>
            <li ><a href="{{ route('admin.paper') }}"><i class="fa fa-list-alt"></i>论文列表</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-internet-explorer"></i> <span><span>单页管理</span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li ><a href="{{ route('admin.page.editor') }}"><i class="fa fa-pencil"></i>添加单页</a></li>
            <li ><a href="{{ route('admin.page') }}"><i class="fa fa-list-alt"></i>单页列表</a></li>
        </ul>
    </li>

    <li><a href="{{ route('admin.setting') }}"><i class="fa fa-gear"></i><span>网站设置</span></a></li>

</ul>
<!-- /.sidebar -->
<script language="javascript">
    function show_hot_menu() {
        var __current_url = location.href;
        if(__current_url.indexOf("?") != -1){
            __current_url = __current_url.split("?")[0];
        }
        $('.sidebar-menu a').each(function (idx, item) {
            var _ulitem = $($(item).parents('.treeview-menu').get(0));
            $($(item).parent('li').get(0)).removeClass('active');
            $(_ulitem).removeClass('menu-open');
            var val = $(item).data('v');
            if ($(item).attr('href') == __current_url) {
                $($(item).parent('li').get(0)).addClass('active');
                $(_ulitem).addClass('menu-open');
                $(_ulitem).show();
                $($(_ulitem).parent('li').get(0)).addClass('active');
            }
        });
    }
    $(document).ready(function () {
        show_hot_menu();
    });
</script>
