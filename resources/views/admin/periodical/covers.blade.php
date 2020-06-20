<div class="modal-content "  style="width: 700px;">
    <form id="coversForm" class="form-horizontal" data-action="{{ route('admin.periodical.covers.store') }}">
        {{ csrf_field() }}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ editing() ?  '编辑' : '添加' }}封面</h4>
        </div>
        <div class="modal-body">
            @include('admin.components.editor-form.id',['field' => 'id'])
            <input id="fileData" type="file" name="fileData" multiple class="file-loading">
            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left btn-submit" onclick="postData(this)">保存</button>
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">关闭</button>
        </div>
    </form>

    <script>
        var id = {{isset($id)?$id:0}};
        $(function () {
            //0.初始化fileinput
            var oFileInput = new FileInput();
            oFileInput.Init("fileData", "{{route('file.upload',['type' => 'image'])}}");
        });
        var old_files = {!! !empty($covers)?json_encode($covers):'[]' !!}
        var view_obj = [];
        var view_config = [];
        $.each(old_files,function (k,v) {
            view_obj.push('<img src="'+v.url+'" class="file-preview-image">');
            view_config.push({
                caption: v.name,// 展示的图片名称  
                width: '120px',// 图片高度  
                url: '{{ route('admin.periodical.covers.delete') }}?periodical_id='+id+'&file_id='+v.id,// 预展示图片的删除调取路径
                key: v.id,// 可修改 场景2中会用的  
                extra: {periodical_id : id, file_id : v.id } //调用删除路径所传参数   
            })
        });

        var files = [];
        if(old_files.length > 0){
            $.each(old_files,function (key , val) {
                files.push(val.id);
            })
        }
        var FileInput = function () {
            var oFile = new Object();
            //初始化fileinput控件（第一次初始化）
            oFile.Init = function (ctrlName, uploadUrl) {
                var control = $('#' + ctrlName);
                //初始化上传控件的样式
                control.fileinput({
                    language: 'zh', //设置语言
                    uploadUrl: uploadUrl, //上传的地址
                    allowedFileExtensions: ['jpg', 'gif', 'png','jpeg'],//接收的文件后缀
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    //showUploadedThumbs:false,
                    // uploadClass: 'hidden',
                    // paramName:"fileData", //默认为file
                    showUpload: false, //是否显示上传按钮
                    showCaption: false,//是否显示标题
                    browseClass: "btn btn-info", //按钮样式
                    dropZoneEnabled: false,//是否显示拖拽区域
                    //minImageWidth: 150, //图片的最小宽度
                    //minImageHeight: 150,//图片的最小高度
                    //maxImageWidth: 150,//图片的最大宽度
                    //maxImageHeight: 150,//图片的最大高度
                    maxFileSize: 2048,//单位为kb，如果为0表示不限制文件大小
                    maxFileCount: 10, //表示允许同时上传的最大文件个数
                    minFileCount: 1,
                    enctype: 'multipart/form-data',
                    validateInitialCount: true,
                    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                    msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                    fileActionSettings : {
                        showUpload: false,
                        // showRemove: true,
                        showZoom:false
                    },
                    initialPreview: view_obj,
                    initialPreviewConfig: view_config,
            });

                //导入文件上传完成之后的事件
                $("#fileData").on("fileuploaded", function (event, data) {
                    if(data.response.code === 200){
                        files.push(data.response.file.id);
                    }
                });
                $('#fileData').on('filedeleted', function(event, res) {
                    if(typeof res !== "undefined"){
                        $.each(files,function (k,v) {
                            if(v === res){
                                delete files[k];
                            }
                        })
                    }
                });
            }
            return oFile;
        };
        function postData() {
            if(files.length <= 0){
                showMsg('error','还没有上传图片哦！');
                return false;
            }else{
                $.ajax({
                    method : 'post',
                    url : '{{route('admin.periodical.covers.store')}}',
                    beforeSend: function(request) {
                        request.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content'));
                    },
                    data : {
                        id : id,
                        file_id : files
                    },
                    success : function (res) {
                        if(res.code !== 200){
                            showMsg('error',res.msg);
                        }else{
                            showMsg('success',res.msg,res.url);
                        }
                    }
                })
            }
        }
    </script>
</div>

