@if(!empty($employ_list))
<div id="demos" style="overflow:hidden;height:247px;width:213px;">
    <div id="demos1">
        @foreach($employ_list as $employ)
        <div class="gao">
            编号：<span class="lan1">{{$employ['identifier']}}</span><br />作者：<span class="green"><strong>{{$employ['name']}}</strong></span> 状态：<span class="red">{{ \App\Models\Contribute::STATUS_ARRAY[$employ['status']] }}</span></div>
        @endforeach

    </div>
    <div id="demos2"></div>
</div>
<script>
    var speeds=50
    demos2.innerHTML=demos1.innerHTML
    function Marquees(){
        if(demos2.offsetTop-demos.scrollTop<=0)
            demos.scrollTop-=demos1.offsetHeight
        else{
            demos.scrollTop++
        }
    }
    var MyMars=setInterval(Marquees,speeds)
    demos.onmouseover=function() {clearInterval(MyMars)}
    demos.onmouseout=function() {MyMars=setInterval(Marquees,speeds)}
</script>
@endif
