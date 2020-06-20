
<div class="blank"></div>
<div class="hengfu"> <img src="{{ url('/images/mobile/p-gugao.jpg') }}"></div>
<div class="blank"></div>
<div class="seven">
    <div class="seven_t"> <img src="{{ url('/images/mobile/pic41.png') }}"></div>
    <div class="seven_c">
        <form name="form" method="post" action="{{ route('mobile.contribute.post') }}" >
            <ul>
                <li>
                    <h1>所学专业</h1>
                    <input name="discipline" id="discipline" type="text" class="seven_mar1" onfocus="if(this.value=='请输入您的所学专业'){this.value='';}" onblur="if(this.value==''){this.value='请输入您的所学专业';}" value="请输入您的所学专业" style="color:#A4A4A4">
                </li>
                <li>
                    <h1>学历</h1>
                    <select name="educate" id="educate" class="seven_mar1">
                        <option value="">请选择学历</option>
                        <option value="博士">博士</option>
                        <option value="硕士">硕士</option>
                        <option value="本科">本科</option>
                        <option value="专科">专科</option>
                    </select>
                </li>
                <li>
                    <h1>姓名</h1>
                    <input name="name" id="name" type="text" class="seven_mar1" onfocus="if(this.value=='请输入您的姓名'){this.value='';}" onblur="if(this.value==''){this.value='请输入您的姓名';}" value="请输入您的姓名" style="color:#A4A4A4">
                </li>
                <li>
                    <h1>联系电话</h1>
                    <input name="tel" id="tel" type="text" class="seven_mar1 validate" onfocus="if(this.value=='请输入您的联系方式'){this.value='';}" onblur="if(this.value==''){this.value='请输入您的联系方式';}" value="请输入您的联系方式" style="color:#A4A4A4">
                </li>

                <li>
                    <h1>需求描述</h1>
                    <input name="comment" id="comment" type="text" class="seven_mar1" onfocus="if(this.value=='请描述下需求，方便老师帮您…'){this.value='';}" onblur="if(this.value==''){this.value='请描述下需求，方便老师帮您…';}" value="请描述下需求，方便老师帮您…" style="color:#A4A4A4">
                </li>
            </ul>

            <h2>
                <input class="contribute_submit" name="" type="image" src="{{ url('/images/mobile/pic42.png') }}">
            </h2>
        </form>

    </div>
    <div class="seven_t"> <a href="http://p.qiao.baidu.com/cps/chat?siteId=12815805&userId=23003898"> <img src="{{ url('/images/mobile/pic44.png') }}"></a> </div>
</div>
