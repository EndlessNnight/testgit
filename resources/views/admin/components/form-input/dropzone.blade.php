<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
    @set ($_value_id, exist_input($field . '.id', 0))
    @set ($_value_name, exist_input($field . '.name'))
    @set ($_value_size, exist_input($field . '.size', 0))
    @set ($_value_url, exist_input($field . '.url'))
    <label for="{{ $field }}">{{ $label }}</label>
    <input type="hidden" id="{{ $field . '_id' }}" name="{{ $field . '_id' }}" value="{{ $_value_id }}"/>
    <input type="hidden" id="{{ $field . '__id' }}" name="{{ $field . '[id]' }}" value="{{ $_value_id }}"/>
    <input type="hidden" id="{{ $field . '__name' }}" name="{{ $field . '[name]' }}" value="{{ $_value_name }}"/>
    <input type="hidden" id="{{ $field . '__size' }}" name="{{ $field . '[size]' }}" value="{{ $_value_size }}"/>
    <input type="hidden" id="{{ $field . '__url' }}" name="{{ $field . '[url]' }}" value="{{ $_value_url }}"/>
    <div class="dropzone form-input" id="{{ $field }}">
    </div>
    @if ($errors->has($field))
        <span class="help-block">
    <strong>{{ $errors->first($field) }}</strong>
  </span>
    @endif
</div>
<script type="text/javascript">
    var dropzone = new Dropzone("#{{ $field }}", {
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        clickable: true,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        {{--@if (isset($params))--}}
                {{--params: {--}}
                {{--@foreach ($params as $k => $v)--}}
                {{--'{{ $k }}': "{{ $v }}",--}}
                {{--@endforeach--}}
                {{--},--}}
                {{--@endif--}}
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
                $('#{{ $field . '_id' }}').val(response.id);
                $('#{{ $field . '__id' }}').val(response.id);
                $('#{{ $field . '__name' }}').val(response.name);
                $('#{{ $field . '__size' }}').val(response.size);
                $('#{{ $field . '__url' }}').val(response.url);
                @if (!empty($thumb_show))
                    thumbShow();
                @endif
            });
           
        }
    });

            @if ($_value_id > 0)
    var file = {
                name: "{{ $_value_name }}",
                size: "{{ $_value_size }}"
            };
    dropzone.emit('addedfile', file);
    @if ($type == 'image')
    dropzone.createThumbnailFromUrl(file, '{{ $_value_url }}', null, 'Anonymouse');
    @endif
    dropzone.emit('complete', file);
    @endif

    function thumbShow() {
        // console.log($("#file__url").val());
        var thumbImg = $(".dropzone .dz-preview .dz-image img");
        var fileInfo = $(".dropzone .dz-file-preview .dz-details");
        if (typeof(thumbImg.attr("src")) == 'undefined') {
            thumbImg.attr("src", $("#file__url").val());
            // console.log(thumbImg.attr('src'));
            fileInfo.css({'opacity': 0});
            fileInfo.hover(function () {
                fileInfo.css({'opacity': 1});
            }, function () {
                fileInfo.css({'opacity': 0});
            })
        }
    }
</script>
