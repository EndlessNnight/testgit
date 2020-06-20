
<div class="col-lg-6">
    <label for="">图片上传(622*212)</label>
    <div class="dropzone " id="dropzone-image-uploader" >
    </div>
</div>

<script type="text/javascript">
        new Dropzone("#dropzone-image-uploader", {
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            clickable: true,
            headers: {
                'X-CSRF-Token': Laravel.csrfToken
            },
            hiddenInputContainer: '#dropzone-image-uploader',
            uploadMultiple: false,
            thumbnailWidth: 480,
            thumbnailHeight: null,
            url: '{{ route('file.upload', 'news') }}',
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
            init: function() {
                this.on('success', function(file, response) {
                    file.response = response;
                    file.id = response.id;
                    file.url = response.url;
                });
            }
        });
    </script>
