
@push('head')
    @include('admin.libraries.img-upload')
@endpush

<div class="form-group {{ $errors->has($field) ? ' has-error' : '' }} {{ isset($class) ? ' '.$class : '' }}">
    <label for="img"  title="点击修改图片" style="text-align: left;padding-left: 0;"> {{ $title or '图片修改'}}  </label>
    <input type="hidden" class="form-control hidden" id="{{$field}}" name="{{$field}}" value="{{$value or ''}}" style="display: none">
    <input type="hidden" class="form-control hidden" id="{{$field}}_id" name="{{$field}}_id" value="{{$value or ''}}" style="display: none">

    <div class="upload_box" style="width: 100%; vertical-align: top;">
        <a href="javascript:void(0)" class="editor_img {{ $img_class or '' }}" onclick="changeImg(this)">
            <span class="hide-info">点击修改</span>
            <img width="100%" src="{{$value or ''}}">
        </a>
        @if(!empty($info))
        <span class="upload_info">{!! $info !!}</span>
        @endif
    @if ($errors->has($field))
            <span class="help-block">
                <strong>{{ $errors->first($field) }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
    <div class="dropzone form-input" id="dropzone_{{ $field }}" style="display: none">
    </div>
</div>

<script type="text/javascript">
    var success_url;
    @if(!empty($success_url))
        success_url =  '{{ $success_url}}';
    @endif

    var dropzone = new Dropzone("#dropzone_{{ $field }}", {
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        clickable: true,
        paramName:"fileData", //默认为file
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        hiddenInputContainer: '#{{ $field }}',
        uploadMultiple: false,
        url: '{{ route('file.upload', $type) }}',
        dictDefaultMessage: "拖放文件到这里或者点击上传。",
        dictFallbackMessage: "浏览器不支持拖放文件上传。",
        dictFallbackText: "请使用下方的旧方式上传你的文件。",
        dictFileTooBig: "文件过大 (@{{filesize}}MB)，上传最大支持 @{{maxFilesize}}MB。",
        dictInvalidFileType: "不支持这种类型的文件",
        dictResponseError: "服务器返回了 HTTP @{{statusCode}}",
        dictCancelUpload: "取消上传",
        dictCancelUploadConfirmation: "你确定要取消上传吗？",
        dictRemoveFile: "移除文件",
        dictRemoveFileConfirmation: null,
        dictMaxFilesExceeded: "你不能再上传更多文件了。",
        init: function () {
            this.on('success', function (file, response) {
                $("input#{{$field}}_id").val(response.file.id);
                $(this.element).parents('.form-group').find('.editor_img img').attr('src',response.file.url);
                @if(!empty($success_url))
                $.ajax({
                    method : 'post',
                    url : success_url,
                    beforeSend: function(request) {
                        request.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content'));
                    },
                    data : {
                        file_id : response.file.id
                    },
                    success : function (res) {
                        if(res.code !== 200){
                            showMsg('error',res.msg);
                        }else{
                            showMsg('success',res.msg,res.url);
                        }
                    }
                })
                @endif

            });
        }
    });
    function changeImg(_this){
        $(_this).parents('.form-group').find(".dz-message").click();
    }

</script>
