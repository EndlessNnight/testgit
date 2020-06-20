<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}{{ isset($class) ? ' '.$class : '' }}">
  @set ($_value_id, exist_input($field . '.id', 0))
  @set ($_value_name, exist_input($field . '.name'))
  <label for="{{ $field }}">{{ $label }}</label>
  @set($elementId, uniqid())
  <div class="form-input resumable{{ $_value_id ? ' resumable-completed' : '' }}" id="{{ $elementId }}">
    <div class="resumable-default">

      <div class="resumable-error-unsupported">
        Unfortunately, your browser is not supported by Resumable.js. The library requires support for <a href="http://www.w3.org/TR/FileAPI/">the HTML5 File API</a> along with <a href="http://www.w3.org/TR/FileAPI/#normalization-of-params">file slicing</a>.
      </div>

      <div class="resumable-drop" ondragenter="$(this).addClass('resumable-dragover');" ondragend="$(this).removeClass('resumable-dragover');" ondrop="$(this).removeClass('resumable-dragover');">
        <div class="resumable-content">
          <div class="resumable-file">
            <input type="hidden" class="multipart_file_id" name="{{ $field . '_id' }}" value="{{ $_value_id }}" />
            <input type="hidden" class="multipart_file_id" name="{{ $field . '[id]' }}" value="{{ $_value_id }}" />
            <input type="hidden" class="multipart_file_name" name="{{ $field . '[name]' }}" value="{{ $_value_name }}" />
            @if ($_value_id)
              <span class="resumable-file-name">{{ $_value_name }}</span>
              <span class="resumable-file-status"> 已上传</span>
            @else
              <span class="resumable-file-name"></span>
              <span class="resumable-file-status"></span>
            @endif
            <span class="resumable-file-progress"></span>
          </div>
          <div class="resumable-progress">
            <div class="progress-container"><div class="progress-bar"></div></div>
          </div>
          <div class="resumable-error"></div>
          <div class="resumable-placeholder">
            <span>拖放文件到这里或者<a class="resumable-browse"><u>选择文件</u></a>上传</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if ($errors->has($field))
    <span class="help-block">
      <strong>{{ $errors->first($field) }}</strong>
    </span>
  @endif
</div>
<script type="text/javascript">
  var options = {
      target: '{{ route('file.upload.multipart', 'app') }}',
      headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      query: $.extend({}, {
        @foreach ($params as $key => $value)
          "{{ $key }}": "{{ $value }}",
        @endforeach
      }),
      simultaneousUploads: 1
  };
  var $uploader = $("{{ '#'.$elementId }}").multipartUpload(options);
  $uploader.on('fileAdded', function(evt, file) {
      $("{{ '#'.$elementId }}").find('.multipart_file_id').val(0);
      $("{{ '#'.$elementId }}").find('.multipart_file_name').val('');
  });
  $uploader.on('fileSuccess', function(evt, file, response) {
      $("{{ '#'.$elementId }}").find('.multipart_file_id').val(response.id);
      $("{{ '#'.$elementId }}").find('.multipart_file_name').val(response.name);
  });
  // cancel when modal closed
  $("{{ '#'.$elementId }}").closest('.modal').on('hidden.bs.modal', function(evt) {
      $uploader.cancel();
  });
</script>
