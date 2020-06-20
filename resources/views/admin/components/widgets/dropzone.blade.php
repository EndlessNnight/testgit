<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dropzone" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">图片上传</h4>
      </div>
      <div class="modal-body">
        <div class="dropzone" id="dropzone-image-uploader">
        </div>
      </div>
      <div class="modal-footer">
        <a role="button" href="#" class="btn btn-primary btn-confirm">保存</a>
        <a role="button" href="#" class="btn btn-default" data-dismiss="modal">取消</a>
      </div>
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
        url: '{{ route('file.upload', 'banner') }}',
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

            var that = this,
                $modal = $("#{{ $id }}");
            $modal.find('.btn-confirm').click(function() {
                var files = that.getFilesWithStatus(Dropzone.SUCCESS);

                if (files.length > 0) {
                    $modal.trigger('file', files[0]);
                }
                $modal.modal('hide');
            });

            $modal.on('hide.bs.modal', function() {
                that.removeAllFiles();
            });
        }
    });
  </script>
</div>