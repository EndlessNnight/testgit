<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body clearfix">
        <div class="confirm">
          {{ $slot }}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit">确认</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $("#{{ $id }}").find('.btn-submit')
        .click(function() {
            $("#{{ $id }}").modal('hide').trigger('confirmed');
        });
  </script>
</div>