<div class="clearfix" style="margin-top: 20px"></div>
@include('components.form-input.text', ['field' => 'title', 'label' => '消息名称', 'class' => 'col-sm-4' ])

<span class="jump-rule pull-right">
    {{--<b style="color: red">PS:跳转地址填写规则</b><br><br>--}}
    {{--<p>Page : 包名/模块/参数名/值/参数名/值..</p>--}}
    {{--<p>Url : https/http (例https://www.shengshihui.com)</p>--}}
    {{--<p>Package Name:（本地生活com.ssh.live）（其他应用com.ssh.urmanageservice）</p>--}}
    {{--<p>Activity Name:(com.ssh.IR.action)(com.ssh.OnScreen.action)(com.ssh.live.module.view.HomeFragment)</p>--}}
</span>
@include('components.form-input.text', ['field' => 'link', 'label' => '跳转地址', 'class' => 'col-sm-4',])
<div class="clearfix"></div>
<div style="margin-left: 15px">
    <label for="">推送方式</label>
    <div class="clearfix"></div>
    @include('components.form-input.checkbox',['field'  => 'push_mode', 'label' => '', 'class' => 'col-sm-4', 'data'=>['push_top'=>'Top Push' , 'push_msg'=> '消息中心'] ])
</div>


