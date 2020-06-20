<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="clearfix" method="{{ isset($method) ? $method : 'post' }}" action="{{ isset($action) ? $action : '' }}">
        <div class="modal-body clearfix">
          {{ csrf_field() }}
          <div class="confirm">
            {{ $slot }}
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">确认</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        </div>
      </form>
    </div>
  </div>
</div>