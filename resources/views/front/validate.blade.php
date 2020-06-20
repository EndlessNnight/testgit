

@extends('front.public.inside')

@section('right-con')
    @include('front.public.type-items',['default' => '期刊验证'])

    <table width="690" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" valign="top">
        <tbody>
        <tr>
            <td valign="top" width="296" height="765">
                <table border="0" cellspacing="0" cellpadding="0" width="600" align="center">
                    <tbody>
                    <tr>
                        <td height="80" align="center" valign="bottom" style="BORDER-BOTTOM: #d7d7d7 1px solid"><h1>期刊查询</h1></td>
                    </tr>
                    <tr>
                        <td style="BORDER-BOTTOM: #d7d7d7 1px solid" height="40" valign="bottom">
                            <div style="FONT-FAMILY: '微软雅黑'; FONT-SIZE: 14px" align="center"><strong>期刊
                                    / 报纸 在新闻出版总署备案信息查询系统</strong></div></td></tr>
                    <tr>
                        <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" height="12" valign="top">本系统由国家新闻出版总署提供，可查证国内期刊和报纸的合法性。凡查询不到的刊物，均为非法刊物</td></tr>
                    <tr>
                        <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" height="12" valign="top">
                            <table class="bj30" border="0" cellspacing="0" cellpadding="0" width="357" align="center">
                                <tbody>
                                <tr>
                                    <td class="list_text" height="32" width="107" align="right">媒体名称：</td>
                                    <td width="250" align="left"><input id="Text1" name="new_name"></td></tr>
                                <tr>
                                    <td class="list_text" height="32" align="right">媒体类别：</td>
                                    <td width="250" align="left"><select style="WIDTH: 153px" name="sysitem_group"> <option selected="" value="期刊">期刊</option> <option value="报纸">报纸</option></select></td></tr>
                                <tr>
                                    <td height="2"></td></tr>
                                <tr>
                                    <td colspan="2">
                                        <table cellspacing="0" cellpadding="0" width="100%" align="center">
                                            <tbody>
                                            <tr>
                                                <td align="right"><input id="Button1" onclick="search_cy();" value="button" src="http://www.sdqikan.cn/img/Search_btn.gif" type="image" name="image"> &nbsp;&nbsp;&nbsp; </td>
                                                <td align="left">&nbsp;&nbsp;&nbsp; <input id="Button2" onclick="clearMe();" value="button" src="http://www.sdqikan.cn/img/reset_btn.gif" type="image" name="image"></td></tr></tbody></table></td></tr>
                                <tr>
                                    <td colspan="2"></td></tr></tbody></table>
                            <table border="0" cellspacing="0" cellpadding="0" width="80%" align="center">
                                <tbody>
                                <tr>
                                    <td>近期检索较多，检索出错，请重新检索或避开高峰期。

                                        <script language="javascript" type="text/javascript">
                                            function search_cy(){
                                                var new_name = document.all("new_name").value;
                                                var sysitem_group = document.all("sysitem_group");
                                                var url="http://www.gapp.gov.cn/zongshu/magazine.shtml?new_name="+new_name+"&sysitem_group="+sysitem_group.options[sysitem_group.selectedIndex].text;
                                                window.open(url,"","width="+screen.width+",height="+screen.height+",scrollbars=no");


                                            }

                                            function clearMe(){
                                                document.all("new_name").value="";
                                                document.all("sysitem_group").selectedIndex=0;
                                            }
                                        </script>           </td></tr></tbody></table></td></tr>
                    <tr>
                        <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" valign="top"></td></tr></tbody></table>
                <table border="0" cellspacing="0" cellpadding="0" width="600" align="center">
                    <tbody>
                    <tr>
                        <td style="FONT-FAMILY: '微软雅黑'; FONT-SIZE: 14px" height="54" align="middle"><strong><br>期刊/杂志/刊号 在中国期刊网登录情况查询系统</strong></td></tr>
                    <tr>
                        <td style="LINE-HEIGHT: 21px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" height="24" valign="top">本查询系统由中国期刊网提供，可直接通过查询刊名、国际标准刊号（ISSN）、国内统一刊号（CN）查询检索到期刊在中国期刊网的登录情况。</td></tr>
                    <tr>
                        <td style="PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BORDER-TOP: #d7d7d7 1px solid; PADDING-TOP: 10px" height="80" valign="top">
                            <table border="0" cellspacing="0" width="300" align="center">
                                <tbody>
                                <tr>
                                    <td>
                                        <form style="MARGIN: 0px" onsubmit="return false" name="search" method="post" action="http://acad.cnki.net/kns55/oldnavi/n_list.aspx?NaviID=1&amp;Field=py_203&amp;Flg=&amp;Value=C&amp;NaviLink=%u62fc%u97f3%u520a%u540d%3aC" target="_blank">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td valign="center">检索项:&nbsp;
                                                        <select name="drpField" id="drpField">
                                                            <option value="cykm$%&quot;{0}&quot;">刊名</option>
                                                            <option value="issn$=&quot;*{0}&quot;">ISSN</option>
                                                            <option value="cn$=&quot;*{0}&quot;">CN</option>
                                                        </select></td></tr>
                                                <tr>
                                                    <td>检索词:&nbsp; <input onkeydown="if(event.keyCode==13)naviCheck();" maxlength="60" name="txtValue">
                                                        <script language="JavaScript" type="text/javascript">
                                                            function naviCheck()
                                                            {
                                                                var tmp =document.all('txtValue').value;
                                                                if(tmp.length== 0)
                                                                {
                                                                    alert('请输入检索词');
                                                                    document.all('txtValue').focus();
                                                                    return;
                                                                }

                                                                document.search.submit();
                                                            }
                                                        </script>                   </td></tr>
                                                <tr>
                                                    <td class="h" valign="center" align="right"><a href="javascript:naviCheck()"><img border="0" src="http://www.sdqikan.cn/img/23.gif" width="60" height="20"></a></td></tr></tbody></table></form></td></tr></tbody></table></td></tr></tbody></table>
                <table border="0" cellspacing="0" cellpadding="0" width="600" align="center">
                    <tbody>
                    <tr>
                        <td>中国知网的检测有时会出现错误，请在打开的窗口中重新输入检索一遍就可以。</td></tr></tbody></table>
            </td>
        </tr>
        </tbody>
    </table>

@endsection

